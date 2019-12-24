<div class="row eduForm">
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.education.from') }}</label>

            <input type="month" class="form-control @error('edu_start_day[]') is-invalid @enderror border border-primary" name="edu_start_day[]" value="{{ old('edu_start_day[]') }}" required>

            @error('edu_start_day[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.education.to') }}</label>

            <input type="month" class="form-control @error('edu_end_day[]') is-invalid @enderror border border-primary" name="edu_end_day[]" value="{{ old('edu_end_day[]') }}" required>

            @error('edu_end_day[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.education.level') }}</label>

            <input type="text" class="form-control @error('edu_level[]') is-invalid @enderror border border-primary" name="edu_level[]" value="{{ old('edu_level[]') }}" required>

            @error('edu_level[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.education.address') }}</label>

            <input type="text" class="form-control @error('edu_address[]') is-invalid @enderror border border-primary" name="edu_address[]" value="{{ old('edu_address[]') }}" required>

            @error('edu_address[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
