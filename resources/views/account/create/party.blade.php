<div class="row partyForm">
    <div class="col-2">
        <div class="form-group">
            <label>Join day</label>

            <input type="date" class="form-control @error('join_day[]') is-invalid @enderror border border-primary" name="join_day[]" value="{{ old('join_day[]') }}" required>

            @error('join_day[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>Party unit</label>

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
            <label>Party position</label>

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
