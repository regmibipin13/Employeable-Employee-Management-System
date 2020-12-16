@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.show') }} {{ trans('cruds.leave.title') }}
</h6>
<div class="mT-30">
    <div class="mb-2">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>
                    {{ trans('cruds.leave.fields.id') }}
                </th>
                <td>
                    {{ $leave->id }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.leave.fields.employee_id') }}
                </th>
                <td>
                    {{ $leave->employee->name }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.leave.fields.date') }}
                </th>
                <td>
                    {{ $leave->date }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.leave.fields.reason') }}
                </th>
                <td>
                    {{ $leave->reason }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.leave.fields.description') }}
                </th>
                <td>
                    {{ $leave->description }}
                </td>
            </tr>
            <tr>
                <th>
                    Status
                </th>
                <td>
                    @can('leave_approve')
                        <leave-approve :leave="{{ $leave }}" inline-template>
                            <toggle-button 
                                @change="onChangeEvent"
                                :value="leave.is_approved ? true : false"
                                :labels="{checked: 'Approved', unchecked: 'Pending'}"
                            />
                        </leave-approve>
                    @else
                        <span class="badge badge-pill {{ $leave->is_approved ? 'badge-success' : 'badge-danger' }}">{{ $leave->is_approved ? 'approved' : 'pending' }}</span>
                    @endcan
                </td>
            </tr>
            </tbody>
        </table>
        <a style="margin-top:20px;" class="btn btn-primary" href="{{ url()->previous() }}">
            {{ trans('global.back_to_list') }}
        </a>
    </div>
</div>
@endsection
