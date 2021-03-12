@extends('layouts.old_password')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6" align="left">
                    <h5> <i class="fa fa-key" aria-hidden="true"></i> Change Default Password</h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="border-bottom: 0px solid;">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Password</a></li>
                        <li class="breadcrumb-item active">User</li>
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
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header p-2">
                    @php
                      $username = auth::user()->name;
                      $array = explode(' ', $username);
                    @endphp
               <p>Dear {{$array[0]}},<br/>
                You logged in with a default password.<br/>
                Please consider changing the password now to proceed.
                </p>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="tab-pane {{$passchecker}}" id="settings">
                  <div class="panel-body">
                  <form method="POST" action="{{ route('admin.users.password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="current_password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-edit"></i> {{ __('Change Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                   </div>
                  </div>
                  <!-- /.tab-pane -->
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
