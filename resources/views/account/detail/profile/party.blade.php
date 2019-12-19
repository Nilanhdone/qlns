@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitPartyButton, #cancelPartyButton, #removePartyHis, #addPartyButton {
        display: none;
    }
</style>
@endsection

@section('component')
<div class="card">
    <div class="card-header">
        @if(count($partys) > 0)
        <button id="editPartyButton" class="btn btn-primary"><i class="fas fa-edit"></i></button>
        @endif
        <button id="cancelPartyButton" class="btn btn-secondary"><i class="fas fa-times"></i></button>
        <button id="addNewPartyHis" class="btn btn-primary"><i class="fas fa-plus"></i></button>
        <button id="removePartyHis" class="btn btn-primary"><i class="fas fa-minus"></i></button>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('edit-party') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            @foreach($partys as $party)
            <div class="row partyForm">
                <input type="hidden" name="id[]" value="{{ $party->id }}">
                <div class="col-3">
                    <div class="form-group">
                        <label>Join day</label>

                        <input type="date" class="form-control border border-primary" name="join_day[]" value="{{ $party->join_day }}" readonly required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Party unit</label>

                        <input type="text" class="form-control border border-primary" name="party_unit[]" value="{{ $party->unit }}" readonly required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Party position</label>

                        <input type="text" class="form-control border border-primary" name="party_position[]" value="{{ $party->position }}" readonly required>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="row">
                <div class="col-auto mr-auto"></div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{ $party->id }}">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="del{{ $party->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        Delete this join party history?
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="/del-party-{{ $party->id }}" class="btn btn-danger">Delete</a>
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
                    <button type="submit" class="btn btn-primary" id="submitPartyButton">
                        Update
                    </button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('add-party') }}" id="partyHistoryForm">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div id="newPartyHis"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="addPartyButton">
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
$("#menuList").find(".nav-link:eq(5)").attr("class", "nav-link active");

// party History add
$("#addNewPartyHis").click(function() {
    $("#newPartyHis").append(`@include('account.create.party')`);

    if ($("#partyHistoryForm").find(".partyForm").length > 0) {
        $("#editPartyButton").css("display", "none");
        $("#removePartyHis").css("display", "inline");
        $("#addPartyButton").css("display", "inline");
    } else {
        $("#editPartyButton").css("display", "inline");
        $("#removePartyHis").css("display", "none");
        $("#addPartyButton").css("display", "none");
    }
});

// party History remove
$("#removePartyHis").click(function() {
    $("form .partyForm").last().remove();

    if ($("#partyHistoryForm").find(".partyForm").length > 0) {
        $("#editPartyButton").css("display", "none");
        $(this).css("display", "inline");
        $("#addPartyButton").css("display", "inline");
    } else {
        $("#editPartyButton").css("display", "inline");
        $(this).css("display", "none");
        $("#addPartyButton").css("display", "none");
    }
});

$("#editPartyButton").click(function() {
    $("#addNewPartyHis").css("display", "none");
    $("form input").removeAttr("readonly");

    $("#submitPartyButton").css("display", "inline");
    $("#cancelPartyButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelPartyButton").click(function() {
    $("#addNewPartyHis").css("display", "inline");
    $("form input").attr("readonly", "");

    $("#submitPartyButton").css("display", "none");
    $("#editPartyButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection

