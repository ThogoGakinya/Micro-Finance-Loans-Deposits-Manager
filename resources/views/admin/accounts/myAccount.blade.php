@extends('layouts.admin')
    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6" align="left">
                <h5><a href="" class="btn btn-success btn-xs" id="edit_goal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a>
                  My Account 
                </h5>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right" style="border-bottom: 0px solid;">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">My account</li>
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
                   
     <div>
        @if (empty($account->id))
            <div class="callout callout-danger">
                <h5><i class="fas fa-info"></i> Note:</h5>
                Dear <strong>{{ Auth::user()->name }}, </strong> There is no Account linked to you at the moment
            </div>
        @else
          <div class="card card-secondary">
              <div class="card-header">
              <h6> <i class="fas fa-user"></i> Account Details</h6>
              </div>
              <div class="card-body">
                <div class="chart">
                <i class="fa fa-id-card" aria-hidden="true"></i>&nbsp;&nbsp; <strong>Account Number : </strong> {{  $account->id ?? ''}}<br/><br/>
                <i class="fas fa-user"></i>&nbsp;&nbsp; <strong>Account Name : </strong> {{$account->account_name ?? ''}}
                </div>
              </div>
            </div>
          </div>
             <br/>
          <div class="card card-secondary">
              <div class="card-header">
                <h6> <i class="fas fa-info-circle"></i> Related Account Data</h6>
              </div>
              <div class="card-body">
                <div class="chart">
                    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#account_users" role="tab" data-toggle="tab">
                                Owner(s)/Contributor(s)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#account_payments" role="tab" data-toggle="tab">
                                Payments History
                            </a>
                        </li>
                     </ul>
                 <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="account_users">
                        @includeIf('admin.accounts.relationships.accountUsers', ['users' => $account->accountUsers])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="account_payments">
                        @includeIf('admin.accounts.relationships.accountPayments', ['payments' => $account->accountPayments])
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        @endif
    </div>
 <!--------------------------------- Page content ends here---------------------------->
                 </div> <!-- end of tab-content-->
            </div><!--container-fluid -->
        </section>
@endsection

