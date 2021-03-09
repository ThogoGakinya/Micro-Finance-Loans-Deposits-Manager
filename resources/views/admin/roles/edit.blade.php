@extends('layouts.admin')
    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6" align="left">
                <h5><a href="{{route('admin.roles.index')}}" class="btn btn-success btn-xs" id="edit_goal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a>
                 Edit Role
                </h5>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right" style="border-bottom: 0px solid;">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Roles</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
    <!-- Main content -->
          <section class="content">
            <div class="container-fluid winbox-white">
                <div class="tab-content"  style="margin-top:16px;">
 <!--------------------------------- Page content begins here ------------------------->
 <div class="card card-secondary">
        <div class="card-header">
          <h6><i class="fa fa-edit"></i> Edit Role</h6>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.roles.update", [$role->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="title">Name</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                           id="title" value="{{ old('title', $role->title) }}" required>
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
                                value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
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
 


 <!--------------------------------- Page content ends here---------------------------->
                 </div> <!-- end of tab-content-->
            </div><!--container-fluid -->
        </section>
@endsection
