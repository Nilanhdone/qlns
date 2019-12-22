@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #genderCheck, #degreeList, #submitBasicButton, #cancelBasicButton , #matrimonyList {
        display: none;
    }
</style>
@endsection

@section('component')
<div class="card">
    <div class="card-header">
        <button id="editBasicButton" class="btn btn-primary"><i class="fas fa-edit"></i></button>
        <button id="cancelBasicButton" class="btn btn-secondary"><i class="fas fa-times"></i></button>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('edit-basic-info') }}" id="create">
            @csrf

            <!-- User ID -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.register.user-id') }}
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control border border-primary" name="user_id" value="{{ $user->user_id }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.create.recruitment') }}
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control border border-primary" name="recruitment_day" value="{{ $user->recruitment_day }}" readonly>
                </div>
            </div>

            <!-- Name -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.register.name') }}
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control @error('name') is-invalid @enderror border border-primary" id="name" name="name" value="{{ $user->name }}" required readonly>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Gender -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.register.gender') }}
                </label>

                <div class="col-md-8" id="gender">
                    <input class="form-control border border-primary" value="{{ trans('messages.register.'.$user->gender) }}" readonly>
                </div>

                <div class="col-md-8" id="genderCheck">
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
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.register.birthday') }}
                </label>

                <div class="col-md-8">
                    <input type="date" class="form-control @error('birthday') is-invalid @enderror border border-primary" id="birthday" name="birthday" value="{{ $user->birthday }}" required readonly>

                    @error('birthday')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Degree -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.register.degree') }}
                </label>

                <div class="col-md-8">
                    <input class="form-control border border-primary" value="{{ trans('messages.degree.'.$user->degree) }}" readonly id="degree">
                    <select class="btn border-primary" name="degree" form="create" id="degreeList">
                        <option value="bachelor">{{ trans('messages.degree.bachelor') }}</option>
                        <option value="engineer">{{ trans('messages.degree.engineer') }}</option>
                        <option value="master">{{ trans('messages.degree.master') }}</option>
                        <option value="post-doctor">{{ trans('messages.degree.post-doctor') }}</option>
                    </select>
                </div>
            </div>

            <!-- Nationality -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.register.nationality') }}
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control @error('nationality') is-invalid @enderror border border-primary" id="nationality" name="nationality" value="{{ $user->nationality }}" required readonly>

                    @error('nationality')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Religion -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.register.religion') }}
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control @error('religion') is-invalid @enderror border border-primary" id="religion" name="religion" value="{{ $user->religion }}" required readonly>

                    @error('religion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Hometown -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.register.hometown') }}
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control @error('hometown') is-invalid @enderror border border-primary" id="hometown" name="hometown" value="{{ $user->hometown }}" required readonly>

                    @error('hometown')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Address -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.register.address') }}
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control @error('address') is-invalid @enderror border border-primary" id="address" name="address" value="{{ $user->address }}" required readonly>

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Phone number -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.register.phone') }}
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control @error('phone') is-invalid @enderror border border-primary" id="phone" name="phone" value="{{ $user->phone }}" required readonly>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Email -->
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('messages.register.email') }}
                </label>

                <div class="col-md-8">
                    <input type="email" class="form-control border border-primary" name="email" value="{{ $user->email }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.create.identity') }}
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control @error('identity') is-invalid @enderror border border-primary" name="identity" value="{{ $user->identity }}" id="identity" required readonly>

                    @error('identity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.create.passport') }}
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control @error('passport') is-invalid @enderror border border-primary" name="passport" value="{{ $user->passport }}" id="passport" required readonly>

                    @error('passport')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.create.matrimony') }}
                </label>

                <div class="col-md-8" id="matrimony">
                    <input type="text" class="form-control border-primary" value="{{ trans('bank.create.'.$user->matrimony) }}" readonly>
                </div>

                <div class="col-md-8" id="matrimonyList">
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

            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.create.party_day') }}
                </label>

                <div class="col-md-8">
                    <input type="date" class="form-control @error('party_day') is-invalid @enderror border border-primary" name="party_day" value="{{ $user->party_day }}" id="partyDay" required readonly>

                    @error('party_day')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.create.army_day') }}
                </label>

                <div class="col-md-8">
                    <input type="date" class="form-control @error('army_day') is-invalid @enderror border border-primary" name="army_day" value="{{ $user->army_day }}" id="armyDay" required readonly>

                    @error('army_day')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">
                    {{ trans('bank.create.health') }}
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control @error('health') is-invalid @enderror border border-primary" name="health" value="{{ $user->health }}" id="health" required readonly>

                    @error('health')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8 offset-md-3">
                    <button type="submit" class="btn btn-primary" id="submitBasicButton">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
    $("#menuList").find(".nav-link:eq(0)").attr("class", "nav-link active");
    $("#editBasicButton").click(function() {
        $("#name").removeAttr("readonly");
        $("#birthday").removeAttr("readonly");
        $("#nationality").removeAttr("readonly");
        $("#religion").removeAttr("readonly");
        $("#hometown").removeAttr("readonly");
        $("#address").removeAttr("readonly");
        $("#phone").removeAttr("readonly");
        $("#identity").removeAttr("readonly");
        $("#passport").removeAttr("readonly");
        $("#partyDay").removeAttr("readonly");
        $("#armyDay").removeAttr("readonly");
        $("#health").removeAttr("readonly");

        $("#degree").css("display", "none");
        $("#degreeList").css("display", "inline");
        $("#gender").css("display", "none");
        $("#genderCheck").css("display", "inline");
        $("#matrimony").css("display", "none");
        $("#matrimonyList").css("display", "inline");

        $("#submitBasicButton").css("display", "inline");
        $("#cancelBasicButton").css("display", "inline");
        $(this).css("display", "none");
    });

    $("#cancelBasicButton").click(function() {
        $("#name").attr("readonly", '');
        $("#birthday").attr("readonly", '');
        $("#nationality").attr("readonly", '');
        $("#religion").attr("readonly", '');
        $("#hometown").attr("readonly", '');
        $("#address").attr("readonly", '');
        $("#phone").attr("readonly", '');
        $("#identity").attr("readonly", '');
        $("#passport").attr("readonly", '');
        $("#partyDay").attr("readonly", '');
        $("#armyDay").attr("readonly", '');
        $("#health").attr("readonly", '');

        $("#degree").css("display", "inline");
        $("#degreeList").css("display", "none");
        $("#gender").css("display", "inline");
        $("#genderCheck").css("display", "none");
        $("#matrimony").css("display", "inline");
        $("#matrimonyList").css("display", "none");

        $("#submitBasicButton").css("display", "none");
        $("#editBasicButton").css("display", "inline");
        $(this).css("display", "none");
    });
</script>
@endsection
