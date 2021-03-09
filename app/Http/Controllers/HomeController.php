<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Account;
use App\Models\Payment;
use App\Models\Month;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth::user();
        $user->load('roles');
        $payments = Payment::where('account_id',$user)->orderBy('id','DESC')->limit(6)->get();
        $account_name = Account::find(auth::user()->account_id)->value('account_name');

        return view('home', compact('user','payments','account_name'));
  
    }
}
