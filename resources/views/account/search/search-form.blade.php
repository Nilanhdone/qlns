<form method="GET" action="{{ route('search')}}" id="search">
    @csrf

    <div class="row">
        <div class="col-4">
            <!-- User ID -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.search.user-id') }}
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control border border-primary" name="user_id">
                </div>
            </div>

            <!-- Name -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.search.name') }}
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control border border-primary" name="name">
                </div>
            </div>

            <!-- Gender -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.search.gender') }}
                </label>

                <div class="col-md-8">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="both" value="both" checked>
                        <label class="form-check-label">
                            {{ trans('bank.search.both') }}
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                        <label class="form-check-label" for="male">
                            {{ trans('bank.search.male') }}
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">
                            {{ trans('bank.search.female') }}
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-8">
            <!-- Unit -->
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">
                    {{ trans('bank.search.work-unit') }}
                </label>

                <div class="col-md-8">
                    <select class="btn border-primary" name="unit" form="search">
                        <option value="">
                            {{ trans('bank.search.nochoose') }}
                        </option>
                        @foreach ($units as $unit)
                        <option value="{{ $unit->unit }}">
                            {{ trans('messages.branchs.'.$unit->branch) }} / {{ trans('messages.units.'.$unit->unit) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Position -->
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">
                    {{ trans('bank.search.position') }}
                </label>

                <div class="col-md-8">
                    <select class="btn border-primary" name="position" form="search">
                        <option value="">
                            {{ trans('bank.search.nochoose') }}
                        </option>
                        @foreach ($positions as $position)
                        <option value="{{ $position->position }}">
                            {{ trans('messages.positions.'.$position->position) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search mr-2"></i>{{ trans('bank.search.search') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
