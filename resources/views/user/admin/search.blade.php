@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-primary text-uppercase">
        Search
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('search-detail') }}">
            @csrf

            <div class="form-group row">
                <!-- Name -->
                <label class="col-1 col-form-label text-md-right">
                    Name
                </label>

                <div class="col-2">
                    <input type="text" class="form-control" name="name" placeholder="name">
                </div>
                <!-- Birthday -->
                <label class="col-1 col-form-label text-md-right">
                    Birthday
                </label>

                <div class="col-2">
                    <input type="date" class="form-control" name="birthday">
                </div>
                <!-- Identify number -->
                <label class="col-2 col-form-label text-md-right">
                    Identify number
                </label>

                <div class="col-2">
                    <input type="text" class="form-control" name="identify_number">
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Search
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