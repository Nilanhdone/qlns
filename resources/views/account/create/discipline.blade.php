<div class="row disciplineForm">
    <div class="col-4">
        <div class="form-group">
            <label>Infringe</label>

            <input type="text" class="form-control @error('infringe[]') is-invalid @enderror border border-primary" name="infringe[]" value="{{ old('infringe[]') }}" required>

            @error('infringe[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            <label>Year</label>

            <input type="text" class="form-control @error('inf_year[]') is-invalid @enderror border border-primary" name="inf_year[]" value="{{ old('inf_year[]') }}" required>

            @error('inf_year[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>Organization</label>

            <input type="text" class="form-control @error('inf_organization[]') is-invalid @enderror border border-primary" name="inf_organization[]" value="{{ old('inf_organization[]') }}" required>

            @error('inf_organization[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>Discipline method</label>

            <input type="text" class="form-control @error('inf_method[]') is-invalid @enderror border border-primary" name="inf_method[]" value="{{ old('inf_method[]') }}" required>

            @error('inf_method[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
