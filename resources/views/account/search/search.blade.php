@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-uppercase text-primary font-weight-bolder">
        Search
    </div>

    <div class="card-body">
        @include('account.search.search-form')
    </div>

    @yield('result')
</div>
@endsection
