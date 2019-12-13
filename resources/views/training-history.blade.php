@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-uppercase text-primary font-weight-bolder">
        {{ trans('messages.register.header') }} / <a class="text-danger">Enter trainning history</a>
    </div>

    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-success"><i class="fas fa-check"></i>
                {!! Session::get('success') !!}
            </div>
        @endif

        <form method="POST" action="#" id="register">
            @csrf

            <div class="row">
            	<div class="col-5">
            		<div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">
                            From day
                        </label>

                        <div class="col-md-8">
                            <input type="date" class="form-control @error('start_day') is-invalid @enderror border border-primary" name="start_day" value="{{ old('start_day') }}" required>

                            @error('start_day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">
                            To day
                        </label>

                        <div class="col-md-8">
                            <input type="date" class="form-control @error('end_day') is-invalid @enderror border border-primary" name="end_day" value="{{ old('end_day') }}" required>

                            @error('end_day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            	</div>
            	<div class="col-7">
            		<div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">
                            Education Unit
                        </label>

                        <div class="col-md-8">
                            <input type="text" class="form-control @error('end_day') is-invalid @enderror border border-primary" name="end_day" value="{{ old('end_day') }}" required>

                            @error('end_day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">
                            Address
                        </label>

                        <div class="col-md-8">
                            <input type="text" class="form-control @error('end_day') is-invalid @enderror border border-primary" name="end_day" value="{{ old('end_day') }}" required>

                            @error('end_day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-4 offset-md-3">
                            <button type="submit" class="btn btn-primary">
                                Continue<i class="fas fa-chevron-right ml-3"></i>
                            </button>
                        </div>
                    </div>
            	</div>
            </div>
        </form>
    </div>
</div>
@endsection