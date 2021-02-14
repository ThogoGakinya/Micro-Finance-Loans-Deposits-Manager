<?php

namespace App\Observers;

use App\Models\Payment;
use App\Models\User;
use App\Notifications\PaymentEmailNoficationToTreasurer;
use App\Notifications\PaymentEmailNoficationToUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use PDF;

class PaymentActionObserver
{
    /**
     * Handle the Payment "created" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function created(Payment $payment)
    {
        $data  = ['action' => 'created', 'model_name' => 'Payment'];
        //$lastRecord = DB::table('payments')->orderBy('id', 'DESC')->first();
        //$user = \App\Models\User::where('account_id',$lastRecord->account_id)->get();
        $treasurers = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title','Admin');
        })->get();

        $lastRecord = Payment::with('account')->orderBy('id', 'DESC')->first();
        $user = User::where('account_id',$lastRecord->account_id)->get();
        $usersArray = $user->toArray(); // convert user object to an array
        $userNamesArray = array_column($usersArray,'name'); //get an array of user names,
        $userEmailsArray = array_column($usersArray,'email'); //get an array of user emails,
        $userNames = implode(' & ', $userNamesArray);
        $userEmails = implode('; ', $userEmailsArray);
        //dd($userEmails);
        $filename = date('Y-m-d',strtotime($lastRecord->created_at)).'-'.$lastRecord->transaction_id . '.pdf'; //e.g 2021-02-12-MPESATRAS1.pdf
        $pdf = PDF::loadView('admin.payments.pdf-receipt', compact('lastRecord','userNames','userEmails'));
        $pdf->save(storage_path($filename));
        Notification::send($treasurers, new PaymentEmailNoficationToTreasurer($data));
        Notification::send($user, new PaymentEmailNoficationToUser($lastRecord));
    }

    /**
     * Handle the Payment "updated" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function updated(Payment $payment)
    {
        //
    }

    /**
     * Handle the Payment "deleted" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function deleted(Payment $payment)
    {
        //
    }

    /**
     * Handle the Payment "restored" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function restored(Payment $payment)
    {
        //
    }

    /**
     * Handle the Payment "force deleted" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function forceDeleted(Payment $payment)
    {
        //
    }
}
