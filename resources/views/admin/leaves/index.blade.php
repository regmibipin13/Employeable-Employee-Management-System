@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('cruds.leave.title_singular') }} {{ trans('global.list') }}
</h6>
<div class="mT-30">
    @can('leave_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.leaves.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.leave.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover datatable datatable-leave">
            <thead>
            <tr>
                <th width="10">

                </th>
                <th>
                    {{ trans('cruds.leave.fields.id') }}
                </th>
                <th>
                    {{ trans('cruds.leave.fields.employee_id') }}
                </th>
                <th>
                    {{ trans('cruds.leave.fields.date') }}
                </th>
                <th>
                    {{ trans('cruds.leave.fields.reason') }}
                </th>
                <th>
                    {{ trans('cruds.leave.fields.is_approved') }}
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($leaves as $key => $leave)
                <tr data-entry-id="{{ $leave->id }}">
                    <td>

                    </td>
                    <td>
                        {{ $leave->id ?? '' }}
                    </td>
                    <td>
                        EMP-{{ $leave->employee_id }}
                    </td>
                    <td>
                        {{ $leave->date ?? '' }}
                    </td>
                    <td>
                        {{ $leave->reason ?? '' }}
                    </td>
                    <td>
                        @can('leave_approve')
                        <leave-approve :leave="{{ $leave }}" inline-template>
                            <toggle-button 
                                @change="onChangeEvent"
                                v-model="status"
                                :value="leave.is_approved ? true : false"
                                :labels="{checked: 'Approved', unchecked: 'Pending'}"
                            />
                        </leave-approve>
                        @else
                        <span class="badge badge-pill {{ $leave->is_approved ? 'badge-success' : 'badge-danger' }}">{{ $leave->is_approved ? 'approved' : 'pending' }}</span>
                        @endcan
                    </td>
                    <td>
                        @can('leave_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.leaves.edit', $leave->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                        @endcan
                        @can('leave_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.leaves.show', $leave->id) }}">
                                {{ trans('global.show') }}
                            </a>
                        @endcan
                        @can('leave_delete')
                            <form action="{{ route('admin.leaves.destroy', $leave->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('leave_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.leaves.massDestroy') }}",
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
  $('.datatable-leave:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
