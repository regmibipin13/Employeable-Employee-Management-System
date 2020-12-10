@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.edit') }} {{ trans('cruds.employee.title_singular') }}
</h6>
<div class="mT-30">
    <form action="{{ route("admin.employees.update",$employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.employee.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($employee) ? $employee->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
            </div>
            <div class="col-md-6 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.employee.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($employee) ? $employee->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
            </div>
            <div class="col-md-6 form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.employee.fields.address') }}*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($employee) ? $employee->address : '') }}" required>
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
            </div>
            <div class="col-md-6 form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.employee.fields.phone') }}*</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($employee) ? $employee->phone : '') }}" required>
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
            </div>
            <div class="col-md-4 form-group {{ $errors->has('designation_id') ? 'has-error' : '' }}">
                <label for="designation_id">{{ trans('cruds.employee.fields.designation') }}*</label>
                <select id="designation_id" name="designation_id" class="form-control" required>
                    <option selected>Select a Designation</option>
                    @foreach($designations as $designation)
                    <option value="{{ $designation->id }}" @if($employee->designation_id == $designation->id) selected @endif>{{ $designation->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('designation_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('designation_id') }}
                    </em>
                @endif
            </div>
            <div class="col-md-4 form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">
                <label for="department_id">{{ trans('cruds.employee.fields.department') }}*</label>
                <select id="department_id" name="department_id" class="form-control" required>
                    <option selected>Select a Department</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}" @if($employee->department_id == $department->id) selected @endif>{{ $department->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('department_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('department_id') }}
                    </em>
                @endif
            </div>
            <div class="col-md-4 form-group {{ $errors->has('started_from') ? 'has-error' : '' }}">
                <label for="started_from">{{ trans('cruds.employee.fields.started_from') }}*</label>
                <input type="date" id="started_from" name="started_from" class="form-control" value="{{ old('started_from', isset($employee) ? $employee->started_from : '') }}" required>
                @if($errors->has('started_from'))
                    <em class="invalid-feedback">
                        {{ $errors->first('started_from') }}
                    </em>
                @endif
            </div>
            <div class="col-md-6 form-group {{ $errors->has('salary_type') ? 'has-error' : '' }}">
                <label for="salary_type">{{ trans('cruds.employee.fields.salary_type') }}*</label>
                <select id="salary_type" name="salary_type" class="form-control" required>
                    <option selected>Select a Salary Type</option>
                    <option value="daily" @if($employee->salary_type == 'daily') selected @endif>Daily</option>
                    <option value="weekly"@if($employee->salary_type == 'weekly') selected @endif>Weekly</option>
                    <option value="monthly"@if($employee->salary_type == 'monthly') selected @endif>Monthly</option>
                    <option value="yearly"@if($employee->salary_type == 'yearly') selected @endif>Yearly</option>
                   
                </select>
                @if($errors->has('salary_type'))
                    <em class="invalid-feedback">
                        {{ $errors->first('salary_type') }}
                    </em>
                @endif
            </div>
            <div class="col-md-6 form-group {{ $errors->has('salary') ? 'has-error' : '' }}">
                <label for="salary">{{ trans('cruds.employee.fields.salary') }}*</label>
                <input type="text" id="salary" name="salary" class="form-control" value="{{ old('salary', isset($employee) ? $employee->salary : '') }}" required>
                @if($errors->has('salary'))
                    <em class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </em>
                @endif
            </div>
            <div class="col-md-12 form-group {{ $errors->has('academic_qualification') ? 'has-error' : '' }}">
                <label for="academic_qualification">{{ trans('cruds.employee.fields.academic_qualification') }}</label>
                <input type="text" id="academic_qualification" name="academic_qualification" class="form-control" value="{{ old('academic_qualification', isset($employee) ? $employee->academic_qualification : '') }}">
                @if($errors->has('academic_qualification'))
                    <em class="invalid-feedback">
                        {{ $errors->first('academic_qualification') }}
                    </em>
                @endif
            </div>
            <div class="col-md-12 form-group {{ $errors->has('bio') ? 'has-error' : '' }}">
                <label for="bio">{{ trans('cruds.employee.fields.bio') }}</label>
                <textarea name="bio" id="bio" rows="4" class="form-control">{{ old('bio', isset($employee) ? $employee->bio : '') }}</textarea>
                @if($errors->has('bio'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bio') }}
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
