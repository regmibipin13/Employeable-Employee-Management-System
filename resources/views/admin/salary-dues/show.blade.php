@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.show') }} {{ trans('cruds.salaryDue.title') }}
</h6>
<div class="mT-30">
    <div class="mb-2">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>
                    {{ trans('cruds.salaryDue.fields.employee_id') }}
                </th>
                <td>
                    EMP-{{ $salaryDue->id }}
                </td>
            </tr>
            <tr>
                <th>
                    Salary Of the employe
                </th>
                <td>
                    {{ $salaryDue->salary }} per {{ $salaryDue->salary_type }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.salaryDue.fields.dueDatefrom') }}
                </th>
                <td>
                    {{ $salaryDue->totalDueDate() ? $salaryDue->totalDueDate() - $salaryDue->accordingToType() : '' }} days
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.salaryDue.fields.totalAmountDue') }}
                </th>
                <td>
                    {{ $salaryDue->totalDueSalary() }}
                </td>
            </tr>
            <tr>
                <th>
                    Last Transaction Date
                </th>
                <td>
                    {{ $salaryDue->isOldEmployee() ? $salaryDue->lastTransaction()->created_at->diffForHumans() : 'newly appointed employee' }} ({{ $salaryDue->lastTransactionDate() }})
                </td>
            </tr>
            <tr>
                <th>
                    Last Transaction Amount
                </th>
                <td>
                    {{ $salaryDue->lastTransactionAmount() }}
                </td>
            </tr>
            <tr>
                <th>
                    Action
                </th>
                <td>
                    <a href="{{ route('admin.salary-dues.payment_form',$salaryDue->id) }}" class="btn btn-success">Pay Salary</a>
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
