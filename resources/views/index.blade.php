@extends('layouts.app')

@section('main-content')
<style type="text/css">
    .login_form {
        width: 500px;
    }
</style>

<div class="container login_form">
    <form action="/profile">
        <div class="form-group">
            <label>{{ trans('messages.login.email') }}</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>{{ trans('messages.login.password') }}</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label><a href="#">{{ trans('messages.login.forget') }}</a></label>
        </div>
        <button type="submit" class="btn btn-primary">{{ trans('messages.login.button') }}</button>
    </form>
</div>
@endsection
