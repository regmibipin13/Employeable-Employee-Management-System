@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('cruds.designation.title_singular') }} {{ trans('global.list') }}
</h6>
<div class="mT-30">
    @can('designation_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.designations.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.designation.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover datatable datatable-Designation">
            <thead>
            <tr>
                <th width="10">
                  Mark
                </th>
                <th>
                    {{ trans('cruds.designation.fields.id') }}
                </th>
                <th>
                    {{ trans('cruds.designation.fields.name') }}
                </th>
                <th>
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($designations as $key => $designation)
                <tr data-entry-id="{{ $designation->id }}">
                    <td>

                    </td>
                    <td>
                        {{ $designation->id ?? '' }}
                    </td>
                    <td>
                        {{ $designation->name ?? '' }}
                    </td>
                    <td>
                        @can('designation_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.designations.edit', $designation->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                        @endcan

                        @can('designation_delete')
                            <form action="{{ route('admin.designations.destroy', $designation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('designation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.designations.massDestroy') }}",
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
  $('.datatable-Designation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
