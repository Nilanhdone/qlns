@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitPartyButton, #cancelPartyButton, #removePartyHis {
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
        <form method="POST" action="#" id="partyHistoryForm">
            @csrf
            <input type="hidden" value="{{ count($partys) }}" id="number">
            @foreach($partys as $party)
            <div class="row partyForm">
                <div class="col-3">
                    <div class="form-group">
                        <label>Join day</label>

                        <input type="date" class="form-control @error('join_day[]') is-invalid @enderror border border-primary" name="join_day[]" value="{{ $party->join_day }}" readonly required>

                        @error('join_day[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Party unit</label>

                        <input type="text" class="form-control @error('party_unit[]') is-invalid @enderror border border-primary" name="party_unit[]" value="{{ $party->unit }}" readonly required>

                        @error('party_unit[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Party position</label>

                        <input type="text" class="form-control @error('party_position[]') is-invalid @enderror border border-primary" name="party_position[]" value="{{ $party->position }}" required>

                        @error('party_position[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="w-100"></div>
            @endforeach

            <div id="newPartyHis"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="submitPartyButton">
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
$("#menuList").find(".nav-link:eq(5)").attr("class", "nav-link active");

// party History add
$("#addNewPartyHis").click(function() {
    $("#newPartyHis").append(`@include('account.create.party')`);

    $("#partyHistoryForm").find(".partyForm").length > $("#number").val() ? $("#removePartyHis").css("display", "inline") : $("#removePartyHis").css("display", "none");
});

// party History remove
$("#removePartyHis").click(function() {
    $("form .partyForm").last().remove();

    $("#partyHistoryForm").find(".partyForm").length > $("#number").val() ? $(this).css("display", "inline") : $(this).css("display", "none");
});

$("#editPartyButton").click(function() {
    $("form input").removeAttr("readonly");

    $("#submitPartyButton").css("display", "inline");
    $("#cancelPartyButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelPartyButton").click(function() {
    $("form input").attr("readonly", "");

    $("#submitPartyButton").css("display", "none");
    $("#editPartyButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection

