<div class="row trainingForm">
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.training.from') }}</label>

            <input type="month" class="form-control @error('train_start_day[]') is-invalid @enderror border border-primary" name="train_start_day[]" value="{{ old('train_start_day[]') }}" required>

            @error('train_start_day[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.training.to') }}</label>

            <input type="month" class="form-control @error('train_end_day[]') is-invalid @enderror border border-primary" name="train_end_day[]" value="{{ old('train_end_day[]') }}" required>

            @error('train_end_day[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.training.course') }}</label>

            <input type="text" class="form-control @error('train_course[]') is-invalid @enderror border border-primary" name="train_course[]" value="{{ old('train_course[]') }}" required>

            @error('train_course[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>{{ trans('bank.training.address') }}</label>

            <input type="text" class="form-control @error('train_address[]') is-invalid @enderror border border-primary" name="train_address[]" value="{{ old('train_address[]') }}" required>

            @error('train_address[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>

<div class="row trainingForm">
    <div class="col-12">
        <div class="form-group">
            <label>{{ trans('bank.training.content') }}</label>

            <input type="text" class="form-control @error('train_content[]') is-invalid @enderror border border-primary" name="train_content[]" value="{{ old('train_content[]') }}" required>

            @error('train_content[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
