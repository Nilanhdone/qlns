@extends('layouts.app')

@section('content')
<div class="card mr-4 ml-4">
    <div class="card-header text-primary text-uppercase">
        {{ trans('messages.multiple-search.header') }}
    </div>

    <div class="card-body">
        <form method="get" action="{{ route('multiple-search-detail') }}">
            @csrf

            <div class="form-group row">
                <!-- Name -->
                <label class="col-1 col-form-label text-md-right">
                    {{ trans('messages.multiple-search.name') }}
                </label>

                <div class="col-2">
                    <input type="text" class="form-control" name="name">
                </div>

                <!-- Birthday -->
                <label class="col-1 col-form-label text-md-right">
                    {{ trans('messages.multiple-search.birthday') }}
                </label>

                <div class="col-2">
                    <input type="date" class="form-control" name="birthday">
                </div>

                <!-- Identify number -->
                <label class="col-2 col-form-label text-md-right">
                    {{ trans('messages.multiple-search.identify_number') }}
                </label>

                <div class="col-2">
                    <input type="text" class="form-control" name="identify_number">
                </div>

                <div class="col-2">
                    <button type="submit" class="btn btn-primary">
                        {{ trans('messages.multiple-search.button') }}
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