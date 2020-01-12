@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-primary text-uppercase font-weight-bolder">
        {{ trans('bank.create.app-header') }}
    </div>

    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-success"><i class="fas fa-check"></i>
                {!! Session::get('success') !!}
            </div>
        @endif
        <form method="POST" action="{{ route('get-app') }}">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <!-- Title -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.send-vacation.title') }}
                </label>

                <div class="col-md-6">
                    <input class="form-control @error('title') is-invalid @enderror" name="title" required>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Reason -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.send-vacation.reason') }}
                </label>

                <div class="col-md-6">
                    <textarea type="textarea" rows="5" class="form-control @error('reason') is-invalid @enderror" name="reason" required>
                    </textarea>

                    @error('reason')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Start day -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.send-vacation.start-day') }}
                </label>

                <div class="col-md-6">
                    <input type="date" class="form-control @error('start_day') is-invalid @enderror" name="start_day" value="{{ old('start_day') }}" required>

                    @error('start_day')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- End day -->
             <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.send-vacation.end-day') }}
                </label>

                <div class="col-md-6">
                    <input type="date" class="form-control @error('end_day') is-invalid @enderror" name="end_day" value="{{ old('end_day') }}">

                    @error('end_day')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-3">
                    <button type="submit" class="btn btn-primary">
                        {{ trans('messages.send-vacation.button') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
