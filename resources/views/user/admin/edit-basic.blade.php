@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-primary text-uppercase">
                    <div class="row">
                        <div class="col-3 text-danger">
                            <a href="http://127.0.0.1:8000/{{ $staff->work_unit }}">
                                <i class="fas fa-reply mr-2"></i>{{ trans('messages.profile.menu.back') }}
                            </a>
                        </div>
                        <div class="col-8 ml-auto">
                            {{ trans('messages.staff.edit-basic.header') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success"><i class="fas fa-check"></i>
                            {!! Session::get('success') !!}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('basic-edit') }}" enctype="multipart/form-data" id="edit-basic">
                        @csrf

                        <!-- User ID -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.staff.edit-basic.user-id') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user_id" value="{{ $staff->user_id }}" readonly>
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.staff.edit-basic.image') }}
                            </label>

                            <div class="col-md-6">
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror" accept="image/jpeg, image/jpg, image/png" name="image" required>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.staff.edit-basic.name') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $staff->name}}" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.staff.edit-basic.gender') }}
                            </label>

                            @if($staff->gender == "male")
                            <div class="form-check col-md-4">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                <label class="form-check-label" for="male">
                                    {{ trans('messages.staff.edit-basic.male') }}
                                </label>
                            </div>
                            <div class="form-check col-md-4">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">
                                    {{ trans('messages.staff.edit-basic.female') }}
                                </label>
                            </div>
                            @elseif($staff->gender == "female")
                            <div class="form-check col-md-4">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="male">
                                    {{ trans('messages.staff.edit-basic.male') }}
                                </label>
                            </div>
                            <div class="form-check col-md-4">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female" checked>
                                <label class="form-check-label" for="female">
                                    {{ trans('messages.staff.edit-basic.female') }}
                                </label>
                            </div>
                            @endif
                        </div>

                        <!-- Birthday -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.staff.edit-basic.birthday') }}
                            </label>

                            <div class="col-md-6">
                                <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $staff->birthday }}" required>

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Identify_number -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.staff.edit-basic.identify') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('identify_number') is-invalid @enderror" name="identify_number" value="{{ $staff->identify_number }}" required>

                                @error('identify_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Nationality -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.staff.edit-basic.nationality') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ $staff->nationality }}" required>

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
                                {{ trans('messages.staff.edit-basic.religion') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ $staff->religion }}" required>

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
                                {{ trans('messages.staff.edit-basic.hometown') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('hometown') is-invalid @enderror" name="hometown" value="{{ $staff->hometown }}" required>

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
                                {{ trans('messages.staff.edit-basic.address') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $staff->address }}" required>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Phone number -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.staff.edit-basic.phone') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $staff->phone }}" required>

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
                                {{ trans('messages.staff.edit-basic.email') }}
                            </label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $staff->email }}" readonly>
                            </div>
                        </div>

                        <!-- Degree -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.staff.edit-basic.degree') }}
                            </label>

                            <div class="col-md-6">
                                <select class="btn btn-outline" name="degree" form="edit-basic">
                                    <option disabled selected value="{{ $staff->degree }}">{{ trans('messages.staff.edit-basic.'.$staff->degree) }}</option>
                                    <option value="bachelor">{{ trans('messages.staff.edit-basic.bachelor') }}</option>
                                    <option value="engineer">{{ trans('messages.staff.edit-basic.engineer') }}</option>
                                    <option value="master">{{ trans('messages.staff.edit-basic.master') }}</option>
                                    <option value="post-doctor">{{ trans('messages.staff.edit-basic.post-doctor') }}</option>
                                </select>
                            </div>
                        </div>

                        <!-- Role -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.staff.edit-basic.role') }}
                            </label>

                            <div class="col-md-6">
                                <select class="btn btn-outline" name="role" form="edit-basic">
                                    <option disabled selected value="{{ $staff->role }}">{{ trans('messages.staff.edit-basic.'.$staff->role) }}</option>
                                    <option value="employee">{{ trans('messages.staff.edit-basic.employee') }}</option>
                                    <option value="manager">{{ trans('messages.staff.edit-basic.manager') }}</option>
                                    <option value="admin">{{ trans('messages.staff.edit-basic.admin') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('messages.staff.edit-basic.button') }}
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
