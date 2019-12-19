@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitComButton, #cancelComButton, #removeComHis, #addComButton {
        display: none;
    }
</style>
@endsection

@section('component')
<div class="card">
    <div class="card-header">
        @if(count($companys) > 0)
        <button id="editComButton" class="btn btn-primary"><i class="fas fa-edit"></i></button>
        @endif
        <button id="cancelComButton" class="btn btn-secondary"><i class="fas fa-times"></i></button>
        <button id="addNewComHis" class="btn btn-primary"><i class="fas fa-plus"></i></button>
        <button id="removeComHis" class="btn btn-primary"><i class="fas fa-minus"></i></button>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('edit-com') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            @foreach($companys as $company)
            <div class="row companyForm">
                <input type="hidden" name="id[]" value="{{ $company->id }}">
                <div class="col-3">
                    <div class="form-group">
                        <label>From</label>

                        <input type="date" class="form-control border border-primary" name="com_start_day[]" value="{{ $company->start_day }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>To</label>

                        <input type="date" class="form-control border border-primary" name="com_end_day[]" value="{{ $company->end_day }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Company Name</label>

                        <input type="text" class="form-control border border-primary" name="com_unit[]" value="{{ $company->unit }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Position</label>

                        <input type="text" class="form-control border border-primary" name="com_position[]" value="{{ $company->position }}" readonly required>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="row">
                <div class="col-auto mr-auto"></div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{ $company->id }}">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="del{{ $company->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        Delete this company work history?
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="/del-com-{{ $company->id }}" class="btn btn-danger">Delete</a>
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
                    <button type="submit" class="btn btn-primary" id="submitComButton">
                        Update
                    </button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('add-com') }}" id="companyHistoryForm">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div id="newComHis"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="addComButton">
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
$("#menuList").find(".nav-link:eq(3)").attr("class", "nav-link active");

// Company History add
$("#addNewComHis").click(function() {
    $("#newComHis").append(`@include('account.create.company')`);

    if ($("#companyHistoryForm").find(".companyForm").length > 0) {
        $("#editComButton").css("display", "none");
        $("#removeComHis").css("display", "inline");
        $("#addComButton").css("display", "inline");
    } else {
        $("#editComButton").css("display", "inline");
        $("#removeComHis").css("display", "none");
        $("#addComButton").css("display", "none");
    }
});

// Company History remove
$("#removeComHis").click(function() {
    $("form .companyForm").last().remove();

    if ($("#companyHistoryForm").find(".companyForm").length > 0) {
        $("#editComButton").css("display", "none");
        $(this).css("display", "inline");
        $("#addComButton").css("display", "inline");
    } else {
        $("#editComButton").css("display", "inline");
        $(this).css("display", "none");
        $("#addComButton").css("display", "none");
    }
});

$("#editComButton").click(function() {
    $("#addNewComHis").css("display", "none");
    $("form input").removeAttr("readonly");

    $("#submitComButton").css("display", "inline");
    $("#cancelComButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelComButton").click(function() {
    $("#addNewComHis").css("display", "inline");
    $("form input").attr("readonly", "");

    $("#submitComButton").css("display", "none");
    $("#editComButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection
