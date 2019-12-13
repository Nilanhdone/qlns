@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-uppercase text-primary font-weight-bolder">
        <div class="row">
            <div class="col-auto mr-auto">
                {{ trans('messages.register.header') }} / <a class="text-danger">Enter education history</a>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" id="addNewEduHis">Add new</button>
            </div>
        </div>
    </div>

    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-success"><i class="fas fa-check"></i>
                {!! Session::get('success') !!}
            </div>
        @endif

        <form method="POST" action="#">
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    Enter number of education history
                </label>

                <div class="col-md-6">
                    <input type="number" class="form-control @error('edu_his_num') is-invalid @enderror border border-primary" name="edu_his_num" value="{{ old('edu_his_num') }}" required>

                    @error('edu_his_num')
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

        <form method="POST" action="#" id="register">
            @csrf

            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label>From</label>

                        <input type="date" class="form-control @error('start_day') is-invalid @enderror border border-primary" name="start_day" value="{{ old('start_day') }}" required>

                        @error('start_day')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>To</label>

                        <input type="date" class="form-control @error('end_day') is-invalid @enderror border border-primary" name="end_day" value="{{ old('end_day') }}" required>

                        @error('end_day')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Education Unit</label>

                        <input type="text" class="form-control @error('edu_unit') is-invalid @enderror border border-primary" name="edu_unit" value="{{ old('edu_unit') }}" required>

                        @error('edu_unit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group row">
                        <label>Address</label>

                        <input type="text" class="form-control @error('edu_address') is-invalid @enderror border border-primary" name="edu_address" value="{{ old('edu_address') }}" required>

                        @error('edu_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="row">
                <div class="form-group col-md-2 offset-md-10">
                    <button type="submit" class="btn btn-primary">
                        Continue<i class="fas fa-chevron-right ml-3"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
