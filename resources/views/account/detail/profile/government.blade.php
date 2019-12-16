@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitGovButton, #cancelGovButton, #removeGovHis, #addGovButton {
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
        <form method="POST" action="{{ route('edit-gov') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            @foreach($governments as $government)
            <div class="row governmentForm">
                <input type="hidden" name="id" value="{{ $government->id }}">
                <div class="col-3">
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
                <div class="col-3">
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
                <div class="col-3">
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
                <div class="col-3">
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

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="submitGovButton">
                        Update
                    </button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('add-gov') }}" id="governmentHistoryForm">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div id="newGovHis"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="addGovButton">
                        Add new
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

    if ($("#governmentHistoryForm").find(".governmentForm").length > 0) {
        $("#editGovButton").css("display", "none");
        $("#removeGovHis").css("display", "inline");
        $("#addGovButton").css("display", "inline");
    } else {
        $("#editGovButton").css("display", "inline");
        $("#removeGovHis").css("display", "none");
        $("#addGovButton").css("display", "none");
    }
});

$("#removeGovHis").click(function() {
    $("form .governmentForm").last().remove();

    if ($("#governmentHistoryForm").find(".governmentForm").length > 0) {
        $("#editGovButton").css("display", "none");
        $(this).css("display", "inline");
        $("#addGovButton").css("display", "inline");
    } else {
        $("#editGovButton").css("display", "inline");
        $(this).css("display", "none");
        $("#addGovButton").css("display", "none");
    }
});

$("#editGovButton").click(function() {
    $("#addNewGovHis").css("display", "none");
    $(".governmentForm input").removeAttr("readonly");

    $("#submitGovButton").css("display", "inline");
    $("#cancelGovButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelGovButton").click(function() {
    $("#addNewGovHis").css("display", "inline");
    $("form input").attr("readonly", "");

    $("#submitGovButton").css("display", "none");
    $("#editGovButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection
