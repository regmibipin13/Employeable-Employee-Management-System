@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('cruds.attendance.title_singular') }} {{ trans('global.list') }}
</h6>
<div class="mT-30">
    @can('attendance_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.attendances.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.attendance.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover datatable datatable-attendance">
            <thead>
            <tr>
                <th width="10">
                    Mark
                </th>
                <th>
                    {{ trans('cruds.attendance.fields.id') }}
                </th>
                <th>
                    {{ trans('cruds.attendance.fields.employee_id') }}
                </th>
                <th>
                    {{ trans('cruds.attendance.fields.date') }}
                </th>
                <th>
                    {{ trans('cruds.attendance.fields.started_from') }}
                </th>
                <th>
                    {{ trans('cruds.attendance.fields.ended_at') }}
                </th>
                <th>
                    {{ trans('cruds.attendance.fields.remarks') }}
                </th>
                <th>
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($attendances as $key => $attendance)
                <tr data-entry-id="{{ $attendance->id }}">
                    <td>

                    </td>
                    <td>
                        {{ $attendance->id ?? '' }}
                    </td>
                    <td>
                        EMP-{{ $attendance->employee_id }}
                    </td>
                    <td>
                        {{ $attendance->date ?? '' }}
                    </td>
                    <td>
                        {{ $attendance->started_from ?? '' }}
                    </td>
                    <td>
                        {{ $attendance->ended_at ?? '' }}
                    </td>
                    <td>
                        {{ $attendance->remarks ?? '' }}
                    </td>
                    <td>
                        @can('attendance_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.attendances.edit', $attendance->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                        @endcan
                        @can('attendance_delete')
                            <form action="{{ route('admin.attendances.destroy', $attendance->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                        @endcan

                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('attendance_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.attendances.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
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
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-attendance:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
