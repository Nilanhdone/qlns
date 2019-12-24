<div class="row governmentForm">
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.government.from') }}</label>

            <input type="date" class="form-control @error('gov_start_day[]') is-invalid @enderror border border-primary" name="gov_start_day[]" value="{{ old('gov_start_day[]') }}" required>

            @error('gov_start_day[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.government.to') }}</label>

            <input type="date" class="form-control @error('gov_end_day[]') is-invalid @enderror border border-primary" name="gov_end_day[]" value="{{ old('gov_end_day[]') }}" required>

            @error('gov_end_day[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.government.unit') }}</label>

            <input type="text" class="form-control @error('gov_unit[]') is-invalid @enderror border border-primary" name="gov_unit[]" value="{{ old('gov_unit[]') }}" required>

            @error('gov_unit[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.government.position') }}</label>

            <input type="text" class="form-control @error('gov_position[]') is-invalid @enderror border border-primary" name="gov_position[]" value="{{ old('gov_position[]') }}" required>

            @error('gov_position[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
