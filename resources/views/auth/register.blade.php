@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('messages.register.header') }}</div>

                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success"><i class="fas fa-check"></i>
                            {!! Session::get('success') !!}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('register') }}" id="register">
                        @csrf

                        <!-- User ID -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('User ID') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" required>

                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Gender') }}
                            </label>

                            <div class="form-check col-md-4">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                <label class="form-check-label" for="male">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check col-md-4">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">
                                    Nu
                                </label>
                            </div>
                        </div>

                        <!-- Role -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Role') }}
                            </label>

                            <div class="col-md-6">
                                <select name="role" form="register">
                                    <option value="Employee">Employee</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>

                        <!-- Degree -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Degree') }}
                            </label>

                            <div class="col-md-6">
                                <select  name="degree" form="register">
                                    <option value="Cu nhan">Cu nhan</option>
                                    <option value="Ky su">Ky su</option>
                                    <option value="Thac si">Thac si</option>
                                    <option value="Tien si">Tien si</option>
                                </select>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Name') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <!-- phone -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Phone') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('E-Mail Address') }}
                            </label>

                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                          <!-- Birthday -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Birthday') }}
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
                                {{ __('Nationality') }}
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

                          <!-- Religion -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Religion') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion') }}" required>

                                @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <!-- Hometown -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Hometown') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('hometown') is-invalid @enderror" name="hometown" value="{{ old('hometown') }}" required>

                                @error('hometown')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <!-- Address -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Address') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <!-- Identify_number -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Identify_number') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('identify_number') is-invalid @enderror" name="identify_number" value="{{ old('identify_number') }}" required>

                                @error('identify_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Password') }}
                            </label>

                            <div class="col-md-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Confirm Password') }}
                            </label>

                            <div class="col-md-6">
                                <input type="password" class="form-control @error('repassword') is-invalid @enderror" name="repassword" required>

                                @error('repassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
