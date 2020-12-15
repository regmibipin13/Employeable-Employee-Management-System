@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.create') }} {{ trans('cruds.attendance.title_singular') }}
</h6>
<div class="mT-30">
    <form action="{{ route("admin.attendances.store") }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="employee_id">{{ trans('cruds.attendance.fields.employee_id') }}*</label>
                <select class="form-control" name="employee_id" id="employee_id">
                    @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' :'' }}>{{ $employee->name }} ({{ $employee->email }})</option>
                    @endforeach
                </select>
                @if($errors->has('employee_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('employee_id') }}
                    </em>
                @endif
            </div>
            <div class="col-md-6 form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                <label for="date">{{ trans('cruds.attendance.fields.date') }}*</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ old('date', isset($attendance) ? $attendance->date : '') }}" required>
                @if($errors->has('date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </em>
                @endif
            </div>
            <div class="col-md-6 form-group {{ $errors->has('started_from') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.attendance.fields.started_from') }}*</label>
                <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" value="{{ isset($attendance) ? $attendance->started_from : old('started_from') }}" />
                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-clock-o"></i></div>
                    </div>
                </div>
                @if($errors->has('started_from'))
                    <em class="invalid-feedback">
                        {{ $errors->first('started_from') }}
                    </em>
                @endif
            </div>
            <div class="col-md-6 form-group {{ $errors->has('ended_at') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.attendance.fields.ended_at') }}*</label>
                <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" value="{{ isset($attendance) ? $attendance->ended_at : old('ended_at') }}" />
                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-clock-o"></i></div>
                    </div>
                </div>
                @if($errors->has('ended_at'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ended_at') }}
                    </em>
                @endif
            </div>

            <div class="col-md-12 form-group {{ $errors->has('remarks') ? 'has-error' : '' }}">
                <label for="remarks">{{ trans('cruds.attendance.fields.remarks') }}</label>
                <textarea name="remarks" id="remarks" rows="4" class="form-control">{{ old('remarks', isset($attendance) ? $attendance->remarks : '') }}</textarea>
                @if($errors->has('remarks'))
                    <em class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </em>
                @endif
            </div>
            <div class="col-md-12">
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </div>
    </form>
</div>
@endsection

