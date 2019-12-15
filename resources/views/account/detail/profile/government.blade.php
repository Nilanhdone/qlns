@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitGovButton, #cancelGovButton, #removeGovHis {
        display: none;
    }
</style>
@endsection

@section('component')
<div class="card">
    <div class="card-header">
        @if(count($governments) > 0)
        <button id="editGovButton" class="btn btn-primary"><i class="fas fa-edit"></i></button>
        @endif
        <button id="cancelGovButton" class="btn btn-secondary"><i class="fas fa-times"></i></button>
        <button id="addNewGovHis" class="btn btn-primary"><i class="fas fa-plus"></i></button>
        <button id="removeGovHis" class="btn btn-primary"><i class="fas fa-minus"></i></button>
    </div>
    <div class="card-body">
        <form method="POST" action="#" id="governmentHistoryForm">
            @csrf
            <input type="hidden" value="{{ count($governments) }}" id="number">
            @foreach($governments as $government)
            <div class="row governmentForm">
                <div class="col-2">
                    <div class="form-group">
                        <label>From</label>

                        <input type="date" class="form-control @error('gov_start_day[]') is-invalid @enderror border border-primary" name="gov_start_day[]" value="{{ $government->start_day }}" readonly required>

                        @error('gov_start_day[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>To</label>

                        <input type="date" class="form-control @error('gov_end_day[]') is-invalid @enderror border border-primary" name="gov_end_day[]" value="{{ $government->end_day }}" readonly required>

                        @error('gov_end_day[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Government Name</label>

                        <input type="text" class="form-control @error('gov_unit[]') is-invalid @enderror border border-primary" name="gov_unit[]" value="{{ $government->unit }}" readonly required>

                        @error('gov_unit[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Position</label>

                        <input type="text" class="form-control @error('gov_position[]') is-invalid @enderror border border-primary" name="gov_position[]" value="{{ $government->position }}" readonly required>

                        @error('gov_position[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="w-100"></div>
            @endforeach

            <div id="newGovHis"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="submitGovButton">
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
$("#menuList").find(".nav-link:eq(4)").attr("class", "nav-link active");

$("#addNewGovHis").click(function() {
    $("#newGovHis").append(`@include('account.create.government')`);

    $("#governmentHistoryForm").find(".governmentForm").length > $("#number").val() ? $("#removeGovHis").css("display", "inline") : $("#removeGovHis").css("display", "none");
});

$("#removeGovHis").click(function() {
    $("form .governmentForm").last().remove();

    $("#governmentHistoryForm").find(".governmentForm").length > $("#number").val() ? $(this).css("display", "inline") : $(this).css("display", "none");
});

$("#editGovButton").click(function() {
    $("form input").removeAttr("readonly");

    $("#submitGovButton").css("display", "inline");
    $("#cancelGovButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelGovButton").click(function() {
    $("form input").attr("readonly", "");

    $("#submitGovButton").css("display", "none");
    $("#editGovButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection
