<div class="row familyForm">
    <div class="col-4">
        <div class="form-group">
            <label>{{ trans('bank.create.name') }}</label>

            <input type="text" class="form-control @error('fa_name[]') is-invalid @enderror border border-primary" name="fa_name[]" value="{{ old('fa_name[]') }}" required>

            @error('fa_name[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            <label>{{ trans('bank.create.year-birth') }}</label>

            <input type="text" class="form-control @error('fa_year[]') is-invalid @enderror border border-primary" name="fa_year[]" value="{{ old('fa_year[]') }}" required>

            @error('fa_year[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            <label>{{ trans('bank.create.relationship') }}</label>

            <input type="text" class="form-control @error('fa_rela[]') is-invalid @enderror border border-primary" name="fa_rela[]" value="{{ old('fa_rela[]') }}" required>

            @error('fa_rela[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>{{ trans('bank.create.address') }}</label>

            <input type="text" class="form-control @error('fa_address[]') is-invalid @enderror border border-primary" name="fa_address[]" value="{{ old('fa_address[]') }}" required>

            @error('fa_address[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
