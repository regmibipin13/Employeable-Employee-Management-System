@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('cruds.salaryDue.title_singular') }} {{ trans('global.list') }}
</h6>
<div class="mT-30">
    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover datatable datatable-salaryDue">
            <thead>
            <tr>
                <th width="10">

                </th>
                <th>
                    {{ trans('cruds.salaryDue.fields.employee_id') }}
                </th>
                <th>
                    {{ trans('cruds.salaryDue.fields.dueDatefrom') }}
                </th>
                <th>
                    Salary to be paid
                </th>
                <th>
                    {{ trans('cruds.salaryDue.fields.totalAmountDue') }}
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($salaryDues as $key => $salaryDue)
                @if($salaryDue->totalDueDate() > $salaryDue->accordingToType())
                <tr data-entry-id="{{ $salaryDue->id }}">
                    <td>

                    </td>
                    <td>
                        EMP-{{ $salaryDue->id }}
                    </td>
                    <td>
                        {{ $salaryDue->totalDueDate() ? $salaryDue->totalDueDate() - $salaryDue->accordingToType() : '' }} days
                    </td>
                    <td>{{ $salaryDue->salary }} per {{ $salaryDue->salary_type }}</td>
                    <td>
                        {{ $salaryDue->totalDueSalary() ?? '' }}
                    </td>
                    <td>
                        @can('salary_dues_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.salary-dues.show', $salaryDue->id) }}">
                                {{ trans('global.show') }}
                            </a>
                        @endcan
                        @can('salary_dues_pay')
                            <a class="btn btn-xs btn-success" href="{{ route('admin.salary-dues.show', $salaryDue->id) }}">
                                Pay
                            </a>
                        @endcan
                    </td>
                </tr>
                @endif
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
          let deleteButtonTrans = 'Mark as Paid'
          let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.salary-dues.massPaid') }}",
            className: 'btn-success',
            action: function (e, dt, node, config) {
              var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                  return $(entry).data('entry-id')
              });

              if (ids.length === 0) {
                alert('{{ trans('global.datatables.zero_selected') }}')

                return
              }

              if (confirm('Are you sure ? Note: This is record the transaction as you have paid the actual salary not the total due date ')) {
                $.ajax({
                  headers: {'x-csrf-token': _token},
                  method: 'POST',
                  url: config.url,
                  data: { ids: ids, _method: 'POST' }})
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
      $('.datatable-salaryDue:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
</script>
@endsection
