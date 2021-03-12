<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
    public function index()
    {
        if(session('success'))
        {
            toast('Success!','Request Submitted Successfully');
        }
        if(session('error'))
        {
            toast('Error', 'Error');
        }
        abort_if(Gate::denies('account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accounts = Account::all();

        return view('admin.accounts.index', compact('accounts'));
    }

    public function create()
    {
        if(session('success'))
        {
            toast('Success!','Request Submitted Successfully');
        }
        if(session('error'))
        {
            toast('Error', 'Error');
        }
        abort_if(Gate::denies('account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.accounts.create');
    }

    public function store(Request $request)
    {
        if(session('success'))
        {
            toast('Success!','Request Submitted Successfully');
        }
        if(session('error'))
        {
            toast('Error', 'Error');
        }
        $account = Account::create($request->all());

        return redirect()->route('admin.accounts.index');
    }

    public function edit(Account $account)
    {
        if(session('success'))
        {
            toast('Success!','Request Submitted Successfully');
        }
        if(session('error'))
        {
            toast('Error', 'Error');
        }
        //abort_if(Gate::denies('account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.accounts.edit', compact('account'));
    }

    public function update(Request $request, Account $account)
    {
        if(session('success'))
        {
            toast('Success!','Request Submitted Successfully');
        }
        if(session('error'))
        {
            toast('Error', 'Error');
        }
        $account->update($request->all());

        return redirect()->route('admin.accounts.index');
    }

    public function show(Account $account)
    {
        if(session('success'))
        {
            toast('Success!','Request Submitted Successfully');
        }
        if(session('error'))
        {
            toast('Error', 'Error');
        }
        abort_if(Gate::denies('account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->load('accountUsers', 'accountPayments');
        $users = User::WhereNull('account_id')->get();

        return view('admin.accounts.show', compact('account','users'));
    }
    public function myAccount()
    {
        if(session('success'))
        {
            toast('Success!','Request Submitted Successfully');
        }
        if(session('error'))
        {
            toast('Error', 'Error');
        }
        abort_if(Gate::denies('my_account'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $account_id = auth()->user()->account_id;
        $account= Account::where('id','=',$account_id)->with('accountUsers', 'accountPayments')->first();
        return view('admin.accounts.myAccount', compact('account'));
    }

    public function destroy(Account $account)
    {
        if(session('success'))
        {
            toast('Success!','Request Submitted Successfully');
        }
        if(session('error'))
        {
            toast('Error', 'Error');
        }
        abort_if(Gate::denies('account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        if(session('success'))
        {
            toast('Success!','Request Submitted Successfully');
        }
        if(session('error'))
        {
            toast('Error', 'Error');
        }
        Account::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
