@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-primary text-uppercase">
        <div class="row">
            <div class="col-md-3 text-danger">
                <a href="/edit-work/{{ $work->user_id }}">
                    <i class="fas fa-chevron-left mr-2"></i>{{ trans('messages.profile.menu.back') }}
                </a>
            </div>
            <div class="col-md-7">
                {{ trans('messages.edit-work.header') }}
            </div>
        </div>
    </div>

    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-success"><i class="fas fa-check"></i>
                {!! Session::get('success') !!}
            </div>
        @endif

        @if(Session::has('fault'))
            <div class="alert alert-danger">
                {!! Session::get('fault') !!}
            </div>
        @endif
        
        <form method="POST" action="{{ route('work-edit') }}" id="edit-work">
            @csrf

            <input type="hidden" class="form-control" name="id" value="{{ $work->id }}">
            <!-- User ID -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.edit-work.user-id') }}
                </label>

                <div class="col-md-7">
                    <input type="text" class="form-control" name="user_id" value="{{ $work->user_id }}" readonly>
                </div>
            </div>

            <!-- Unit -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.edit-work.unit') }}
                </label>

                <div class="col-md-7">
                    <select class="btn border-primary" name="unit" form="edit-work">
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
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.edit-work.position') }}
                </label>

                <div class="col-md-7">
                    <select class="btn border-primary" name="position" form="edit-work">
                        @foreach ($positions as $position)
                        <option value="{{ $position->position }}">
                            {{ trans('messages.positions.'.$position->position) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Start_day -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.edit-work.start-day') }}
                </label>

                <div class="col-md-7">
                    <input type="date" class="form-control @error('start_day') is-invalid @enderror" name="start_day" value="{{ $work->start_day }}" required>

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
                    {{ trans('messages.edit-work.end-day') }}
                </label>

                <div class="col-md-7">
                    <input type="date" class="form-control @error('end_day') is-invalid @enderror" name="end_day" value="{{ $work->end_day }}">

                    @error('end_day')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Salary -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.edit-work.salary') }}
                </label>

                <div class="col-md-7">
                    <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ $work->salary }}" required>

                    @error('salary')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <!-- Insurance number -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.edit-work.insurance') }}
                </label>

                <div class="col-md-7">
                    <input type="text" class="form-control @error('insurance_number') is-invalid @enderror" name="insurance_number" value="{{ $work->insurance_number }}" required>

                    @error('insurance_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-7 offset-md-3">
                    <button type="submit" class="btn btn-primary">
                        {{ trans('messages.edit-work.button') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
