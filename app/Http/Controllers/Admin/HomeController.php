<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Models\Account;
use App\Models\Payment;
use App\Models\Month;

class HomeController
{
    public function index()
    {
        $user = auth::user();
        $user->load('roles');
        $payments = Payment::where('account_id',$user->account_id)->orderBy('id','DESC')->limit(6)->get();
        $account_name = Account::where('id',$user->account_id)->value('account_name');

        return view('home', compact('user','payments','account_name'));
    }
}
