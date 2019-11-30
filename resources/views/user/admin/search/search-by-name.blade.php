@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-primary text-uppercase">
        {{ trans('messages.search-by-name.header') }}
    </div>
    <div class="card-body">
        <form method="get" action="{{ route('search-by-name-detail') }}">
            @csrf

            <div class="form-group row">
                <!-- Name -->
                <label class="col-2 col-form-label text-md-right">
                    {{ trans('messages.search-by-name.name') }}
                </label>

                <div class="col-4">
                    <input type="text" class="form-control" name="name" placeholder="{{ trans('messages.search-by-name.example') }}">
                </div>

                <div class="col-3">
                    <button type="submit" class="btn btn-primary">
                        {{ trans('messages.search-by-name.button') }}
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