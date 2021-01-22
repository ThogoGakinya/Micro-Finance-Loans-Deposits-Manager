@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Show User
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default"
                       href="{{ route('admin.users.index') }}"> {{ trans('global.back_to_list') }}</a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td> {{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Account</th>
                        <td>{{ $user->account->account_name ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Roles</th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default"
                       href="{{ route('admin.users.index') }}">{{ trans('global.back_to_list') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
