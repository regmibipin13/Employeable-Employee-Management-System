@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    Change Password
</h6>
<div class="mT-30">
    <form action="{{ route("admin.users.changePassword",auth()->id()) }}" method="POST">
        @csrf
        <div class="form-group {{ $errors->has('old_password') ? 'has-error' : '' }}">
            <label for="old_password">Old Password</label>
            <input type="password" id="old_password" name="old_password" class="form-control" value="{{ old('old_password') }}" required>
            @if($errors->has('old_password'))
                <em class="invalid-feedback">
                    {{ $errors->first('old_password') }}
                </em>
            @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}" required>
            @if($errors->has('password'))
                <em class="invalid-feedback">
                    {{ $errors->first('password') }}
                </em>
            @endif
        </div>
        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            @if($errors->has('password_confirmation'))
                <em class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </em>
            @endif
        </div>
        <div>
            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
    </form>
</div>
@endsection
