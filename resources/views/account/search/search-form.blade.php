<form method="GET" action="{{ route('search')}}" id="search">
    @csrf

    <div class="row">
        <div class="col-3">
            <!-- User ID -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.search.user-id') }}
                </label>

                <div class="col-md-9">
                    <input type="text" class="form-control border border-primary" name="user_id">
                </div>
            </div>

            <!-- Name -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.search.name') }}
                </label>

                <div class="col-md-9">
                    <input type="text" class="form-control border border-primary" name="name">
                </div>
            </div>

            <!-- Gender -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.search.gender') }}
                </label>

                <div class="col-md-9">
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

            <!-- Age -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.search.age') }}
                </label>

                <div class="col-md-3">
                    <input type="number" class="form-control border border-primary" name="agefrom">
                </div>
                <label class="col-md-3 col-form-label text-center">
                    {{ trans('bank.search.to') }}
                </label>
                <div class="col-md-3">
                    <input type="number" class="form-control border border-primary" name="ageto">
                </div>
            </div>
        </div>

        <div class="col-9">
            <!-- Unit -->
            <div class="form-group row">
                <label class="col-md-5 col-form-label text-md-right">
                    {{ trans('bank.search.work-unit') }}
                </label>

                <div class="col-md-7">
                    <select class="btn border-primary" name="unit" form="search">
                        <option value="">
                            {{ trans('bank.search.nochoose') }}
                        </option>
                        @foreach ($units as $unit)
                        <option value="{{ $unit->unit }}">
                            {{ trans('messages.branchs.'.$unit->branch) }}/{{ trans('messages.units.'.$unit->unit) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Position -->
            <div class="form-group row">
                <label class="col-md-5 col-form-label text-md-right">
                    {{ trans('bank.search.position') }}
                </label>

                <div class="col-md-7">
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

            <!-- Degree -->
            <div class="form-group row">
                <label class="col-md-5 col-form-label text-md-right">
                    {{ trans('messages.register.degree') }}
                </label>

                <div class="col-md-7">
                    <select class="btn border-primary" name="degree" form="search">
                        <option value="">
                            {{ trans('bank.search.nochoose') }}
                        </option>
                        <option value="bachelor">{{ trans('messages.degree.bachelor') }}</option>
                        <option value="engineer">{{ trans('messages.degree.engineer') }}</option>
                        <option value="master">{{ trans('messages.degree.master') }}</option>
                        <option value="post-doctor">{{ trans('messages.degree.post-doctor') }}</option>
                    </select>
                </div>
            </div>

            <!-- All staff in any year -->
            <div class="form-group row">
                <label class="col-md-5 col-form-label text-md-right">
                    {{ trans('bank.search.staffs') }}
                </label>

                <div class="col-md-2">
                    <input type="number" class="form-control border border-primary" name="staffs" id="staffs">
                </div>
            </div>

            <!-- All new staff in any year -->
            <div class="form-group row">
                <label class="col-md-5 col-form-label text-md-right">
                    {{ trans('bank.search.new-staffs') }}
                </label>

                <div class="col-md-2">
                    <input type="number" class="form-control border border-primary" name="new_staffs" id="newStaffs">
                </div>
            </div>

            <!-- All staff will retire in any year -->
            <div class="form-group row">
                <label class="col-md-5 col-form-label text-md-right">
                    {{ trans('bank.search.retire-staffs') }}
                </label>

                <div class="col-md-2">
                    <input type="number" class="form-control border border-primary" name="retire_staffs" id="retireStaffs">
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

@section('custom_js')
<script type="text/javascript">
    $("#staffs").keyup(function() {
        if ($(this).val().length > 0 ) {
            $("#newStaffs").attr("readonly", '');
            $("#retireStaffs").attr("readonly", '');
        } else {
            $("#newStaffs").removeAttr("readonly");
            $("#retireStaffs").removeAttr("readonly");
        }
    })
    $("#newStaffs").keyup(function() {
        if ($(this).val().length > 0 ) {
            $("#staffs").attr("readonly", '');
            $("#retireStaffs").attr("readonly", '');
        } else {
            $("#staffs").removeAttr("readonly");
            $("#retireStaffs").removeAttr("readonly");
        }
    })
    $("#retireStaffs").keyup(function() {
        if ($(this).val().length > 0 ) {
            $("#staffs").attr("readonly", '');
            $("#newStaffs").attr("readonly", '');
        } else {
            $("#staffs").removeAttr("readonly");
            $("#newStaffs").removeAttr("readonly");
        }
    })
</script>
@endsection
