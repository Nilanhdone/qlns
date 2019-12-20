<div class="row partyForm">
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.create.join') }}</label>

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
            <label>{{ trans('bank.create.unit') }}</label>

            <input type="text" class="form-control @error('party_unit[]') is-invalid @enderror border border-primary" name="party_unit[]" value="{{ old('party_unit[]') }}" required>

            @error('party_unit[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>{{ trans('bank.create.position') }}</label>

            <input type="text" class="form-control @error('party_position[]') is-invalid @enderror border border-primary" name="party_position[]" value="{{ old('party_position[]') }}" required>

            @error('party_position[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
