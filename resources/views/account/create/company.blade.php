<div class="row companyForm">
    <div class="col-2">
        <div class="form-group">
            <label>From</label>

            <input type="date" class="form-control @error('start_day[]') is-invalid @enderror border border-primary" name="start_day[]" value="{{ old('start_day[]') }}" required>

            @error('start_day[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            <label>To</label>

            <input type="date" class="form-control @error('end_day[]') is-invalid @enderror border border-primary" name="end_day[]" value="{{ old('end_day[]') }}" required>

            @error('end_day[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>Company Name</label>

            <input type="text" class="form-control @error('edu_name[]') is-invalid @enderror border border-primary" name="edu_name[]" value="{{ old('edu_name[]') }}" required>

            @error('edu_name[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>Position</label>

            <input type="text" class="form-control @error('edu_position[]') is-invalid @enderror border border-primary" name="edu_position[]" value="{{ old('edu_position[]') }}" required>

            @error('edu_position[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
