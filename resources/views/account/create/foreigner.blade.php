<div class="row foreignerForm">
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.foreigner.name') }}</label>

            <input type="text" class="form-control @error('fore_name[]') is-invalid @enderror border border-primary" name="fore_name[]" value="{{ old('fore_name[]') }}" required>

            @error('fore_name[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            <label>{{ trans('bank.foreigner.year-birth') }}</label>

            <input type="text" class="form-control @error('fore_year[]') is-invalid @enderror border border-primary" name="fore_year[]" value="{{ old('fore_year[]') }}" required>

            @error('fore_year[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            <label>{{ trans('bank.foreigner.relationship') }}</label>

            <input type="text" class="form-control @error('fore_rela[]') is-invalid @enderror border border-primary" name="fore_rela[]" value="{{ old('fore_rela[]') }}" required>

            @error('fore_rela[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            <label>{{ trans('bank.foreigner.nationality') }}</label>

            <input type="text" class="form-control @error('fore_nation[]') is-invalid @enderror border border-primary" name="fore_nation[]" value="{{ old('fore_nation[]') }}" required>

            @error('fore_nation[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>Khoang thoi gian</label>

            <input type="text" class="form-control @error('fore_time[]') is-invalid @enderror border border-primary" name="fore_time[]" value="{{ old('fore_time[]') }}" required>

            @error('fore_time[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
