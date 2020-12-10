@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('cruds.employee.title_singular') }} {{ trans('global.list') }}
</h6>
<div class="mT-30">
    @can('employee_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.employees.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.employee.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover datatable datatable-employee">
            <thead>
            <tr>
                <th width="10">

                </th>
                <th>
                    {{ trans('cruds.employee.fields.id') }}
                </th>
                <th>
                    {{ trans('cruds.employee.fields.photo') }}
                </th>
                <th>
                    {{ trans('cruds.employee.fields.name') }}
                </th>
                <th>
                    {{ trans('cruds.employee.fields.email') }}
                </th>
                <th>
                    {{ trans('cruds.employee.fields.phone') }}
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $key => $employee)
                <tr data-entry-id="{{ $employee->id }}">
                    <td>

                    </td>
                    <td>
                        {{ $employee->id ?? '' }}
                    </td>
                    <td>
                        <img src="{{ $employee->getFirstMediaUrl() ?? '' }}" alt="{{ $employee->name }}" width="150" height="150">
                    </td>
                    <td>
                        {{ $employee->name ?? '' }}
                    </td>
                    <td>
                        {{ $employee->email ?? '' }}
                    </td>
                    <td>
                        {{ $employee->phone ?? '' }}
                    </td>
                    <td>
                        @can('employee_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.employees.edit', $employee->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                        @endcan

                        @can('employee_delete')
                            <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('employee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.employees.massDestroy') }}",
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
  $('.datatable-employee:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
