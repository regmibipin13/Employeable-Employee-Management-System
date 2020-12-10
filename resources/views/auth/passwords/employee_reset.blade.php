@extends('layouts.app')
@section('content')
<h4 class="fw-300 c-grey-900 mB-40">
    {{ trans('global.reset_password') }}
</h4>
@if(\Session::has('message'))
    <p class="alert alert-info">
        {{ \Session::get('message') }}
    </p>
@endif
<form method="POST" action="{{ route('employees.resetPassword') }}">
    {{ csrf_field() }}
    <h1>
        <div class="login-logo">
            <a href="#">
                {{ trans('panel.site_title') }}
            </a>
        </div>
    </h1>
    <p class="text-muted"></p>
    <div>
        <input name="token" value="{{ $token }}" type="hidden">
        <div class="form-group has-feedback">
            <input type="email" name="email" value="{{ $email }}" class="form-control" required placeholder="{{ trans('global.login_email') }}">
            @if($errors->has('email'))
                <em class="invalid-feedback">
                    {{ $errors->first('email') }}
                </em>
            @endif
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" required placeholder="{{ trans('global.login_password') }}">
            @if($errors->has('password'))
                <em class="invalid-feedback">
                    {{ $errors->first('password') }}
                </em>
            @endif
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
            @if($errors->has('password_confirmation'))
                <em class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </em>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-right">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
                {{ trans('global.reset_password') }}
            </button>
        </div>
    </div>
</form>
@endsection
