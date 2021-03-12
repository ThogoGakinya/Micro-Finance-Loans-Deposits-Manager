@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6" align="left">
                    <h5>Update Profile</h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="border-bottom: 0px solid;">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid winbox-white">
    <div class="row justify-content-center align-items-round">
          <div class="col-md-12">
            <div class="card card-secondary">
              <div class="card-header p-2">
               <h5><i class="fa fa-user"></i> Profile</h5>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="tab-pane" id="timeline">
                    <!-- The profile -->
                    <form method="POST" action="{{ route("admin.users.change-profile", [auth::user()->id]) }}" enctype="multipart/form-data">
                     @method('PUT')
                     @csrf
                   <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                src="{{asset('Documents/Profiles/'.auth::user()->img_name)}}"
                                alt="User profile picture">
                            </div>
                            <label for="pic">{{ __('Change Profile Picture') }}</label>
                            
                                <input  type="file" class="form-control" name="profile_picture" required><br/>
                                <input  type="hidden" class="form-control" name="user_id" value="{{auth::user()->id}}"><br/>
                                <button  type="submit" class="btn btn-success">Change Photo</button>
                   </form>  
                   <form method="POST" action="{{ route("admin.users.self-update", [auth::user()->id]) }}" enctype="multipart/form-data">
                     @method('PUT')
                     @csrf
                        </div>
                        <div class="col-md-8">
                          <div class="row">
                             <div class="col-md-4" align="right">
                                 Name: 
                             </div>
                             <div class="col-md-8">
                                <input  type="text" class="form-control" name="name" value="{{auth::user()->name}}">
                                <input  type="hidden" class="form-control" name="user_id" value="{{auth::user()->id}}">
                             </div>
                          </div><br/>
                          <div class="row">
                             <div class="col-md-4" align="right">
                                 Email: 
                             </div>
                             <div class="col-md-8">
                                <input  type="text" class="form-control" name="email" value="{{auth::user()->email}}">
                                <input  type="hidden" class="form-control" name="user_id" value="{{auth::user()->id}}">
                             </div>
                          </div><br/>
                          <div class="row">
                             <div class="col-md-4" align="right">
                                 Tel: 
                             </div>
                             <div class="col-md-8">
                                <input  type="text" class="form-control" name="mobile_number" value="{{auth::user()->mobile_number}}">
                             </div>
                          </div><br/>
                          <div class="row">
                             <div class="col-md-4" align="right">
                                 National ID: 
                             </div>
                             <div class="col-md-8">
                                <input  type="text" class="form-control" name="national_id" value="{{auth::user()->national_id}}">
                             </div>
                          </div><br/>
                          <div class="row">
                             <div class="col-md-8" align="right">
                                <button  type="submit" class="btn btn-success">Update</button>
                             </div>
                          </div>
                        </div>
                    </form>
                   </div>
                   <!-- end profile -->
                  </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
@section('scripts')
    @parent
@endsection
