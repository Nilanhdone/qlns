@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new calendar</div>

                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success"><i class="fas fa-check"></i>
                            {!! Session::get('success') !!}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="register">
                        @csrf

                        <!-- Birthday -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                Time
                            </label>

                            <div class="col-md-6">
                                <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required>

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Nationality -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                Title
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ old('nationality') }}" required>

                                @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- description -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                Description
                            </label>

                            <div class="col-md-6">
                                <textarea type="text" rows="5" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required>
                                </textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add work calendar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
