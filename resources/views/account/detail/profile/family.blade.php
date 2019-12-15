@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitFamilyButton, #cancelFamilyButton, #removeFamilyRela {
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
        <form method="POST" action="#" id="FamilyRelatoryForm">
            @csrf
            <input type="hidden" value="{{ count($familys) }}" id="number">
            @foreach($familys as $family)
            <div class="row familyForm">
                <div class="col-4">
                    <div class="form-group">
                        <label>Name</label>

                        <input type="text" class="form-control @error('fa_name[]') is-invalid @enderror border border-primary" name="fa_name[]" value="{{ $family->name }}" readonly required>

                        @error('fa_name[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Year of birth</label>

                        <input type="text" class="form-control @error('fa_year[]') is-invalid @enderror border border-primary" name="fa_year[]" value="{{ $family->year }}" readonly required>

                        @error('fa_year[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Relationship</label>

                        <input type="text" class="form-control @error('fa_rela[]') is-invalid @enderror border border-primary" name="fa_rela[]" value="{{ $family->relationship }}" readonly required>

                        @error('fa_rela[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Address</label>

                        <input type="text" class="form-control @error('fa_address[]') is-invalid @enderror border border-primary" name="fa_address[]" value="{{ $family->address }}" readonly required>

                        @error('fa_address[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="w-100"></div>
            @endforeach

            <div id="newFamilyRela"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="submitFamilyButton">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
$("#menuList").find(".nav-link:eq(6)").attr("class", "nav-link active");

// family History add
$("#addNewFamilyRela").click(function() {
    $("#newFamilyRela").append(`@include('account.create.family')`);

    $("#FamilyRelatoryForm").find(".familyForm").length > $("#number").val() ? $("#removeFamilyRela").css("display", "inline") : $("#removeFamilyRela").css("display", "none");
});

// family History remove
$("#removeFamilyRela").click(function() {
    $("form .familyForm").last().remove();

    $("#FamilyRelatoryForm").find(".familyForm").length > $("#number").val() ? $(this).css("display", "inline") : $(this).css("display", "none");
});

$("#editFamilyButton").click(function() {
    $("form input").removeAttr("readonly");

    $("#submitFamilyButton").css("display", "inline");
    $("#cancelFamilyButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelFamilyButton").click(function() {
    $("form input").attr("readonly", "");

    $("#submitFamilyButton").css("display", "none");
    $("#editFamilyButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection
