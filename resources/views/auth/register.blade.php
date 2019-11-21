@extends('layouts.app')

@section('content')
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
                
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="register">
                    @csrf

                    <!-- User ID -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.user-id') }}
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

                    <!-- Image -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.image') }}
                        </label>

                        <div class="col-md-6">
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" accept="image/jpeg, image/jpg, image/png" name="image">

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
                            {{ trans('messages.register.name') }}
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

                    <!-- Gender -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.gender') }}
                        </label>

                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                            <label class="form-check-label" for="male">
                                {{ trans('messages.register.male') }}
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">
                                {{ trans('messages.register.female') }}
                            </label>
                        </div>
                    </div>

                    <!-- Birthday -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.birthday') }}
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

                    <!-- Identify_number -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.identify') }}
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

                    <!-- Nationality -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.nationality') }}
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
                            {{ trans('messages.register.religion') }}
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
                            {{ trans('messages.register.hometown') }}
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
                            {{ trans('messages.register.address') }}
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

                    <!-- Phone number -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.phone') }}
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
                            {{ trans('messages.register.email') }}
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

                    <!-- Degree -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.degree') }}
                        </label>

                        <div class="col-md-6">
                            <select class="btn btn-outline" name="degree" form="register">
                                <option value="bachelor">{{ trans('messages.degree.bachelor') }}</option>
                                <option value="engineer">{{ trans('messages.degree.engineer') }}</option>
                                <option value="master">{{ trans('messages.degree.master') }}</option>
                                <option value="post-doctor">{{ trans('messages.degree.post-doctor') }}</option>
                            </select>
                        </div>
                    </div>

                    <!-- Branch -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.branch') }}
                        </label>

                        <div class="col-md-6">
                            <select class="btn btn-outline" name="branch" form="register">
                                <option value="head">
                                    {{ trans('messages.branchs.head') }}
                                </option>
                                <option value="ob">
                                    {{ trans('messages.branchs.ob') }}
                                </option>
                                <option value="lb">
                                    {{ trans('messages.branchs.lb') }}
                                </option>
                                <option value="sb">
                                    {{ trans('messages.branchs.sb') }}
                                </option>
                                <option value="cb">
                                    {{ trans('messages.branchs.cb') }}
                                </option>
                                <option value="xb">
                                    {{ trans('messages.branchs.xb') }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Unit -->
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.unit') }}
                        </label>

                        <div class="col-md-6">
                            <select class="btn btn-outline" name="unit" form="register">
                                @foreach ($units as $unit)
                                <option value="{{ $unit->unit }}">
                                    {{ trans('messages.branchs.'.$unit->branch) }} / {{ trans('messages.units.'.$unit->unit) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Position -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.position') }}
                        </label>

                        <div class="col-md-6">
                            <select class="btn btn-outline" name="position" form="register">
                                @foreach ($positions as $position)
                                <option value="{{ $position->position }}">
                                    {{ trans('messages.positions.'.$position->position) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Start day -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.start-day') }}
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
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.end-day') }}
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

                    <!-- Coefficients salary -->
                     <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.salary') }}
                        </label>

                        <div class="col-md-6">
                            <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required>

                            @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Insurance number -->
                     <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.insurance') }}
                        </label>

                        <div class="col-md-6">
                            <input type="text" class="form-control @error('insurance_number') is-invalid @enderror" name="insurance_number" value="{{ old('insurance_number') }}" required>

                            @error('insurance_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">
                            {{ trans('messages.register.role') }}
                        </label>

                        <div class="col-md-6">
                            <select class="btn btn-outline" name="role" form="register">
                                <option value="employee">{{ trans('messages.role.employee') }}</option>
                                <option value="manager">{{ trans('messages.role.manager') }}</option>
                                <option value="admin">{{ trans('messages.role.admin') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ trans('messages.register.button') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
