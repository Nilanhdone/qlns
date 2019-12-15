@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitDisciplineButton, #cancelDisciplineButton, #removeDiscipline {
        display: none;
    }
</style>
@endsection

@section('component')
<div class="card">
    <div class="card-header">
        @if(count($disciplines) > 0)
        <button id="editDisciplineButton" class="btn btn-primary"><i class="fas fa-edit"></i></button>
        @endif
        <button id="cancelDisciplineButton" class="btn btn-secondary"><i class="fas fa-times"></i></button>
        <button id="addNewDiscipline" class="btn btn-primary"><i class="fas fa-plus"></i></button>
        <button id="removeDiscipline" class="btn btn-primary"><i class="fas fa-minus"></i></button>
    </div>
    <div class="card-body">
        <form method="POST" action="#" id="disciplineHistoryForm">
            @csrf
            <input type="hidden" value="{{ count($disciplines) }}" id="number">
            @foreach($disciplines as $discipline)
            <div class="row disciplineForm">
                <div class="col-4">
                    <div class="form-group">
                        <label>Infringe</label>

                        <input type="text" class="form-control @error('infringe[]') is-invalid @enderror border border-primary" name="infringe[]" value="{{ $discipline->infringe }}" required>

                        @error('infringe[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Year</label>

                        <input type="text" class="form-control @error('inf_year[]') is-invalid @enderror border border-primary" name="inf_year[]" value="{{ $discipline->year }}" required>

                        @error('inf_year[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Organization</label>

                        <input type="text" class="form-control @error('inf_organization[]') is-invalid @enderror border border-primary" name="inf_organization[]" value="{{ $discipline->organization }}" required>

                        @error('inf_organization[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Discipline method</label>

                        <input type="text" class="form-control @error('inf_method[]') is-invalid @enderror border border-primary" name="inf_method[]" value="{{ $discipline->method }}" required>

                        @error('inf_method[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="w-100"></div>
            @endforeach

            <div id="newDiscipline"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="submitDisciplineButton">
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
$("#menuList").find(".nav-link:eq(9)").attr("class", "nav-link active");

$("#addNewDiscipline").click(function() {
    $("#newDiscipline").append(`@include('account.create.discipline')`);

    $("#disciplineHistoryForm").find(".disciplineForm").length > $("#number").val() ? $("#removeDiscipline").css("display", "inline") : $("#removeDiscipline").css("display", "none");
});

$("#removeDiscipline").click(function() {
    $("form .disciplineForm").last().remove();

    $("#disciplineHistoryForm").find(".disciplineForm").length > $("#number").val() ? $(this).css("display", "inline") : $(this).css("display", "none");
});

$("#editDisciplineButton").click(function() {
    $("form input").removeAttr("readonly");

    $("#submitDisciplineButton").css("display", "inline");
    $("#cancelDisciplineButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelDisciplineButton").click(function() {
    $("form input").attr("readonly", "");

    $("#submitDisciplineButton").css("display", "none");
    $("#editDisciplineButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection
