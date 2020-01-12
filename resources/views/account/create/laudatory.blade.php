<div class="row laudatoryForm">
    <div class="col-4">
        <div class="form-group">
            <label>{{ trans('bank.laudatory.title') }}</label>

            <input type="text" class="form-control @error('title[]') is-invalid @enderror border border-primary" name="title[]" value="{{ old('title[]') }}" required>

            @error('title[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            <label>{{ trans('bank.laudatory.year') }}</label>

            <input type="text" class="form-control @error('lau_year[]') is-invalid @enderror border border-primary" name="lau_year[]" value="{{ old('lau_year[]') }}" required>

            @error('lau_year[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.laudatory.method') }}</label>

            <input type="text" class="form-control @error('lau_method[]') is-invalid @enderror border border-primary" name="lau_method[]" value="{{ old('lau_method[]') }}" required>

            @error('lau_method[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.laudatory.number') }}</label>

            <input type="text" class="form-control @error('lau_number[]') is-invalid @enderror border border-primary" name="lau_number[]" value="{{ old('lau_number[]') }}" required>

            @error('lau_number[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
