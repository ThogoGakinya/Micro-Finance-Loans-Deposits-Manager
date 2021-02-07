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
                      <a href="{{route ('admin.home')}}" class="btn btn-default btn-xs" ><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a> 
                    </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                  <a data-toggle="collapse" id="primary" data-parent="#accordion" href="#collapsePrimary" class="btn btn-primary">
                                  <i class="fas fa-plus-circle"></i> Credit Primary Account
                                  </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="card "> 
                                      <div id="collapsePrimary" class="panel-collapse collapse in">
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
                                                        <input type="hidden" id="response" value="{{$ResponseCode}}">
                                                        @if($ResponseCode == 0)
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
                                                    @if($ResponseCode == 0)
                                                      <button type="button" id="validate" class="btn btn-primary" onclick="complete();"><i class="fas fa-check-circle"></i> Validate</button><br/>
                                                    @else
                                                      <button type="submit" id="getBack" class="btn btn-success" onclick="numberValidator();"><i class="fa fa-repeat" aria-hidden="true"></i> Initiate</button><br/>
                                                    @endif
                                                    <a class="btn btn-success" id="finish" style="display:none;" href="{{route('admin.payments.index')}}"><i class="fa fa-flag-checkered" aria-hidden="true"></i> Finish</a>
                                                </div>
                                                <hr/> 
                                            </form>
                                        </div>
                                      </div>
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseSecondary" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i> Credit Secondary Account
                                  </a>
                                </h4>
                            </div>
                            <div class="card-body">
                              <div class="card "> 
                                  <div id="collapseSecondary" class="panel-collapse collapse in">
                                    <div class="card-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                      3
                                      wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                      laborum
                                      eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                                      nulla
                                      assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                                      nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                                      beer
                                      farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                      labore sustainable VHS.
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