@extends('layouts.admin')
    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6" align="left">
                <h5><a href="{{route('admin.permissions.index')}}" class="btn btn-success btn-xs" id="edit_goal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a>
                  Edit Permission
                </h5>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right" style="border-bottom: 0px solid;">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">permissions</li>
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
           <h6><i class="fa fa-edit"></i> Edit Permission </h6>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.permissions.update", [$permission->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="title">Name</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $permission->title) }}" required>
                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
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
