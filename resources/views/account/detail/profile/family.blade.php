@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitFamilyButton, #cancelFamilyButton, #removeFamilyRela, #addFamilyButton {
        display: none;
    }
</style>
@endsection

@section('component')
<div class="card">
    <div class="card-header">
        @if(count($familys) > 0)
        <button id="editFamilyButton" class="btn btn-primary"><i class="fas fa-edit"></i></button>
        @endif
        <button id="cancelFamilyButton" class="btn btn-secondary"><i class="fas fa-times"></i></button>
        <button id="addNewFamilyRela" class="btn btn-primary"><i class="fas fa-plus"></i></button>
        <button id="removeFamilyRela" class="btn btn-primary"><i class="fas fa-minus"></i></button>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('edit-family') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            @foreach($familys as $family)
            <div class="row familyForm">
                <input type="hidden" name="id[]" value="{{ $family->id }}">
                <div class="col-4">
                    <div class="form-group">
                        <label>{{ trans('bank.family.name') }}</label>

                        <input type="text" class="form-control border border-primary" name="fa_name[]" value="{{ $family->name }}" readonly required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>{{ trans('bank.family.year') }}</label>

                        <input type="text" class="form-control border border-primary" name="fa_year[]" value="{{ $family->year }}" readonly required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>{{ trans('bank.family.relationship') }}</label>

                        <input type="text" class="form-control border border-primary" name="fa_rela[]" value="{{ $family->relationship }}" readonly required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>{{ trans('bank.family.address') }}</label>

                        <input type="text" class="form-control border border-primary" name="fa_address[]" value="{{ $family->address }}" readonly required>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="row">
                <div class="col-auto mr-auto"></div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{ $family->id }}">
                        {{ trans('bank.modal.delete') }}
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="del{{ $family->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        {{ trans('bank.modal.fami') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        {{ trans('bank.modal.close') }}
                                    </button>
                                    <a href="/del-family-{{ $family->id }}" class="btn btn-danger">
                                        {{ trans('bank.modal.delete') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            @endforeach

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="submitFamilyButton">
                        {{ trans('bank.create.edit') }}
                    </button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('add-family') }}" id="familyRelatoryForm">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div id="newFamilyRela"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="addFamilyButton">
                        {{ trans('bank.create.add') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
$("#menuList").find(".nav-link:eq(7)").attr("class", "nav-link active");

// family History add
$("#addNewFamilyRela").click(function() {
    $("#newFamilyRela").append(`@include('account.create.family')`);

    if ($("#familyRelatoryForm").find(".familyForm").length > 0) {
        $("#editFamilyButton").css("display", "none");
        $("#removeFamilyRela").css("display", "inline");
        $("#addFamilyButton").css("display", "inline");
    } else {
        $("#editFamilyButton").css("display", "inline");
        $("#removeFamilyRela").css("display", "none");
        $("#addFamilyButton").css("display", "none");
    }
});

// family History remove
$("#removeFamilyRela").click(function() {
    $("form .familyForm").last().remove();

    if ($("#familyRelatoryForm").find(".familyForm").length > 0) {
        $("#editFamilyButton").css("display", "none");
        $(this).css("display", "inline");
        $("#addFamilyButton").css("display", "inline");
    } else {
        $("#editFamilyButton").css("display", "inline");
        $(this).css("display", "none");
        $("#addFamilyButton").css("display", "none");
    }
});

$("#editFamilyButton").click(function() {
    $("#addNewFamilyRela").css("display", "none");
    $("form input").removeAttr("readonly");

    $("#submitFamilyButton").css("display", "inline");
    $("#cancelFamilyButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelFamilyButton").click(function() {
    $("#addNewFamilyRela").css("display", "inline");
    $("form input").attr("readonly", "");

    $("#submitFamilyButton").css("display", "none");
    $("#editFamilyButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection
