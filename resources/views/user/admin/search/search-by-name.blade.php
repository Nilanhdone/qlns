@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-primary text-uppercase">
        {{ trans('messages.search-by-name.header') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('search-by-name-detail') }}">
            @csrf

            <div class="form-group row container">
                <div class="col-10">
                    <input type="text" class="form-control border-primary" name="name" placeholder="{{ trans('messages.search-by-name.example') }}">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <section>
            @yield('search-detail')
        </section>
    </div>
</div>
@endsection
