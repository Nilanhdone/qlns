@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('messages.update.header') }}</div>

                <div class="card-body">
                    <form method="get" action="{{ route('update') }}" id="update">
                        @csrf


                        <!-- Status -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Status') }}
                            </label>

                            <div class="form-check col-md-4">
                                <input class="form-check-input" type="radio" name="status" id="active" value="1" checked>
                                <label class="form-check-label" for="active">
                                    Active
                                </label>
                            </div>
                            <div class="form-check col-md-4">
                                <input class="form-check-input" type="radio" name="status" id="inactive" value="0">
                                <label class="form-check-label" for="inactive">
                                    Inactive
                                </label>
                            </div>
                        </div>

                        <!-- Position -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Position') }}
                            </label>

                            <div class="col-md-6">
                                <select name="position" form="update">
                                    <option value="Employee">Ke toan</option>
                                    <option value="Manager">Thuc tap sinh</option>
                                    <option value="Admin">Chuyen vien</option>
                                    <option value="Admin">Truong phong</option>
                                </select>
                            </div>
                        </div>

                        <!-- Department -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Department') }}
                            </label>

                            <div class="col-md-6">
                                <select  name="department" form="update">
                                    <option value="Cu nhan">Phong tai chinh</option>
                                    <option value="Ky su">Phong kinh doanh</option>
                                    <option value="Thac si">Phong quan ly</option>
                                    <option value="Tien si">Phong nhan su</option>
                                </select>
                            </div>
                        </div>


                          <!-- Work unit -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Work unit') }}
                            </label>

                            <div class="col-md-6">
                                <select  name="work_unit" form="update">
                                    <option value="Luangprabang">Luangprabang</option>
                                    <option value="Oudomxay">Oudomxay</option>
                                      <option value="Xiengkhoang">Xiengkhoang</option>
                                    <option value="Savannakhet">Savannakhet</option>
                                    <option value="Champasak">Champasak</option>
                                </select>
                            </div>
                        </div>

                        <!-- Start day -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Start day') }}
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
                                {{ __('End day') }}
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
                                {{ __('Salary') }}
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
                                {{ __('Insurance number') }}
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

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('update') }}
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
