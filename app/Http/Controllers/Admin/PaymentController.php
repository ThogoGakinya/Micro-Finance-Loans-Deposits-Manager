<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Payment;
use App\Models\Month;
use App\Models\MobilePayment;
use App\Models\StkResponse;
use App\Models\User;
use App\Notifications\PaymentEmailNoficationToUser;
use PDF;
use Gate;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Payment::with(['account'])->select(sprintf('%s.*', (new Payment)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'payment_show';
                $editGate      = 'payment_edit';
                $deleteGate    = 'payment_delete';
                $crudRoutePart = 'payments';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('account_account_name', function ($row) {
                return $row->account ? $row->account->account_name : '';
            });

            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : "";
            });
            $table->editColumn('month', function ($row) {
                return $row->month ? $row->month : "";
            });
            $table->editColumn('year', function ($row) {
                return $row->year ? $row->year : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'account']);

            return $table->make(true);
        }

        $accounts = Account::get();

        return view('admin.payments.index', compact('accounts'));
    }

    public function create()
    {
        abort_if(Gate::denies('payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accounts = Account::all()->pluck('account_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.payments.test', compact('accounts'));
    }

    public function store(Request $request)
    {
        $payment = Payment::create($request->all());

        return redirect()->route('admin.payments.index');
    }

    public function edit(Payment $payment)
    {
        abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accounts = Account::all()->pluck('account_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment->load('account');

        return view('admin.payments.edit', compact('accounts', 'payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        $payment->update($request->all());

        return redirect()->route('admin.payments.index');
    }

    public function show(Payment $payment)
    {
        abort_if(Gate::denies('payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->load('account');

        return view('admin.payments.show', compact('payment'));
    }

    public function destroy(Payment $payment)
    {
        abort_if(Gate::denies('payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Payment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function stkPush(Request $request)
    {
        $amount = $request->amount;
        $account = auth::user()->account_id;
        $number = $request->number;
        $months = $request->month;
        $year = $request->year;
        $no_of_months = $request->months_count;
        $value_per_month = ($amount/$no_of_months);

        $data = array($amount,$account,$months,$no_of_months,$value_per_month,$year);
        date_default_timezone_set('Africa/Nairobi');
        # access token
        $consumerKey = '4K1Aq2LGOCw5nQxUV60zLeONfmOwwuXw';
        $consumerSecret = 'kscGMdGb89nQNhCt';
        $headers = ['Content-Type:application/json; charset=utf8'];
        $access_token_url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl = curl_init($access_token_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
        $result = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($result);
        $access_token = $result->access_token;
        //echo $access_token;
        curl_close($curl);


        $BusinessShortCode = '215723';
        $Passkey = '0b92f7580f273c1ed010675030514649f9ed75e6008d811e419064f21014f3d5';
        $PartyA = $number;
        $PartyB = '218918';
        $AccountReference = 'Inv 1';
        $TransactionDesc = 'Payment trial';
        $Amount = $amount;
        $Timestamp = date('YmdHis');
        $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);

        $initiate_url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        # callback url
        $CallBackURL = 'https://www.kimfay.com/dev/callback_url.php';


        # header for stk push
        $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];

        # initiating the transaction
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $initiate_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader);

        $curl_post_data = array(
            'BusinessShortCode' => $BusinessShortCode,
            'Password' => $Password,
            'Timestamp' => $Timestamp,
            'TransactionType' => 'CustomerBuyGoodsOnline',
            'Amount' => $Amount,
            'PartyA' => $PartyA,
            'PartyB' => $PartyB,
            'PhoneNumber' => $PartyA,
            'CallBackURL' => $CallBackURL,
            'AccountReference' => $AccountReference,
            'TransactionDesc' => $TransactionDesc
        );

        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response, true);
        $CheckoutRequestID = $response['CheckoutRequestID'];
        $ResponseCode = $response['ResponseCode'];
        $CustomerMessage = $response['CustomerMessage'];

        return view('admin.payments.create')->with('CheckoutRequestID',$CheckoutRequestID)
                                            ->with('CustomerMessage',$CustomerMessage)
                                            ->with('data',$data)
                                            ->with('ResponseCode',$ResponseCode);

    }

    public function getPaymentForm()
    {
        $CheckoutRequestID = '';
        $ResponseCode = 222;
        $CustomerMessage = '';
        $data = array();
        return view('admin.payments.create')->with('CheckoutRequestID',$CheckoutRequestID)
                                         ->with('CustomerMessage',$CustomerMessage)
                                         ->with('data',$data)
                                         ->with('ResponseCode',$ResponseCode);
    }

    public function confirmPayment(Request $request)
    {
        $data4 = StkResponse::where('CheckoutRequestID',$request->id)->first();
        return response()->json($data4);
    }

    public function findMonth(Request $request)
    {
        $data = Payment::where([['account_id',$request->account_id],['year', $request->year]])->get();
        $month = Month::all();
        return response()->json(array($data,$month));
    }

    public function finishTransaction(Request $request)
    {
        $received = json_decode($request->data);
        $months = $received[2];

        foreach($months as $month) {
            $data = array('account_id' => $received[1],
                           'month' => $month, 
                           'amount' => $received[4],
                           'year' => $received[5],
                           'created_at'=>Carbon::now(),
                           'updated_at'=> Carbon::now());               
            Payment::insert($data);    
        }
        return route('admin.payments.index');
    }
}
