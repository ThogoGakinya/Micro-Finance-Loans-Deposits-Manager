@extends('layouts.admin')
    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6" align="left">
                <h5> <a href="{{route ('admin.home')}}" class="btn btn-success btn-xs" ><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a> Make Payment</h5>
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
                <div class="tab-content"  style="margin-top:16px;">
 <!--------------------------------- Page content begins here ------------------------->
          <div class="card card-secondary">
                  <div class="card-header">
                    <h6> <i class="fas fa-money"></i> Create Payment
                    </h6>
                  </div><br/>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                  <a data-toggle="collapse" id="primary" data-parent="#accordion" href="#collapsePrimary" class="btn btn-info">
                                  <i class="fas fa-plus-circle"></i> Credit Primary Account
                                  </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="card ">
                                      <div id="collapsePrimary" class="panel-collapse collapse in">
                                        <div class="card-body">
                                            <form method="post"  name="frm"class="form-horizontal" action="{{route('admin.payments.stk-initial')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Enter Amount
                                                    </div>
                                                        <div class="col-md-8">
                                                        <input type="text" class="form-control" name="amount" id="amount" min="0" max="150000" value = "0">
                                                        </div>
                                                </div><br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Year
                                                    </div>
                                                        <div class="col-md-8">
                                                        <select id="year" name="year" class="form-control" required>
                                                          <option value="">Select Year</option>
                                                          <option value="{{date('Y')}}">{{date('Y')}}</option>
                                                          <option value="{{date('Y')-1}}">{{date('Y')-1}}</option>
                                                          <option value="{{date('Y')+1}}">{{date('Y')+1}}</option>
                                                          <option value="{{date('Y')-2}}">{{date('Y')-2}}</option>
                                                        </select>
                                                        </div>
                                                </div><br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Month:
                                                    </div>
                                                    <div class="col-md-8" >
                                                      <div class="row" id="month" style="background:#D0D0D0; border-radius:2%;">

                                                      </div><br/>
                                                      <div class="distribution" id="distribution">
                                                      
                                                      </div>
                                                    <input type="hidden" id="account_id" class="form-control" value ="{{auth::user()->account_id}}">
                                                    <input type="hidden" id="months_count" name="months_count" class="form-control" value ="">
                                                    <input type="hidden" id="" name="months_count_2" class="form-control" value ="0">
                                                    </div>
                                                </div><br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                    M-PESA Number
                                                    </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="number" id="number" value="254">
                                                            <small>Number format : 2547xxxxxxxx</small>
                                                            </div>
                                                        </div>
                                                        <br/><br/>
                                                        <div id="loader" align="center" style="display:none;"><img src="{{asset('img/ajax-loader.gif')}}" alt="Loader"></div>
                                                        <div id="results"></div>
                                                        <input type="hidden" id="response" value="{{$clicker}}">
                                                       @if($ResponseCode == 0 && $data[1] == auth::user()->account_id)
                                                      
                                                        <div class="alert alert-info alert-dismissible" id="first" align="center">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            <h5><i class="icon fas fa-info"></i> Alert!</h5>
                                                            Please unlock your phone screen to enter your M-Pesa PIN.<br/>
                                                            **Click on the validate button below upon receiving M-PESA message**
                                                        </div>
                                                        <input type="text" id="CheckoutRequestID" value="{{$CheckoutRequestID}}">
                                                        <marquee id="maq" scrollamount="1" behavior="alternate" style="color:red;"><strong>NOTE</strong> : If you dont receive an M-PESA prompt,<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;your balance is insufficient for this transaction</marquee>
                                                        @endif


                                                </div>
                                                <hr/>
                                                <div align="center">
                                                    @if($ResponseCode == 0 && $data[1] == auth::user()->account_id)
                                                      <button type="button" id="validate" class="btn btn-primary" onclick="complete();"><i class="fas fa-check-circle"></i> Validate</button><br/>
                                                    @else
                                                      <button type="submit" id="getBack" class="btn btn-success" onclick="numberValidator();"><i class="fa fa-repeat" aria-hidden="true"></i> Initiate</button><br/>
                                                    @endif
                                                </div>
                                                <hr/>
                                                </form>
                                                <div align="center">
                                                  <form method="post"  name="frm"class="form-horizontal" action="{{route('admin.payments.finish')}}" enctype="multipart/form-data">
                                                      {{ csrf_field() }}
                                                      <input type="hidden" id="data" name="data" value="{{json_encode($data)}}">
                                                      <button class="btn btn-success" id="finish" style="display:none;" type="submit"><i class="fa fa-flag-checkered" aria-hidden="true"></i> Finish</button>
                                                  </form>
                                                </div><br/>
                                        </div>
                                      </div>
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                  <a data-toggle="collapse" id="primary_2" data-parent="#accordion" href="#collapseSecondary" class="btn btn-info">
                                    <i class="fas fa-plus-circle"></i> Credit Secondary Account
                                  </a>
                                </h4>
                            </div>
                            <div class="card-body">
                              <div class="card ">
                                  <div id="collapseSecondary" class="panel-collapse collapse in">
                                  <div class="card-body">
                                            <form method="post"  name="frm_2" class="form-horizontal" action="{{route('admin.payments.stk-initial')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Secondary Account
                                                    </div>
                                                      <div class="col-md-8">
                                                        <select id="account_id_2" name="account_id" class="form-control" required>
                                                          <option value="">Select Account</option>
                                                          @foreach($accounts as $account)
                                                            <option value="{{$account->id}}">{{$account->account_name}}</option>
                                                          @endforeach
                                                        </select>
                                                      </div>
                                                </div><br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Enter Amount
                                                    </div>
                                                        <div class="col-md-8">
                                                        <input type="text" class="form-control" name="amount_2" id="amount_2" min="0" max="150000" value = "0">
                                                        </div>
                                                </div><br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Year
                                                    </div>
                                                        <div class="col-md-8">
                                                        <select id="year_2" name="year_2" class="form-control" required>
                                                          <option value="">Select Year</option>
                                                          <option value="{{date('Y')}}">{{date('Y')}}</option>
                                                          <option value="{{date('Y')-1}}">{{date('Y')-1}}</option>
                                                          <option value="{{date('Y')+1}}">{{date('Y')+1}}</option>
                                                          <option value="{{date('Y')-2}}">{{date('Y')-2}}</option>
                                                        </select>
                                                        </div>
                                                </div><br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Month:
                                                    </div>
                                                    <div class="col-md-8" >
                                                      <div class="row" id="month_2" style="background:#D0D0D0; border-radius:2%;">

                                                      </div><br/>
                                                      <div class="distribution" id="distribution_2">
                                                      
                                                      </div>
                                                   
                                                    <input type="hidden" id="months_count_2" name="months_count_2" class="form-control" value ="">
                                                    </div>
                                                </div><br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                    M-PESA Number
                                                    </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="number_2" id="number_2" value="254">
                                                            <small>Number format : 2547xxxxxxxx</small>
                                                            </div>
                                                        </div>
                                                        <br/><br/>
                                                        <div id="loader_2" align="center" style="display:none;"><img src="{{asset('img/ajax-loader.gif')}}" alt="Loader"></div>
                                                        <div id="results_2"></div>
                                                        <input type="hidden" id="response_2" value="{{$ResponseCode}}">
                                                        @if($ResponseCode == 0 && $data[1] != auth::user()->account_id)
                                                        <div class="alert alert-info alert-dismissible" id="first_2" align="center">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            <h5><i class="icon fas fa-info"></i> Alert!</h5>
                                                            Please unlock your phone screen to enter your M-Pesa PIN.<br/>
                                                            **Click on the validate button below upon receiving M-PESA message**
                                                        </div>
                                                        <input type="text" id="CheckoutRequestID_2" value="{{$CheckoutRequestID}}">
                                                        <marquee id="maq_2" scrollamount="1" behavior="alternate" style="color:red;"><strong>NOTE</strong> : If you dont receive an M-PESA prompt,<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;your balance is insufficient for this transaction</marquee>
                                                        @endif


                                                </div>
                                                <hr/>
                                                <div align="center">
                                                    @if($ResponseCode == 0 && $data[1] != auth::user()->account_id)
                                                      <button type="button" id="validate_2" class="btn btn-primary" onclick="complete_2();"><i class="fas fa-check-circle"></i> Validate</button><br/>
                                                    @else
                                                      <button type="submit" id="getBack_2" class="btn btn-success" onclick="numberValidator_2();"><i class="fa fa-repeat" aria-hidden="true"></i> Initiate</button><br/>
                                                    @endif
                                                </div>
                                                <hr/>
                                                </form>
                                                <div align="center">
                                                  <form method="post"  name="frm"class="form-horizontal" action="{{route('admin.payments.finish')}}" enctype="multipart/form-data">
                                                      {{ csrf_field() }}
                                                      <input type="hidden" id="data_2" name="data" value="{{json_encode($data)}}">
                                                      <button class="btn btn-success" id="finish_2" style="display:none;" type="submit"><i class="fa fa-flag-checkered" aria-hidden="true"></i> Finish</button>
                                                  </form>
                                                <div><br/>
                                        </div>
                                  </div>
                              </div>
                            </div>
                            </div>
                            </div>
                          </div>
                        </div>
                   </div>
                  </div>
 <!---------------------------------------- end of page content---------------------------------------------------------------->
                 </div> <!-- end of tab-content-->
            </div><!--container-fluid -->
        </section>
@endsection
