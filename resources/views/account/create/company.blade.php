<div class="row companyForm">
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.company.from') }}</label>

            <input type="date" class="form-control @error('com_start_day[]') is-invalid @enderror border border-primary" name="com_start_day[]" value="{{ old('com_start_day[]') }}" required>

            @error('com_start_day[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.company.to') }}</label>

            <input type="date" class="form-control @error('com_end_day[]') is-invalid @enderror border border-primary" name="com_end_day[]" value="{{ old('com_end_day[]') }}" required>

            @error('com_end_day[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.company.unit') }}</label>

            <input type="text" class="form-control @error('com_unit[]') is-invalid @enderror border border-primary" name="com_unit[]" value="{{ old('com_unit[]') }}" required>

            @error('com_unit[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.company.position') }}</label>

            <input type="text" class="form-control @error('com_position[]') is-invalid @enderror border border-primary" name="com_position[]" value="{{ old('com_position[]') }}" required>

            @error('com_position[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
