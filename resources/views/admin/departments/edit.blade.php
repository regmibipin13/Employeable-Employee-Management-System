@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.edit') }} {{ trans('cruds.department.title_singular') }}
</h6>
<div class="mT-30">
    <form action="{{ route("admin.departments.update", [$department->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">{{ trans('cruds.department.fields.name') }}*</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($department) ? $department->name : '') }}" required>
            @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.department.fields.name_helper') }}
            </p>
        </div>
        <div>
            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
    </form>
</div>
@endsection
