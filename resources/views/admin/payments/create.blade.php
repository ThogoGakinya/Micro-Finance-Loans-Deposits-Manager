@extends('layouts.admin')
    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6" align="left">
                <h5>Make Payment</h5>
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
                 <div class="tab-pane active" id="login_details">
                  <div class="panel panel-default">
                   <div class="panel-heading">
                      <a href="{{route ('admin.home')}}" class="btn btn-primary btn-sm" id="edit_goal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a> 
                    </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">M-PESA Self</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="post"  name="frm"class="form-horizontal" action="{{route('stk-initial')}}" enctype="multipart/form-data">
                                     {{ csrf_field() }}
                                     <div class="row">
                                        <div class="col-md-4">
                                            Enter Amount
                                        </div>
                                            <div class="col-md-8">
                                            <input type="text" class="form-control" name="amount" min="0" max="150000" value = "0">
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
                                            @if($ResponseCode == 0)
                                            <div class="alert alert-info alert-dismissible" id="first" align="center">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h5><i class="icon fas fa-info"></i> Alert!</h5>
                                                Please unlock your phone screen to enter your M-Pesa PIN.<br/>
                                                **Click on the complete button below upon receiving M-PESA message**
                                            </div>
                                            <input type="text" id="CheckoutRequestID" value="{{$CheckoutRequestID}}">
                                            <marquee id="maq" scrollamount="1" behavior="alternate" style="color:red;"><strong>NOTE</strong> : If you dont receive an M-PESA prompt,<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;your balance is insufficient for this transaction</marquee>
                                            @endif
                                            
                                           
                                    </div>
                                    <hr/>
                                    <div align="center">
                                        @if($ResponseCode == 0)
                                           <button type="button" id="validate" class="btn btn-primary" onclick="complete();"><i class="fas fa-check"></i> Validate</button><br/>
                                        @else
                                           <button type="submit" id="getBack" class="btn btn-success" onclick="numberValidator();"><i class="fa fa-repeat" aria-hidden="true"></i> Initiate</button><br/>
                                        @endif
                                        <a class="btn btn-success" id="finish" style="display:none;" href="{{route('admin.payments.index')}}"><i class="fa fa-flag-checkered" aria-hidden="true"></i> Finish</a>
                                    </div>
                                    <hr/> 
                                </form>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Second Party </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                             Also here
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