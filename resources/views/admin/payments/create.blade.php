@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">Make a Payment
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.payments.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="account_id">Account Name to Pay for</label>
                    <select class="form-control select2 {{ $errors->has('account') ? 'is-invalid' : '' }}" name="account_id" id="account_id">
                        @foreach($accounts as $id => $account)
                            <option value="{{ $id }}" {{ old('account_id') == $id ? 'selected' : '' }}>{{ $account }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('account'))
                        <span class="text-danger">{{ $errors->first('account') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="amount">Amount to Pay</label>
                    <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01">
                    @if($errors->has('amount'))
                        <span class="text-danger">{{ $errors->first('amount') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="month">Month</label>
                    <input class="form-control {{ $errors->has('month') ? 'is-invalid' : '' }}" type="text" name="month" id="month" value="{{ old('month', '') }}">
                    @if($errors->has('month'))
                        <span class="text-danger">{{ $errors->first('month') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year" id="year" value="{{ old('year', '') }}">
                    @if($errors->has('year'))
                        <span class="text-danger">{{ $errors->first('year') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        Complete
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
