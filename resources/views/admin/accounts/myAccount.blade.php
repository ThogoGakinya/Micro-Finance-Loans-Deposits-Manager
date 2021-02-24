@extends('layouts.admin')
@section('content')

    <di>
        @if (empty($account->id))
            <div class="callout callout-danger">
                <h5><i class="fas fa-info"></i> Note:</h5>
                Dear <strong>{{ Auth::user()->name }}, </strong> There is no Account linked to you at the moment
            </div>
        @else
        <div class="card">
            <table class="table table-responsive-sm table-striped">
                <tbody>
                <tr>
                    <td>Account Number: {{  $account->id ?? ''}}</td>
                    <td> Account Name: {{  $account->account_name ?? ''}}</td>
                </tr>
                </tbody>
            </table>
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
        @endif
    </di>

@endsection
