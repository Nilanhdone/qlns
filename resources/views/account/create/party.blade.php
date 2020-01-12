<div class="row partyForm">
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.party.from') }}</label>

            <input type="month" class="form-control @error('party_start_day[]') is-invalid @enderror border border-primary" name="party_start_day[]" value="{{ old('party_start_day[]') }}" required>

            @error('party_start_day[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.party.to') }}</label>

            <input type="month" class="form-control @error('party_end_day[]') is-invalid @enderror border border-primary" name="party_end_day[]" value="{{ old('party_end_day[]') }}" required>

            @error('party_end_day[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.party.position') }}</label>

            <input type="text" class="form-control @error('party_position[]') is-invalid @enderror border border-primary" name="party_position[]" value="{{ old('party_position[]') }}" required>

            @error('party_position[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.party.other') }}</label>

            <input type="text" class="form-control @error('party_other[]') is-invalid @enderror border border-primary" name="party_other[]" value="{{ old('party_other[]') }}" required>

            @error('party_other[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
