@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Show Account
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.accounts.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>Account ID</th>
                        <td>{{ $account->id }}</td>
                    </tr>
                    <tr>
                        <th> Account Name</th>
                        <td>{{ $account->account_name }}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.accounts.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#account_users" role="tab" data-toggle="tab">
                    Owner(s)/Contributor(s)
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#account_payments" role="tab" data-toggle="tab">
                    Payments History
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="account_users">
                @includeIf('admin.accounts.relationships.accountUsers', ['users' => $account->accountUsers])
            </div>
            <div class="tab-pane" role="tabpanel" id="account_payments">
                @includeIf('admin.accounts.relationships.accountPayments', ['payments' => $account->accountPayments])
            </div>
        </div>
    </div>

@endsection
