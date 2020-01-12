@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-uppercase text-primary font-weight-bolder">
        {{ trans('bank.create.update-header') }}
    </div>

    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-success"><i class="fas fa-check"></i>
                {!! Session::get('success') !!}
            </div>
        @endif

        @if(Session::has('errors'))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><i class="fa fa-exclamation-circle mr-2"></i>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('update-pr') }}" id="create">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">
                    {{ trans('bank.create.start-day') }}
                </label>

                <div class="col-md-4">
                    <input type="date" class="form-control @error('pr_start_day') is-invalid @enderror border-primary" name="pr_start_day" value="{{ old('pr_start_day') }}" required>

                    @error('pr_start_day')
                        <span class="invalid-feedback" role="alert"></span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">
                    {{ trans('bank.create.end-day') }}
                </label>

                <div class="col-md-4">
                    <input type="date" class="form-control @error('pr_end_day') is-invalid @enderror border-primary" name="pr_end_day" value="{{ old('pr_end_day') }}">

                    @error('pr_end_day')
                        <span class="invalid-feedback" role="alert"></span>
                    @enderror
                </div>
            </div>
            <!-- Unit -->
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">
                    {{ trans('messages.register.unit') }}
                </label>

                <div class="col-md-8">
                    <select class="btn border-primary" name="current_unit" form="create">
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

                <div class="col-md-8">
                    <select class="btn border-primary" name="current_position" form="create">
                        @foreach ($positions as $position)
                        <option value="{{ $position->position }}">
                            {{ trans('messages.positions.'.$position->position) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">
                    {{ trans('messages.register.salary') }}
                </label>

                <div class="col-md-4">
                    <input type="text" class="form-control @error('salary') is-invalid @enderror border-primary" name="salary" value="{{ old('salary') }}" required>

                    @error('salary')
                        <span class="invalid-feedback" role="alert"></span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">
                    {{ trans('messages.register.insurance') }}
                </label>

                <div class="col-md-4">
                    <input type="text" class="form-control @error('insurance') is-invalid @enderror border-primary" name="insurance" value="{{ old('insurance') }}" required>

                    @error('insurance')
                        <span class="invalid-feedback" role="alert"></span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-6 offset-4">
                    <button type="sumbit" class="btn btn-primary">
                        {{ trans('bank.create.update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
$("#menuList").find(".nav-link:eq(10)").attr("class", "nav-link active");
</script>
@endsection
