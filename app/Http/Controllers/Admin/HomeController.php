<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Models\Account;
use App\Models\Role;
use App\Models\Payment;
use App\Models\Month;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class HomeController
{
    public function index()
    {
        if(session('success'))
        {
            Alert::success('Success!', 'Password Changed Successfully');
             $passchecker = "active";
             $homechecker = "";
        }
        elseif(session('error'))
        {
            Alert::error('Error!', 'Wrong Current Password');
            $passchecker = "active";
            $homechecker = "";
        }
        elseif(session('match'))
        {
            Alert::error('Error!', 'New password can not be same as Old Password');
            $passchecker = "active";
            $homechecker = "";
        }
        elseif(session('mismatch'))
        {
            Alert::error('Error!', 'Confirmation password does not match with New Password');
            $passchecker = "active";
            $homechecker = "";
        }
        elseif(session('updated'))
        {
            Alert::error('Success!', 'Profile updated successfully');
            $passchecker = "active";
            $homechecker = "";
        }
        else
        {
            toast('' .auth::user()->name,'success');
            $passchecker = "";
            $homechecker = "active";
        }
        
        if((Hash::check('password', Auth::user()->password)))
        { 
            $passchecker = "active";
            $homechecker = "";
            return view('old_password', compact('passchecker','homechecker'));
        }
        else
        {
        $user = auth::user();
        $months = Month::all();
        $accounts = Account::all();
        $roles = Role::all()->pluck('title', 'id');
        $user->load('roles');
        $payments = Payment::where('account_id',$user->account_id)->orderBy('id','DESC')->limit(6)->get();
        $account_name = Account::where('id',$user->account_id)->value('account_name');

        return view('home', compact('user','payments','account_name','accounts','passchecker','homechecker','roles','months'));
        }
    }
}
