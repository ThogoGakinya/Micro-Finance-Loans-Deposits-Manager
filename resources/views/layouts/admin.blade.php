<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mucu</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/dataFunctions.js') }}"></script>
 
    @yield('styles')
</head>

<body class="c-app">
@include('partials.menu')
<div class="c-wrapper">
    <header class="c-header c-header-fixed px-3" style="background-color:#3c8dbc; height:45px; color:#ffffff;">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show" style="color:#fff;">
            <i class="fas fa-fw fa-bars"></i>
        </button>

        <a class="c-header-brand d-lg-none" href="#">MUCUA</a>

        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true" style="color:#fff;">
            <i class="fas fa-fw fa-bars"></i>
        </button>
        <ul class="c-header-nav ml-auto">
            @if(count(config('panel.available_languages', [])) > 1)
                <li class="c-header-nav-item dropdown d-md-down-none">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach(config('panel.available_languages') as $langLocale => $langName)
                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                        @endforeach
                    </div>
                </li>
            @endif
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" style="color:#fff;">
                    {{strtoupper(auth()->user()->name)}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>  {{ trans('global.logout') }}
                    </a>
                    </div>
                </li>
        </ul>
    </header>

    <div class="c-body" style="background-color:#f4f6f9;">
        <main class="c-main">
            <div class="container-fluid" style="margin-top:-20px;; padding-right: 8px;padding-left: 8px;">
                @if(session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </div>
        </main>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>

<!-- Start of window scripts -->
<script type="text/javascript">
    $(document).ready(function(){
    $(document).on('change','#year',function(){
		var year = $(this).val();
        var account = document.getElementById('account_id').value;
        var div = $(this).parent().parent().parent();
        var op = "";
        var ap = "";
        var modal = $(this)
        $.ajax({
            type:'get',
            url:'{!!URL::to("admin/payments/findmonth")!!}',
            data:{'account_id':account, 'year':year},
            dataType : "json",
            success:function(data){
                var month = data[1];
                var payments = data[0];	
                var checker = "enabled";
                for( var i=0; i<month.length;i++)
                {	
                    for( var x=0; x<payments.length;x++)
                        {
                            if(payments[x].month == month[i].id )
                            {
                                var checker = "disabled";
                                break;
                            }
                            else
                            {
                                var checker = "enabled";
                            }
                            continue;
                        }          
                     op+='<div class="col-md-3 col-sm-4">'+
                         '<input name="month[]"class="month" value="'+month[i].id+'" type="checkbox" '+checker+'>'+
                         '&nbsp;'+month[i].name+
                         '</div>';          
                }

                div.find('#month').html("");
                div.find('#month').append(op);
            },
            error:function(){
                console.log('failed to fetch paid months');
            }
        });
	});

    $('#month').click(function() {
        var amount = document.getElementById('amount').value;
        if(amount == 0)
        {
            alert('Please enter amount first')
            $('#amount').focus();
            return false;
        }
        var checkboxes = $('input:checkbox:checked').length;
        document.getElementById('months_count').value = checkboxes;
        var distribution = (amount/checkboxes);
        if(distribution < 200)
        {
            alert('Monthly premium below Ksh.200. Please consider increasing the enterd amount or reducing the selected months.')
            $('#amount').focus();
            return false;
        }
        var output = ""; 
            output += '<div style="color:red">';
            output += '<small>';
            output += 'Paying premiums for ';
            output +=  checkboxes; 
            output += ' month(s) each valued Ksh. ';
            output +=  distribution; 
            output += '</small>';      
            output +=  '</div>';

            $("#distribution").html(output);
  })
});
</script>
<!-- End of window scripts -->
<!-- Start of window scripts_2 -->
<script type="text/javascript">
window.onload = function()
    {
        var button = document.getElementById('response').value;
        if(button == 1)
        {
            document.getElementById('primary').click();
        }
        if(button == 2)
        {
            document.getElementById('primary_2').click();
        }
    };

    $(document).ready(function(){
    $(document).on('change','#year_2',function(){
		var year = $(this).val();
        var account = document.getElementById('account_id_2').value;
        if(account =="")
        {
            alert("Please select user account first")
            $('#account_id_2').focus();
            return false;
        }
        var div = $(this).parent().parent().parent();
        var op = "";
        var ap = "";
        var modal = $(this)
        $.ajax({
            type:'get',
            url:'{!!URL::to("admin/payments/findmonth")!!}',
            data:{'account_id':account, 'year':year},
            dataType : "json",
            success:function(data){
                var month = data[1];
                var payments = data[0];	
                var checker = "enabled";
                for( var i=0; i<month.length;i++)
                {	
                    for( var x=0; x<payments.length;x++)
                        {
                            if(payments[x].month == month[i].id )
                            {
                                var checker = "disabled";
                                break;
                            }
                            else
                            {
                                var checker = "enabled";
                            }
                            continue;
                        }          
                     op+='<div class="col-md-3 col-sm-4">'+
                         '<input name="month_2[]"class="month" value="'+month[i].id+'" type="checkbox" '+checker+'>'+
                         '&nbsp;'+month[i].name+
                         '</div>';          
                }

                div.find('#month_2').html("");
                div.find('#month_2').append(op);
            },
            error:function(){
                console.log('failed to fetch paid months');
            }
        });
	});

    $('#month_2').click(function() {
        var amount = document.getElementById('amount_2').value;
        if(amount == 0)
        {
            alert('Please enter amount first')
            $('#amount_2').focus();
            return false;
        }
        var checkboxes = $('input:checkbox:checked').length;
        document.getElementById('months_count_2').value = checkboxes;
        var distribution = (amount/checkboxes);
        if(distribution < 200)
        {
            alert('Monthly premium below Ksh.200. Please consider increasing the enterd amount or reducing the selected months.')
            $('#amount_2').focus();
            return false;
        }
        var output = ""; 
            output += '<div style="color:red">';
            output += '<small>';
            output += 'Paying premiums for ';
            output +=  checkboxes; 
            output += ' month(s) each valued Ksh. ';
            output +=  distribution; 
            output += '</small>';      
            output +=  '</div>';

            $("#distribution_2").html(output);
  })
});
</script>
<script type="text/javascript">
function complete()
{
  var CheckoutID = document.getElementById('CheckoutRequestID').value;
  var data = document.getElementById('data').value;

        $.ajax({
            type:'get',
            url:'{!!URL::to("admin/payments/confirmpayment")!!}',
            data:{'id':CheckoutID,'data':data},

            beforeSend: function(){
              $('#first').hide();
              $('#maq').hide();
              $('#loader').show();
            },
            complete: function(){
              $('#loader').hide();
            },
            success: function(data4){
             if(Object.keys(data4).length === 0)
             {
                  var output = ""; 
                      output += ` <div class="alert alert-warning alert-dismissible" >
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h5><i class="icon fas fa-info"></i> Alert</h5>
                                  No Payment received yet ! Please keep clicking the complete button if you have received an M-PESA message.
                                 </div>`;

                  $("#results").html(output);
             }
             else
             {
              if(data4.ResultCode == 0)
                {
                      var output = ""; 
                          output += ` <div class="alert alert-success alert-dismissible" >
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <h5><i class="icon fas fa-check"></i> Success</h5>
                                      Payment received successfully
                                    </div>`;

                      $("#results").html(output);
                      $('#finish').show();
                      $('#validate').hide();
                }
                else
                {
                      var output = ""; 
                          output += '<div class="alert alert-danger alert-dismissible">';
                          output += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                          output += '<h5><i class="icon fas fa-info"></i> Alert</h5>';
                          output +=  data4.ResultDesc;       
                          output +=  '</div>';

                      $("#results").html(output);
                }
             }
             
             
            },
            error:function()
            {
              $("#results").html("error");
            }
        });
  }

function complete_2()
{
  var CheckoutID = document.getElementById('CheckoutRequestID_2').value;
  var data = document.getElementById('data_2').value;

        $.ajax({
            type:'get',
            url:'{!!URL::to("admin/payments/confirmpayment")!!}',
            data:{'id':CheckoutID,'data':data},

            beforeSend: function(){
              $('#first_2').hide();
              $('#maq_2').hide();
              $('#loader_2').show();
            },
            complete: function(){
              $('#loader_2').hide();
            },
            success: function(data4){
             if(Object.keys(data4).length === 0)
             {
                  var output = ""; 
                      output += ` <div class="alert alert-warning alert-dismissible" >
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h5><i class="icon fas fa-info"></i> Alert</h5>
                                  No Payment received yet ! Please keep clicking the complete button if you have received an M-PESA message.
                                 </div>`;

                  $("#results_2").html(output);
             }
             else
             {
              if(data4.ResultCode == 0)
                {
                      var output = ""; 
                          output += ` <div class="alert alert-success alert-dismissible" >
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <h5><i class="icon fas fa-check"></i> Success</h5>
                                      Payment received successfully
                                    </div>`;

                      $("#results_2").html(output);
                      $('#finish_2').show();
                      $('#validate_2').hide();
                }
                else
                {
                      var output = ""; 
                          output += '<div class="alert alert-danger alert-dismissible">';
                          output += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                          output += '<h5><i class="icon fas fa-info"></i> Alert</h5>';
                          output +=  data4.ResultDesc;       
                          output +=  '</div>';

                      $("#results_2").html(output);
                }
             }
             
             
            },
            error:function()
            {
              $("#results_2").html("error");
            }
        });
  }
  </script>
<!-- End of window scripts -->


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script src="https://unpkg.com/@coreui/coreui@3.2/dist/js/coreui.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    $(function() {
        let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
        let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
        let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
        let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
        let printButtonTrans = '{{ trans('global.datatables.print') }}'
        let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
        let selectAllButtonTrans = '{{ trans('global.select_all') }}'
        let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

        let languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };

        $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                url: languages['{{ app()->getLocale() }}']
            },
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }, {
                orderable: false,
                searchable: false,
                targets: -1
            }],
            select: {
                style:    'multi+shift',
                selector: 'td:first-child'
            },
            order: [],
            scrollX: true,
            pageLength: 100,
            dom: 'lBfrtip<"actions">',
            buttons: [
                {
                    extend: 'selectAll',
                    className: 'btn-primary',
                    text: selectAllButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    },
                    action: function(e, dt) {
                        e.preventDefault()
                        dt.rows().deselect();
                        dt.rows({ search: 'applied' }).select();
                    }
                },
                {
                    extend: 'selectNone',
                    className: 'btn-primary',
                    text: selectNoneButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'copy',
                    className: 'btn-default',
                    text: copyButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    className: 'btn-default',
                    text: csvButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn-default',
                    text: excelButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn-default',
                    text: pdfButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    className: 'btn-default',
                    text: printButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    className: 'btn-default',
                    text: colvisButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ]
        });

        $.fn.dataTable.ext.classes.sPageButton = '';
    });

</script>
@yield('scripts')
</body>

</html>
