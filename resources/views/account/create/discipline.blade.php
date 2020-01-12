<div class="row disciplineForm">
    <div class="col-4">
        <div class="form-group">
            <label>{{ trans('bank.discipline.discipline') }}</label>

            <input type="text" class="form-control @error('discipline[]') is-invalid @enderror border border-primary" name="discipline[]" value="{{ old('discipline[]') }}" required>

            @error('discipline[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>{{ trans('bank.discipline.year') }}</label>

            <input type="text" class="form-control @error('dis_year[]') is-invalid @enderror border border-primary" name="dis_year[]" value="{{ old('dis_year[]') }}" required>

            @error('dis_year[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>{{ trans('bank.discipline.method') }}</label>

            <input type="text" class="form-control @error('dis_method[]') is-invalid @enderror border border-primary" name="dis_method[]" value="{{ old('dis_method[]') }}" required>

            @error('dis_method[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
