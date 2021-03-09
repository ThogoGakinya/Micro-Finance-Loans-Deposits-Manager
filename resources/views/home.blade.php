@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6" align="left">
                    <h5>Dashboard</h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="border-bottom: 0px solid;">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid winbox-white">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('Documents/'.auth::user()->img_name)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{auth::user()->name}}</h3>

                <p class="text-muted text-center">
                                 @foreach($user->roles as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{auth::user()->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">+254{{auth::user()->mobile_number}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Acc.</b> <a class="float-right">{{$account_name}}</a>
                  </li>
                  <!-- <li class="list-group-item">
                    <b>Extension</b> <a class="float-right">{{auth::user()->ext}}</a>
                  </li> -->
              
                </ul>

                <a class="btn btn-primary nav-link" href="#timeline" data-toggle="tab"><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Apps</a></li>
                  <li class="nav-item"><a class="nav-link" href="#payments" data-toggle="tab">Recent Payments</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="container-fluid">
                    <div class="row">
                    @can('user_management_access')
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h4>Users Management</h4>
                                    <p>Click to manage</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-fw fas fa-users c-sidebar-nav-icon"></i>
                                </div>

                                <a href="{{ route("admin.users.index") }}" class="small-box-footer">
                                    View <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    @endcan
                <!-- ./col -->
                    @can('account_access')
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h4>Accounts</h4>

                                    <p>Click to view</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-fw fas fa-user-friends c-sidebar-nav-icon"></i>
                                </div>
                                <a href="{{ route("admin.accounts.index") }}" class="small-box-footer">
                                    view <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    @endcan
                <!-- ./col -->
                <!-- ./col -->
                    @can('payment_create')
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h4>Make Payment</h4>

                                    <p>Click to pay</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-plus"></i>
                                </div>
                                <a href="{{ route('admin.payments.pay') }}" class="small-box-footer">
                                    Initiate <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    @endcan
                    @can('request_cash')
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h4>Request Cash</h4>

                                    <p>Click to request</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <a href="{{ route('admin.finance.index') }}" class="small-box-footer">
                                    Expense <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    @endcan
                <!-- ./col -->
                </div>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The profile -->
                    <form method="post"  class="form-horizontal" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                   <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                src="{{asset('Documents/'.auth::user()->img_name)}}"
                                alt="User profile picture">
                            </div>
                            <label for="password">{{ __('Change Profile Picture') }}</label>
                            
                                <input  type="file" class="form-control" name="profile_picture" required><br/>
                                <input  type="hidden" class="form-control" name="user_id" value="{{auth::user()->id}}"><br/>
                                <button  type="submit" class="btn btn-success">Change Photo</button>
                   </form>  
                   <form method="post"  class="form-horizontal" action="" enctype="multipart/form-data">
                    {{ csrf_field() }} 
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
                             </div>
                          </div><br/>
                          <div class="row">
                             <div class="col-md-4" align="right">
                                 Tel: 
                             </div>
                             <div class="col-md-8">
                                <input  type="text" class="form-control" name="phone" value="{{auth::user()->phone}}">
                             </div>
                          </div><br/>
                          <div class="row">
                             <div class="col-md-4" align="right">
                                 Title: 
                             </div>
                             <div class="col-md-8">
                                <input  type="text" class="form-control" name="title" value="{{auth::user()->title}}">
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
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="payments">
                  <table
                        class="table table-bordered table-hover responsive ">
                        <thead>
                        <tr>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($payments)>0)
                            @foreach($payments as $key=> $payment)
                                <tr>
                                    <td>{{ Carbon\Carbon::createFromFormat('m', $payment->month ?? '')->format('M')}}</td>
                                    <td>{{$payment->year ?? ''}}</td>
                                    <td>Ksh {{number_format($payment->amount)  ??''}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  <div class="panel-body">
                   <form method="POST" action=>
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
                                <button type="submit" class="btn btn-default">
                                    {{ __('Change Password') }}
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
