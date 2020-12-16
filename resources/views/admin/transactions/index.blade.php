@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('cruds.transaction.title_singular') }} {{ trans('global.list') }}
</h6>
<div class="mT-30">
    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover datatable datatable-transaction">
            <thead>
            <tr>
                <th width="10">

                </th>
                <th>
                    {{ trans('cruds.transaction.fields.id') }}
                </th>
                <th>
                    EMP-{{ trans('cruds.transaction.fields.payeable_id') }}
                </th>
                <th>
                    {{ trans('cruds.transaction.fields.payeable_type') }}
                </th>
                <th>
                    {{ trans('cruds.transaction.fields.transaction_date') }}
                </th>
                <th>
                    {{ trans('cruds.transaction.fields.transaction_amount') }}
                </th>
                <th>
                    {{ trans('cruds.transaction.fields.refId') }}
                </th>
                <th>
                    {{ trans('cruds.transaction.fields.payment_method') }}
                </th>
                <th>
                    {{ trans('cruds.transaction.fields.remarks') }}
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $key => $transaction)
                <tr data-entry-id="{{ $transaction->id }}">
                    <td>

                    </td>
                    <td>
                        {{ $transaction->id ?? '' }}
                    </td>
                    <td>
                        EMP-{{ $transaction->payeable_id }}
                    </td>
                    <td>
                        {{ $transaction->payeable_type }}
                    </td>
                    <td>
                        {{ $transaction->transaction_date ?? '' }}
                    </td>
                    <td>
                        {{ $transaction->transaction_amount }}
                    </td>
                    <td>
                        {{ $transaction->refId }}
                    </td>
                    <td>
                        {{ $transaction->payment_method }}
                    </td>
                    <td>
                        {{ $transaction->remarks ?? 'salary-paid'}}
                    </td>

                    <td>
                        @can('transactions_delete')
                            <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('transactions_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transactions.massDestroy') }}",
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
  $('.datatable-transaction:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
