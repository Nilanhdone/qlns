<div class="row eduForm">
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
            <label>Education Unit</label>

            <input type="text" class="form-control @error('unit[]') is-invalid @enderror border border-primary" name="unit[]" value="{{ old('unit[]') }}" required>

            @error('unit[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>Address</label>

            <input type="text" class="form-control @error('address[]') is-invalid @enderror border border-primary" name="address[]" value="{{ old('address[]') }}" required>

            @error('address[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
