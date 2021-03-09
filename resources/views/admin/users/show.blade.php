@extends('layouts.admin')
    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6" align="left">
                <h5><a href="{{route('admin.users.index')}}" class="btn btn-success btn-xs" id="edit_goal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a>
                 View User Profile 
                </h5>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right" style="border-bottom: 0px solid;">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Users</li>
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
       
        <div class="card-body">
        <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card card-secondary">
                <div class="card-header">
                   <h6><i class="fa fa-user"></i> Profile Details</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        @if($user->photo)
                            <a href="{{ $user->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                <img src="{{ $user->photo->getUrl('thumb') }}" alt="Admin" class="rounded-circle"
                                     width="150">
                            </a>
                        @else
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                             width="150">
                        @endif
                        <div class="mt-3">
                            <h4>{{$user->name}}</h4>
                            <p class="text-secondary mb-1">Role:
                                @foreach($user->roles as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </p>
                            {{--<p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                            <button class="btn btn-primary">Follow</button>
                            <button class="btn btn-outline-primary">Message</button>--}}
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$user->name}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$user->email}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            (+254) 729-100-200
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            Kilimani Area, Nairobi City
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            {{----}}
            <div class="card card-secondary">
                <div class="card-header">
                    Recent Payments for <strong> {{$user->name}}</strong> on account <strong>{{$account_name}}</strong>
                </div>

                <div class="card-body">
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
            </div>
        </div>
        </div>
</div>               
 


 <!--------------------------------- Page content ends here---------------------------->
                 </div> <!-- end of tab-content-->
            </div><!--container-fluid -->
        </section>
@endsection
