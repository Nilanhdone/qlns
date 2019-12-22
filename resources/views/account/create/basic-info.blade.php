<div class="row">
    <div class="col">
        <!-- User ID -->
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('messages.register.user-id') }}
            </label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('user_id') is-invalid @enderror border border-primary" name="user_id" value="{{ old('user_id') }}" required>

                @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Image -->
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('messages.register.image') }}
            </label>

            <div class="col-md-7">
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" accept="image/jpeg, image/jpg, image/png" name="image" required>

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Name -->
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('messages.register.name') }}
            </label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('fullname') is-invalid @enderror border border-primary" name="fullname" value="{{ old('fullname') }}" required>

                @error('fullname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Gender -->
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('messages.register.gender') }}
            </label>

            <div class="col-md-7">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                    <label class="form-check-label" for="male">
                        {{ trans('messages.register.male') }}
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">
                        {{ trans('messages.register.female') }}
                    </label>
                </div>
            </div>
        </div>

        <!-- Birthday -->
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('messages.register.birthday') }}
            </label>

            <div class="col-md-7">
                <input type="date" class="form-control @error('birthday') is-invalid @enderror border border-primary" name="birthday" value="{{ old('birthday') }}" required>

                @error('birthday')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Degree -->
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('messages.register.degree') }}
            </label>

            <div class="col-md-7">
                <select class="btn border-primary" name="degree" form="create">
                    <option value="bachelor">{{ trans('messages.degree.bachelor') }}</option>
                    <option value="engineer">{{ trans('messages.degree.engineer') }}</option>
                    <option value="master">{{ trans('messages.degree.master') }}</option>
                    <option value="post-doctor">{{ trans('messages.degree.post-doctor') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('bank.create.identity') }}
            </label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('identity') is-invalid @enderror border border-primary" name="identity" value="{{ old('identity') }}" required>

                @error('identity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('bank.create.passport') }}
            </label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('passport') is-invalid @enderror border border-primary" name="passport" value="{{ old('passport') }}" required>

                @error('passport')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('bank.create.matrimony') }}
            </label>

            <div class="col-md-7">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="matrimony" value="married" checked>
                    <label class="form-check-label">
                        {{ trans('bank.create.married') }}
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="matrimony" value="single">
                    <label class="form-check-label">
                        {{ trans('bank.create.single') }}
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <!-- Nationality -->
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('messages.register.nationality') }}
            </label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('user_nationality') is-invalid @enderror border border-primary" name="user_nationality" value="{{ old('user_nationality') }}" required>

                @error('user_nationality')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Religion -->
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('messages.register.religion') }}
            </label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('religion') is-invalid @enderror border border-primary" name="religion" value="{{ old('religion') }}" required>

                @error('religion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Hometown -->
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('messages.register.hometown') }}
            </label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('hometown') is-invalid @enderror border border-primary" name="hometown" value="{{ old('hometown') }}" required>

                @error('hometown')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Address -->
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('messages.register.address') }}
            </label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('user_address') is-invalid @enderror border border-primary" name="user_address" value="{{ old('user_address') }}" required>

                @error('user_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Phone number -->
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('messages.register.phone') }}
            </label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('phone') is-invalid @enderror border border-primary" name="phone" value="{{ old('phone') }}" required>

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('messages.register.email') }}
            </label>

            <div class="col-md-7">
                <input type="email" class="form-control @error('email') is-invalid @enderror border border-primary" name="email" value="{{ old('email') }}" required>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('bank.create.party_day') }}
            </label>

            <div class="col-md-7">
                <input type="date" class="form-control @error('party_day') is-invalid @enderror border border-primary" name="party_day" value="{{ old('party_day') }}" required>

                @error('party_day')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('bank.create.army_day') }}
            </label>

            <div class="col-md-7">
                <input type="date" class="form-control @error('army_day') is-invalid @enderror border border-primary" name="army_day" value="{{ old('army_day') }}" required>

                @error('army_day')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">
                {{ trans('bank.create.health') }}
            </label>

            <div class="col-md-7">
                <input type="text" class="form-control @error('health') is-invalid @enderror border border-primary" name="health" value="{{ old('health') }}" required>

                @error('health')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
