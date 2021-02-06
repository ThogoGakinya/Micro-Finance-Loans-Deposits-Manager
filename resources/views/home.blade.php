@extends('layouts.admin')
    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6" align="left">
                <h5>Admin Dashboard</h5>
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

                                            <div class="row">
                                              <div class="col-lg-3 col-6">

                                                <div class="small-box bg-info">
                                                  <div class="inner">
                                                    <h4>Users Management</h4>
                                                    <p>Click to manage</small>
                                                  </div>
                                                  <div class="icon">
                                                  <i class="fa-fw fas fa-users c-sidebar-nav-icon"></i>
                                                  </div>

                                                  <a href="{{ route("admin.users.index") }}" class="small-box-footer">
                                                    View <i class="fas fa-arrow-circle-right"></i>
                                                  </a>
                                                </div>
                                              </div>
                                              <!-- ./col -->
                                              <div class="col-lg-3 col-6">
                                                <!-- small card -->
                                                <div class="small-box bg-success">
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
                                              <!-- ./col -->
                                              <div class="col-lg-3 col-6">
                                                <!-- small card -->
                                                <div class="small-box bg-warning">
                                                  <div class="inner">
                                                    <h4>Payments</h4>

                                                    <p>Click to view</p>
                                                  </div>
                                                  <div class="icon">
                                                  <i class="fa fa-money" aria-hidden="true"></i>
                                                  </div>
                                                  <a href="{{ route("admin.payments.index") }}" class="small-box-footer">
                                                    View <i class="fas fa-arrow-circle-right"></i>
                                                  </a>
                                                </div>
                                              </div>
                                              <!-- ./col -->
                                              <div class="col-lg-3 col-6">
                                              <!-- small card -->
                                              <div class="small-box bg-danger">
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
                                            <!-- ./col -->
                                          </div>

 <!---------------------------------------- end of page content---------------------------------------------------------------->
                 </div> <!-- end of tab-content-->
            </div><!--container-fluid -->
        </section>
@endsection
@section('scripts')
    @parent
@endsection
