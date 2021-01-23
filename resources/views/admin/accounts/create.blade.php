@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Create New Account
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.accounts.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="account_name">Account Name</label>
                    <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text"
                           name="account_name" id="account_name" value="{{ old('account_name', '') }}">
                    @if($errors->has('account_name'))
                        <span class="text-danger">{{ $errors->first('account_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
