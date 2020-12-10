@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.create') }} {{ trans('cruds.designation.title_singular') }}
</h6>
<div class="mT-30">
    <form action="{{ route("admin.designations.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">{{ trans('cruds.designation.fields.name') }}*</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($designation) ? $designation->name : '') }}" required>
            @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.designation.fields.name_helper') }}
            </p>
        </div>
        <div>
            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
    </form>
</div>
@endsection
