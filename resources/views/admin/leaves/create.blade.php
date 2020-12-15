@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.create') }} {{ trans('cruds.leave.title_singular') }}
</h6>
<div class="mT-30">
    <form action="{{ route("admin.leaves.store") }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                <label for="date">{{ trans('cruds.leave.fields.date') }}*</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ old('date', isset($leave) ? $leave->date : '') }}" required>
                @if($errors->has('date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </em>
                @endif
            </div>

            <div class="col-md-12 form-group {{ $errors->has('reason') ? 'has-error' : '' }}">
                <label for="reason">{{ trans('cruds.leave.fields.reason') }}</label>
                <input type="text" name="reason" id="reason" class="form-control">{{ old('reason', isset($leave) ? $leave->reason : '') }}
                @if($errors->has('reason'))
                    <em class="invalid-feedback">
                        {{ $errors->first('reason') }}
                    </em>
                @endif
            </div>

            <div class="col-md-12 form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.leave.fields.description') }}</label>
                <textarea name="description" id="description" rows="4" class="form-control">{{ old('description', isset($leave) ? $leave->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
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

