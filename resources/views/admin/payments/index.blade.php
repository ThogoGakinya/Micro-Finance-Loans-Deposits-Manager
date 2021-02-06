@extends('layouts.admin')
    @section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6" align="left">
                <h5>Monthly Premiums</h5>
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
                    <div class="card">
                            <div class="card-header">
                                Payments List
                                @can('payment_create')
                                    <a class="btn btn-success float-right" href="{{ url('/pay') }}">
                                       <i class="fa fa-plus"></i> Make Payment
                                    </a>
                                @endcan
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Payment">
                                        <thead>
                                        <tr>
                                            <th width="10">

                                            </th>
                                            <th>#</th>
                                            <th>Account Name</th>
                                            <th>Amount</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>
                                                &nbsp;
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                                <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                            </td>
                                            <td>
                                                <select class="search">
                                                    <option value>{{ trans('global.all') }}</option>
                                                    @foreach($accounts as $key => $item)
                                                        <option value="{{ $item->account_name }}">{{ $item->account_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                            </td>
                                            <td>
                                                <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                            </td>
                                            <td>
                                                <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                        </thead>
                                    {{-- <tbody>
                                        @foreach($payments as $key => $payment)
                                            <tr data-entry-id="{{ $payment->id }}">
                                                <td>

                                                </td>
                                                <td>{{++$key}}</td>
                                                <td>{{ $payment->account->account_name ?? '' }}</td>
                                                <td>{{ $payment->amount ?? '' }}</td>
                                                <td>{{ $payment->month ?? '' }}</td>
                                                <td>{{ $payment->year ?? '' }}</td>
                                                <td>
                                                    @can('payment_show')
                                                        <a class="btn btn-xs btn-primary"
                                                        href="{{ route('admin.payments.show', $payment->id) }}">
                                                            {{ trans('global.view') }}
                                                        </a>
                                                    @endcan

                                                    @can('payment_edit')
                                                        <a class="btn btn-xs btn-info"
                                                        href="{{ route('admin.payments.edit', $payment->id) }}">
                                                            {{ trans('global.edit') }}
                                                        </a>
                                                    @endcan

                                                    @can('payment_delete')
                                                        <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST"
                                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                            style="display: inline-block;">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="submit" class="btn btn-xs btn-danger"
                                                                value="{{ trans('global.delete') }}">
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>--}}
                                    </table>
                                </div>
                            </div>
                        </div>    
 <!--------------------------------- Page content ends here---------------------------->
                 </div> <!-- end of tab-content-->
            </div><!--container-fluid -->
        </section>
@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('payment_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.payments.massDestroy') }}",
                className: 'btn btn-danger btn-xs',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.payments.index') }}",
                columns: [
                    {data: 'placeholder', name: 'placeholder'},
                    {data: 'id', name: 'id'},
                    {data: 'account_account_name', name: 'account.account_name'},
                    {data: 'amount', name: 'amount'},
                    {data: 'month', name: 'month'},
                    {data: 'year', name: 'year'},
                    {data: 'actions', name: '{{ trans('global.actions') }}'}
                ],
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
            };
            let table = $('.datatable-Payment').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

            let visibleColumnsIndexes = null;
            $('.datatable thead').on('input', '.search', function () {
                let strict = $(this).attr('strict') || false
                let value = strict && this.value ? "^" + this.value + "$" : this.value

                let index = $(this).parent().index()
                if (visibleColumnsIndexes !== null) {
                    index = visibleColumnsIndexes[index]
                }

                table
                    .column(index)
                    .search(value, strict)
                    .draw()
            });
            table.on('column-visibility.dt', function (e, settings, column, state) {
                visibleColumnsIndexes = []
                table.columns(":visible").every(function (colIdx) {
                    visibleColumnsIndexes.push(colIdx);
                });
            })
        });

    </script>
@endsection
