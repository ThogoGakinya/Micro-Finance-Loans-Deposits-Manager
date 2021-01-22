@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Show Role
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.roles.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $role->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>
                            {{ $role->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>Permissions</th>
                        <td>
                            @foreach($role->permissions as $key => $permissions)
                                <span class="label label-info">{{ $permissions->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default"
                       href="{{ route('admin.roles.index') }}">{{ trans('global.back_to_list') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
