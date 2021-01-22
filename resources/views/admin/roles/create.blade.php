@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Create New Role
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.roles.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="title">Name</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                           id="title" value="{{ old('title', '') }}" required>
                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="permissions">Permissions</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                              style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                              style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}"
                            name="permissions[]" id="permissions" multiple required>
                        @foreach($permissions as $id => $permissions)
                            <option
                                value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('permissions'))
                        <span class="text-danger">{{ $errors->first('permissions') }}</span>
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
