<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Document;
use Auth;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitions = Expense::where('user_id', auth::user()->id)->get();

        return view('Admin.finance.user_requisition')->with('requisitions',$requisitions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expense = new Expense;
        $expense->user_id = auth::user()->id;
        $expense->token_id = $request->token_id;
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->process_status = $request->process_status;
        $expense->save();

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //Get document names with extension and uploading as well.
        $token_id = $request->token_id;
        if($request->hasFile('document1'))
        {  
           $documentOneName = $request->file('document1')->getClientOriginalName();
           $docNameOneToStore = $token_id.'_'.$documentOneName;
           $path1 = $request->file('document1')->storeAs('Receipts', $docNameOneToStore);
        }
        else
        {
            $docNameOneToStore = $request->old_doc_1;
        }
        if($request->hasFile('document2'))
        {  
            $documentTwoName = $request->file('document2')->getClientOriginalName();
            $docNameTwoToStore = $token_id.'_'.$documentTwoName;
            $path2 = $request->file('document2')->storeAs('Receipts', $docNameTwoToStore);
        }
        else
        {
            $docNameTwoToStore = $request->old_doc_1;
        }

        $update = Expense::find($request->requestid);
        $update->amount = $request->amount;
        $update->description = $request->description;
        $update->chair_id = $request->chair_id;
        $update->chair_approval_status = $request->chair_approval_status;
        $update->chair_approval_date = $request->chair_approval_date;
        $update->treasurer_id = $request->treasurer_id;
        $update->treasurer_approval_status = $request->treasurer_approval_status;
        $update->treasurer_approval_date = $request->treasurer_approval_date;
        $update->process_status = $request->process_status;
        $update->doc_1 = $docNameOneToStore;
        $update->doc_2 = $docNameTwoToStore;
        $update->update();

        return back();
        
    }
    public function removeDocument(Request $request, Expense $expense)
    {
       
        $update = Expense::find($request->request_id);
        $update->doc_1 = $request->doc_1;
        $update->doc_2 = $request->doc_2;
        $update->update();

        return back();
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }

    public function fetchTreasurerExpenses()
    {
        $requisitions = Expense::all();

        return view('Admin.finance.treasurer_approval')->with('requisitions',$requisitions);
    }

    public function fetchChairExpenses()
    {
        $requisitions = Expense::all();

        return view('Admin.finance.chair_approval')->with('requisitions',$requisitions);
    }
}
