@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Payment Details
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.payments.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>Payment ID</th>
                        <td>{{ $payment->id }}</td>
                    </tr>
                    <tr>
                        <th>Account Name</th>
                        <td>{{ $payment->account->account_name ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td>{{ $payment->amount }}</td>
                    </tr>
                    <tr>
                        <th>Month</th>
                        <td>{{ $payment->month }}</td>
                    </tr>
                    <tr>
                        <th>Year}</th>
                        <td>{{ $payment->year }}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.payments.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
