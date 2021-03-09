@extends('layouts.admin')
    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6" align="left">
                <h5><a href="{{route('admin.permissions.index')}}" class="btn btn-success btn-xs" id="edit_goal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a>
                  View Permission 
                </h5>
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
            <h6><i class="fa fa-eye"></i> Show Permission
            </h6>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.permissions.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $permission->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $permission->title }}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-secondary" href="{{ route('admin.permissions.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>     
 


 <!--------------------------------- Page content ends here---------------------------->
                 </div> <!-- end of tab-content-->
            </div><!--container-fluid -->
        </section>
@endsection

