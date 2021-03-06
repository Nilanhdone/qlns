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
                <input type="hidden" name="id[]" value="{{ $government->id }}">
                <div class="col-3">
                    <div class="form-group">
                        <label>{{ trans('bank.government.from') }}</label>

                        <input type="date" class="form-control border border-primary" name="gov_start_day[]" value="{{ $government->start_day }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>{{ trans('bank.government.to') }}</label>

                        <input type="date" class="form-control border border-primary" name="gov_end_day[]" value="{{ $government->end_day }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>{{ trans('bank.government.unit') }}</label>

                        <input type="text" class="form-control border border-primary" name="gov_unit[]" value="{{ $government->unit }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>{{ trans('bank.government.position') }}</label>

                        <input type="text" class="form-control border border-primary" name="gov_position[]" value="{{ $government->position }}" readonly required>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="row">
                <div class="col-auto mr-auto"></div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{ $government->id }}">
                        {{ trans('bank.modal.delete') }}
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="del{{ $government->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        {{ trans('bank.modal.gov') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        {{ trans('bank.modal.close') }}
                                    </button>
                                    <a href="/del-gov-{{ $government->id }}" class="btn btn-danger">
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
                    <button type="submit" class="btn btn-primary" id="submitGovButton">
                        {{ trans('bank.create.edit') }}
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
$("#menuList").find(".nav-link:eq(5)").attr("class", "nav-link active");

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
