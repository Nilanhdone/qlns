@extends('layouts.app')

@section('main-content')
<style type="text/css">
    .register_form {
        width: 500px;
    }
</style>

<div class="container register_form">
    <form action="/regist">
        <div class="form-group">
            <label>{{ trans('messages.register.name') }}</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>{{ trans('messages.register.email') }}</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>{{ trans('messages.register.password') }}</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">{{ trans('messages.register.button') }}</button>
    </form>
</div>
@endsection
