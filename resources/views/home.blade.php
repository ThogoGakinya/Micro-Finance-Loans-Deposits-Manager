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
                       src="{{ asset('Documents/Profiles/'.auth::user()->img_name)}}"
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

                <a class="btn btn-primary nav-link" href="{{route('admin.users.profile')}}" ><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
          @if(!empty($message))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @endif
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link {{$homechecker}}" href="#activity" data-toggle="tab">Apps</a></li>
                  <li class="nav-item"><a class="nav-link" href="#payments" data-toggle="tab">Recent Payments</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link {{$passchecker}}" href="#settings" data-toggle="tab">Change Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="{{$homechecker}} tab-pane" id="activity">
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
                                <a href="" data-toggle="modal" data-target="#add-payment" class="small-box-footer">
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

<!-- start of the modal form to add a payment entry -->
<div class="modal fade" id="add-payment">
          <div class="modal-dialog">
            <div class="modal-content">
            <div class="card card-secondary">
        <div class="card-header"><i class="fa fa-plus"></i> Make a Payment
        </div>

        <div class="card-body">
        @if(empty($account_name))
            <div class="callout callout-danger">
                <h5><i class="fas fa-info"></i> Note:</h5>
                Dear <strong>{{ Auth::user()->name }}, </strong> There is no Account linked to you at the moment,Please contact your System Administrator
            </div>
        @else
            <form method="POST" action="{{ route("admin.payments.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="amount">Your Account Name</label>
                    <input class="form-control" type="text" name="amount" id="amount" value="{{$account_name}}" readonly>
                    <input class="form-control" type="hidden" name="account_id"  value="{{auth::user()->account_id}}">
                   
                </div>
                <div class="form-group">
                    <label for="amount">Amount to Pay</label>
                    <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number"
                           name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                    @if($errors->has('amount'))
                        <span class="text-danger">{{ $errors->first('amount') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="amount">MPESA ID</label>
                    <input class="form-control {{ $errors->has('transaction_id') ? 'is-invalid' : '' }}" type="text"
                           name="transaction_id" id="transaction_id" value="{{ old('transaction_id', '') }}" required>
                    @if($errors->has('transaction_id'))
                        <span class="text-danger">{{ $errors->first('transaction_id') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="month">Month</label>
                   <select class="form-control" name="month" required>
                     <option value="">Select Month</option>
                     @foreach($months as $month)
                     <option value="{{$month->id}}">{{$month->name}}</option>
                     @endforeach

                   </select>
                    @if($errors->has('month'))
                        <span class="text-danger">{{ $errors->first('month') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <select class="form-control" name="year" required>
                        <option value="">Select Year</option>
                        <option value="2020">2020</option>
                        <option value="2020">2021</option>
                        <option value="2020">2022</option>
                        
                   </select>
                    @if($errors->has('year'))
                        <span class="text-danger">{{ $errors->first('year') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        Complete
                    </button>
                </div>
            </form>
        @endif
        </div>
    </div>
            </div>   <!-- /.modal-content -->
        </div>
    </div><!-- /.modal-dialog -->
<!-- end of the modal form to add a cash request-->

@endsection
@section('scripts')
    @parent
@endsection
