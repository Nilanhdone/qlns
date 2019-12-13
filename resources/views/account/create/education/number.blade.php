@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-uppercase text-primary font-weight-bolder">
        {{ trans('messages.register.header') }} / <a class="text-danger">Education history</a>
    </div>

    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-success"><i class="fas fa-check"></i>
                {!! Session::get('success') !!}
            </div>
        @endif

        <form method="POST" action="{{ route('num-his-edu') }}">
            @csrf

            <input type="hidden" name="user_id" value="">
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    Enter number of education history
                </label>

                <div class="col-md-6">
                    <input type="number" class="form-control @error('number') is-invalid @enderror border border-primary" name="number" value="{{ old('number') }}" required>

                    @error('number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </div>
        </form>

        @yield('history_education_form')
    </div>
</div>
@endsection
