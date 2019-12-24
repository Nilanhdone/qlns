@extends('account.detail.profile.profile')

@section('component')
<div class="card">
    <form method="POST" action="{{ route('edit-pr') }}" id="create">
        @csrf
        <input type="hidden" name="id" value="{{ $process->id }}">
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('bank.create.start-day') }}
            </label>

            <div class="col-md-4">
                <input type="date" class="form-control @error('start_day') is-invalid @enderror border-primary" name="start_day" value="{{ $process->start_day }}" required>

                @error('start_day')
                    <span class="invalid-feedback" role="alert"></span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('bank.create.end-day') }}
            </label>

            <div class="col-md-4">
                <input type="date" class="form-control @error('end_day') is-invalid @enderror border-primary" name="end_day" value="{{ $process->end_day }}">

                @error('end_day')
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
                <select class="btn border-primary" name="unit" form="create">
                    @foreach ($units as $unit)
                    @if($unit == $process->unit)
                    <option value="{{ $process->unit }}" selected>
                        {{ trans('messages.branchs.'.$process->branch) }} / {{ trans('messages.units.'.$process->unit) }}
                    </option>
                    @else
                    <option value="{{ $unit->unit }}">
                        {{ trans('messages.branchs.'.$unit->branch) }} / {{ trans('messages.units.'.$unit->unit) }}
                    </option>
                    @endif
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
                <select class="btn border-primary" name="position" form="create">
                    @foreach ($positions as $position)
                    @if($unit == $process->unit)
                    <option value="{{ $process->position }}" selected>
                        {{ trans('messages.positions.'.$process->position) }}
                    </option>
                    @else
                    <option value="{{ $position->position }}">
                        {{ trans('messages.positions.'.$position->position) }}
                    </option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('messages.register.salary') }}
            </label>

            <div class="col-md-4">
                <input type="text" class="form-control @error('salary') is-invalid @enderror border-primary" name="salary" value="{{ $process->salary }}" required>

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
                <input type="text" class="form-control @error('insurance') is-invalid @enderror border-primary" name="insurance" value="{{ $process->insurance }}" required>

                @error('insurance')
                    <span class="invalid-feedback" role="alert"></span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-6 offset-4">
                <button type="sumbit" class="btn btn-primary">
                    {{ trans('bank.create.edit') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
$("#menuList").find(".nav-link:eq(10)").attr("class", "nav-link active");
</script>
@endsection
