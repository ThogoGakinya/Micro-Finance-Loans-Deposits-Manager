@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Edit Account
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.accounts.update", [$account->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="account_name">Account Name</label>
                    <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', $account->account_name) }}">
                    @if($errors->has('account_name'))
                        <span class="text-danger">{{ $errors->first('account_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary" type="submit">
                        {{ trans('global.update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
