@extends('layouts.admin')
    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6" align="left">
                <h5><a href="{{route('admin.payments.index')}}" class="btn btn-success btn-xs" id="edit_goal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a>
                  View Payment Entry 
                </h5>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right" style="border-bottom: 0px solid;">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Payments</li>
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
              <h6> <i class="fas fa-eye"></i> Payment Details</h6>
              </div>
              <div class="container">
              <div class="card-body">
            <div class="form-group">
                <table class="table customers-actions table-bordered">
                    <tbody>
                    <tr>
                        <th>Payment ID</th>
                        <td>{{ $payment->id }}</td>
                    </tr>
                    <tr>
                        <th>Account Name</th>
                        <td>{{ $payment->account->account_name ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td>{{ $payment->amount }}</td>
                    </tr>
                    <tr>
                        <th>Month</th>
                        <td>{{ $payment->month }}</td>
                    </tr>
                    <tr>
                        <th>Year</th>
                        <td>{{ $payment->year }}</td>
                    </tr>
                    <tr>
                        <th>Payment Reference</th>
                        <td>PAJDHDU8032</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>          
 


 <!--------------------------------- Page content ends here---------------------------->
                 </div> <!-- end of tab-content-->
            </div><!--container-fluid -->
        </section>
@endsection
