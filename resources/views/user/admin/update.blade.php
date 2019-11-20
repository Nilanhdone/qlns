@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-primary text-uppercase">
                    <div class="row">
                        <div class="col-3 text-danger">
                            <a href="http://127.0.0.1:8000/{{ $work_unit }}">
                                <i class="fas fa-reply mr-2"></i>{{ trans('messages.profile.menu.back') }}
                            </a>
                        </div>
                        <div class="col-8 ml-auto">
                            {{ trans('messages.update.header') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success"><i class="fas fa-check"></i>
                            {!! Session::get('success') !!}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('update-info') }}" id="update">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <!-- Department -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.update.department') }}
                            </label>

                            <div class="col-md-6">
                                <select class="btn btn-outline" name="department" form="update">
                                    <option value="departments">
                                        {{ trans('messages.update.departments') }}
                                    </option>
                                    <option value="equivalent-departments">
                                        {{ trans('messages.update.equivalent-departments') }}
                                    </option>
                                    <option value="bol-branches">
                                        {{ trans('messages.update.bol-branches') }}
                                    </option>
                                    <option value="ED-under-BOL">
                                        {{ trans('messages.update.ED-under-BOL') }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Work unit -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.update.work-unit') }}
                            </label>

                            <div class="col-md-6">
                                <select class="btn btn-outline" name="work_unit" form="update">
                                    @foreach ($units as $unit)
                                    <option value="{{ $unit->unit }}">
                                        {{ trans('messages.register.unit.'.$unit->unit) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Position -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.update.position') }}
                            </label>

                            <div class="col-md-6">
                                <select class="btn btn-outline" name="position" form="update">
                                    @foreach ($positions as $position)
                                    <option value="{{ $position->position }}">
                                        {{ trans('messages.register.positions.'.$position->position) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Start day -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.update.start-day') }}
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
                                {{ trans('messages.update.end-day') }}
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

                        <!-- Salary -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ trans('messages.update.salary') }}
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
                                {{ trans('messages.update.insurance') }}
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

                        <!-- Button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('messages.update.button') }}
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
