@extends('layouts.admin')
    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h5 class="m-0 text-dark">My Requisitions</h5>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                  <li class="breadcrumb-item active">Petty cash</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <!-- Start of tabs content -->
        
        <section class="content">
            <div class="container-fluid winbox-white">
        <!-- End of tabs content -->

        <!-- Start of request history -->
                <div class="tab-content" style="margin-top:16px;">
                 <div class="tab-pane active" id="login_details">
                  <div class="panel panel-default">
                   <div class="panel-heading"><a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-request"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;New Request</a>
                   <a href="" class="btn btn-primary btn-sm" id="edit_goal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a> 
                   </div>
                   <div class="panel-body">
                   <table class="customers-actions table-striped table-hover datatable datatable-Account">
                      <thead>
                        <tr>
                            <th>S.N</th>
                            <th>TOKEN</th>
                            <th>APPLICANT</th>
                            <th>REQUEST DATE</th>
                            <th>AMOUNT</th>
                            <th>CHAIR</th>
                            <th>TREASURER</th>
                            <th>PROGRESS</th>
                            <th>ACTION</th>
                        </tr>
                      </thead>
                      @php
                          $cnt = 1;
                      @endphp
                      <tbody>
                        @foreach($requisitions as $requisition)
                        <tr>
                            <td>{{$cnt}}</td>
                            <td>{{$requisition->token_id}}</td>
                            <td>{{$requisition->user->name}}</td>
                            <td>{{$requisition->created_at}}</td>
                            <td>{{$requisition->amount}}</td>
                            <td>
                                @if($requisition->chair_approval_status == 0)
                                    <i class="fas fa-spinner"></i></button>
                                @elseif($requisition->chair_approval_status == 1)
                                    <i class="fa fa-check"></i></button>
                                @elseif($requisition->chair_approval_status == 2)
                                    <i class="fa fa-times"></i></button>
                                @endif
                            </td>
                            <td>
                                @if($requisition->treasurer_approval_status == 0)
                                    <i class="fas fa-spinner"></i></button>
                                @elseif($requisition->treasurer_approval_status == 1)
                                    <i class="fa fa-check"></i></button>
                                @elseif($requisition->treasurer_approval_status == 2)
                                    <i class="fa fa-times"></i></button>
                                @endif
                            </td>
                            <td>
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{$requisition->process_status}}" aria-valuemin="0"
                                        aria-valuemax="100" style="width: {{$requisition->process_status}}%">
                                        {{$requisition->process_status}}%
                                    </div>
                                </div> 
                            </td>
                                <td>
                                <a data-toggle="modal" data-target="#edit_request_{{$requisition->id}}"><i class="fa fa-eye"></i> <i class="fa fa-edit"></i></a>
                                </td>
                        </tr>
                        @php
                          $cnt++
                        @endphp
                        <!-- start of the modal form to edit a cash request -->
                        <div class="modal fade" id="edit_request_{{$requisition->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <form method="post" action="{{route('admin.finance.update',$requisition->id)}}" enctype="multipart/form-data">
                                        <div class="modal-body">
                                        {{ csrf_field() }}
                                        @method('put')
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="target">Amount Requested</label> : Ksh.{{$requisition->amount}}
                                                        <input type="hidden" name="amount" class="form-control" id="amount" onkeyup="requestcheck()" maxlength="4" value="{{$requisition->amount}}" required>
                                                        <input type="hidden" name="userid" value="{{ Auth::user()->id }}" id="target" placeholder="Enter Amount" maxlength="4" required>
                                                        <input type="hidden" name="treasurer_id" value="{{$requisition->treasurer_id }}" id="target" placeholder="Enter Amount" maxlength="4">
                                                        <input type="hidden" name="treasurer_approval_status" value="{{$requisition->treasurer_approval_status }}" id="target" placeholder="Enter Amount" maxlength="4">
                                                        <input type="hidden" name="treasurer_approval_date" value="{{$requisition->treasurer_approval_date}}" id="target" placeholder="Enter Amount" maxlength="4">
                                                        <input type="hidden" name="chairid" value="{{$requisition->chair_id }}" id="target" placeholder="Enter Amount" maxlength="4">
                                                        <input type="hidden" name="chair_approval_status" value="{{$requisition->chair_approval_status }}" id="target" placeholder="Enter Amount" maxlength="4">
                                                        <input type="hidden" name="chair_approval_date" value="{{$requisition->chair_approval_date }}" id="target" placeholder="Enter Amount" maxlength="4">
                                                        <input type="hidden" name="requestid" value="{{$requisition->id}}" id="target" placeholder="Enter Amount" maxlength="4">
                                                        <input type="hidden" name="token_id" value="{{$requisition->token_id}}" id="target" placeholder="Enter Amount" maxlength="4">
                                                        <input type="hidden" name="process_status" value="{{$requisition->process_status}}" id="target" placeholder="Enter Amount" maxlength="4" required>
                                                   
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="goal">Description of Need</label> : {{$requisition->description}}
                                                        <input type="hidden" class="form-control" name="description" value="{{$requisition->description}}">
                                                    </div><br/>
                                                    <strong>APPROVALS</strong><br/>
                                                    -------------------------------------------------------------------------
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                        <strong>Approver</strong>
                                                        </div>
                                                        <div class="col-md-3">
                                                        <strong>Name</strong>
                                                        </div>
                                                        <div class="col-md-3">
                                                        <strong>Status</strong>
                                                        </div>
                                                        <div class="col-md-3">
                                                        <strong>Date</strong>
                                                        </div>
                                                   </div>
                                                   <div class="row">
                                                        <div class="col-md-3">
                                                           <small>Treasurer</small>
                                                        </div>
                                                        <div class="col-md-3">
                                                            @if($requisition->treasurer_id == "")
                                                            <small><i>waiting..</i></small>
                                                            @else
                                                            <small>{{$requisition->treasurer->name}}</small>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-3">
                                                        <small> 
                                                            @if($requisition->treasurer_approval_status == 0)
                                                            <span class="badge badge-info"><i class="fa fa-spinner"></i></span>
                                                            @elseif($requisition->treasurer_approval_status == 1)
                                                            <span class="badge badge-success"><i class="fa fa-check"></i></span>
                                                            @elseif($requisition->treasurer_approval_status == 2)
                                                            <span class="badge badge-danger"><i class="fa fa-times"></i></span>
                                                            @endif
                                                        </small>
                                                        </div>
                                                        <div class="col-md-3">
                                                           <small>{{$requisition->treasurer_approval_date}}</small>
                                                        </div>
                                                   </div>
                                                   <div class="row">
                                                        <div class="col-md-3">
                                                           <small>Chairperson</small>
                                                        </div>
                                                        <div class="col-md-3">
                                                            @if($requisition->chair_id == "")
                                                            <small><i>waiting..</i></small>
                                                            @else
                                                            <small>{{$requisition->chair->name}}</small>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-3">
                                                        <small> 
                                                            @if($requisition->chair_approval_status == 0)
                                                            <span class="badge badge-info"><i class="fa fa-spinner"></i></span>
                                                            @elseif($requisition->chair_approval_status == 1)
                                                            <span class="badge badge-success"><i class="fa fa-check"></i></span>
                                                            @elseif($requisition->chair_approval_status == 2)
                                                            <span class="badge badge-danger"><i class="fa fa-times"></i></span>
                                                            @endif
                                                        </small>
                                                        </div>
                                                        <div class="col-md-3">
                                                           <small>{{$requisition->chair_approval_date}}</small>
                                                        </div>
                                                   </div><br/>
                                                   @if($requisition->chair_approval_status == 1)
                                                    <strong>UPLOAD RECEIPTS</strong><br/>
                                                    -------------------------------------------------------------------------
                                                    <div class="form-group">
                                                        <label for="receipt"><u>Receipt 1</u></label>
                                                        @if($requisition->doc_1 == '')
                                                         <input type="file" class="form-control" name="document1"/>
                                                        @else
                                                            <br/> <a href="" data-toggle="modal" data-target="#docs_doc1"><i class="fa fa-file"></i><small> {{$requisition->doc_1}}</small></a><br/><br/>
                                                        @endif
                                                        <label for="receipt"><u>Receipt 2</u></label>
                                                        @if($requisition->doc_2 == '')
                                                         <input type="file" class="form-control" name="document2"/>
                                                        @else
                                                        <br/> <a href="" data-toggle="modal" data-target="#docs_doc2"><i class="fa fa-file"></i><small> {{$requisition->doc_2}}</small></a><br/><br/>
                                                        @endif
                                                    </div>
                                                   @endif
                                                </div>
                                            <!-- /.card-body -->
                                                     <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel Request</button>
                                                        @if($requisition->treasurer_approval_status == 0)
                                                         <button type="submit" class="btn btn-primary button"><i class="adding fa fa-edit"></i></i>&nbsp;<span class="btn-txt">&nbsp;&nbsp;Update</span></button>
                                                        @endif
                                                        @if($requisition->chair_approval_status == 1)
                                                         <button type="submit" class="btn btn-success button"><i class="adding fa fa-check"></i></i>&nbsp;<span class="btn-txt">&nbsp;&nbsp;Submit</span></button>
                                                        @endif
                                                     </div>
                                                </form>
                                        </div>
                                    </div>   <!-- /.modal-content -->
                                </div>
                            </div><!-- /.modal-dialog -->
                        <!-- end of the modal form to add a cash request-->
                        <!-- Modal for viewing uploaded document 1-->
                            <div class="modal fade" id="docs_doc1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    @php
                                                        $path = $requisition->doc_1;
                                                    @endphp
                                                    <embed src="{{asset('Documents/Receipts/'.$path)}}" id="files" type="application/pdf" width="100%" height="600px"/>
                                                </div>
                                                
                                            </form>
                                            </div>
                                        </div>
                                    </div> 
                        <!-- End of Modal for viewing uploaded document -->
                        <!-- Modal for viewing uploaded document 1-->
                        <div class="modal fade" id="docs_doc2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    @php
                                                        $path2 = $requisition->doc_2;
                                                    @endphp
                                                    <embed src="{{asset('Documents/Receipts/'.$path2)}}" id="files" type="application/pdf" width="100%" height="600px"/>
                                                </div>
                                                
                                            </form>
                                            </div>
                                        </div>
                                    </div> 
                        <!-- End of Modal for viewing uploaded document -->
                        @endforeach
                        
                        </tbody>
                    </table>
                   </div>
                  </div>
                 </div>
        <!-- end of request history-->
    
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

