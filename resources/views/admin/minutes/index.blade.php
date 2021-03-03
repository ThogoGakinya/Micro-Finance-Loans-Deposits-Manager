@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Minutes List
            @can('minute_create')
                <a class="btn btn-success float-right" href="{{ route('admin.minutes.create') }}">
                    Upload Minutes
                </a>
            @endcan
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Minute">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Minute For Date
                        </th>
                        <th>
                            Document
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($minutes as $key => $minute)
                        <tr data-entry-id="{{ $minute->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $minute->minutes_date ?? '' }}
                            </td>
                            <td>
                                @if($minute->minutes_document)
                                    <a href="{{ $minute->minutes_document->getUrl() }}" target="_blank">
                                        {{$minute->minutes_document->file_name}}
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary"
                                   href="{{ $minute->minutes_document->getUrl() }}" target="_blank">
                                    <i class="fas fa-download"></i>Download
                                </a>
                              @can('minute_edit')
                                    <a class="btn btn-xs btn-info"
                                       href="{{ route('admin.minutes.edit', $minute->id) }}">
                                        <i class="fas fa-edit"></i>Edit
                                    </a>
                                @endcan

                                @can('minute_delete')
                                    <form action="{{ route('admin.minutes.destroy', $minute->id) }}" method="POST"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                          style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <span class="btn btn-xs btn-danger">
                                            <i class="fa fa-trash"></i> <input type="submit" value="Delete"/>
                                        </span>
                                        <style> span > i {
                                        color: white;
                                        }
                                        span > input {
                                        background: none;
                                        color: white;
                                        padding: 0;
                                        border: 0;
                                        }
                                        </style>
                                        {{--<input type="submit" class="btn btn-xs btn-danger" value="Delete">--}}
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[2, 'desc']],
                pageLength: 10,
            });
            let table = $('.datatable-Minute:not(.ajaxTable)').DataTable({buttons: dtButtons})
            /*$('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });*/

        })

    </script>
@endsection
