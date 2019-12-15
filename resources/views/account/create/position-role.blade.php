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
        {{ trans('messages.register.role') }}
    </label>

    <div class="col-md-8">
        <select class="btn border-primary" name="role" form="create">
            <option value="employee">{{ trans('messages.role.employee') }}</option>
            <option value="manager">{{ trans('messages.role.manager') }}</option>
            <option value="admin">{{ trans('messages.role.admin') }}</option>
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
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
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
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