<!-- start of the modal form to add a cash request -->
<div class="modal fade" id="add-request">
          <div class="modal-dialog">
            <div class="modal-content">
                <!-- <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i> Alert!</h5>
                    Proper supporting documentation must be submitted to the Administration office within 3 days of receiving cash. Failure to comply will attract non-refundable salary
                    deductions.
                </div> -->
              <form method="post" action="{{route('admin.finance.store')}}">
              @php 
                $requestTocken = rand(100000,999999);
              @endphp
                <div class="modal-body">
                              {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="target">Amount Requested</label>
                                        <input type="number" name="amount" class="form-control" id="amount" onkeyup="requestcheck()" maxlength="4" required>
                                        <input type="hidden" name="userid" value="{{ Auth::user()->id }}" id="target" placeholder="Enter Amount" maxlength="4" required>
                                        <input type="hidden" name="process_status" value="30" id="target" placeholder="Enter Amount" maxlength="4" required>
                                        <input type="hidden" name="token_id" value="{{$requestTocken}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="goal">Description of Need</label>
                                        <textarea class="form-control" name="description" rows="3" placeholder="Enter description here..."></textarea>
                                    </div>
                                    
                                </div>
                               <!-- /.card-body -->
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel Request</button>
                                    <button type="submit" class="btn btn-primary button"><i class="adding fa fa-plus-square"></i></i>&nbsp;<span class="btn-txt">&nbsp;&nbsp;Submit Request</span></button>
                                </div>
                        </form>
                </div>
            </div>   <!-- /.modal-content -->
        </div>
    </div><!-- /.modal-dialog -->
<!-- end of the modal form to add a cash request-->

<!-- start of the modal form to edit a cash request -->

<!-- end of the modal form to add a cash request-->

<!-- Modal for deleting requisition-->
<div class="modal fade" id="delete_requisition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" align="center">Delete Requisition</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <p align="center">Are you sure you want to delete this request?</p>
                    <form method="post"  class="form-horizontal" action="" enctype="multipart/form-data">
                    {{method_field('delete')}}
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="requisition_id" id="requisition_id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"> No Cancel</button>
                <button type="submit" class="btn btn-danger">Yes Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- End of Modal for deleting members -->

@endsection