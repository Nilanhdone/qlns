@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-uppercase text-primary font-weight-bolder">
        {{ trans('bank.header.search') }}
    </div>

    <div class="card-body">
        @include('account.search.search-form')
    </div>

    @yield('result')
</div>
@endsection
