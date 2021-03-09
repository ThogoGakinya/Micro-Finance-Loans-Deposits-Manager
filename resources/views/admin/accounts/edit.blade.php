@extends('layouts.admin')
    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6" align="left">
                <h5>
                <a href="{{route('admin.accounts.index')}}" class="btn btn-success btn-xs" id="edit_goal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a>
                  Edit Account
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
           <h6><i class="fa fa-edit"></i> Edit Account</h6>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.accounts.update", [$account->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="account_name">Account Name</label>
                    <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', $account->account_name) }}">
                    @if($errors->has('account_name'))
                        <span class="text-danger">{{ $errors->first('account_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary" type="submit">
                        {{ trans('global.update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>


 <!--------------------------------- Page content ends here---------------------------->
                 </div> <!-- end of tab-content-->
            </div><!--container-fluid -->
        </section>
@endsection
