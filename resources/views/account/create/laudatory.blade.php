<div class="row laudatoryForm">
    <div class="col-4">
        <div class="form-group">
            <label>Title</label>

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
            <label>Year</label>

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
            <label>Organization</label>

            <input type="text" class="form-control @error('lau_organization[]') is-invalid @enderror border border-primary" name="lau_organization[]" value="{{ old('lau_organization[]') }}" required>

            @error('lau_organization[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>Content</label>

            <input type="text" class="form-control @error('lau_content[]') is-invalid @enderror border border-primary" name="lau_content[]" value="{{ old('lau_content[]') }}" required>

            @error('lau_content[]')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>
