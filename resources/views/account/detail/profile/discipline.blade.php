@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitDisciplineButton, #cancelDisciplineButton, #removeDiscipline, #addDisciplineButton {
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
        <form method="POST" action="{{ route('edit-discipline') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            @foreach($disciplines as $discipline)
            <div class="row disciplineForm">
                <input type="hidden" name="id[]" value="{{ $discipline->id }}">
                <div class="col-4">
                    <div class="form-group">
                        <label>{{ trans('bank.discipline.discipline') }}</label>

                        <input type="text" class="form-control border border-primary" name="discipline[]" value="{{ $discipline->discipline }}" readonly required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>{{ trans('bank.discipline.year') }}</label>

                        <input type="text" class="form-control border border-primary" name="dis_year[]" value="{{ $discipline->year }}" readonly required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>{{ trans('bank.discipline.method') }}</label>

                        <input type="text" class="form-control border border-primary" name="dis_method[]" value="{{ $discipline->method }}" readonly required>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="row">
                <div class="col-auto mr-auto"></div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{ $discipline->id }}">
                        {{ trans('bank.modal.delete') }}
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="del{{ $discipline->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        {{ trans('bank.modal.dis') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        {{ trans('bank.modal.close') }}
                                    </button>
                                    <a href="/del-discipline-{{ $discipline->id }}" class="btn btn-danger">
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
                    <button type="submit" class="btn btn-primary" id="submitDisciplineButton">
                        {{ trans('bank.create.edit') }}
                    </button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('add-discipline') }}" id="disciplineHistoryForm">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div id="newDiscipline"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="addDisciplineButton">
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
$("#menuList").find(".nav-link:eq(10)").attr("class", "nav-link active");

$("#addNewDiscipline").click(function() {
    $("#newDiscipline").append(`@include('account.create.discipline')`);

    if ($("#disciplineHistoryForm").find(".disciplineForm").length > 0) {
        $("#editDisciplineButton").css("display", "none");
        $("#removeDiscipline").css("display", "inline");
        $("#addDisciplineButton").css("display", "inline");
    } else {
        $("#editDisciplineButton").css("display", "inline");
        $("#removeDiscipline").css("display", "none");
        $("#addDisciplineButton").css("display", "none");
    }
});

$("#removeDiscipline").click(function() {
    $("form .disciplineForm").last().remove();

    if ($("#disciplineHistoryForm").find(".disciplineForm").length > 0) {
        $("#editDisciplineButton").css("display", "none");
        $(this).css("display", "inline");
        $("#addDisciplineButton").css("display", "inline");
    } else {
        $("#editDisciplineButton").css("display", "inline");
        $(this).css("display", "none");
        $("#addDisciplineButton").css("display", "none");
    }
});

$("#editDisciplineButton").click(function() {
    $("#addNewDiscipline").css("display", "none");
    $("form input").removeAttr("readonly");

    $("#submitDisciplineButton").css("display", "inline");
    $("#cancelDisciplineButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelDisciplineButton").click(function() {
    $("#addNewDiscipline").css("display", "inline");
    $("form input").attr("readonly", "");

    $("#submitDisciplineButton").css("display", "none");
    $("#editDisciplineButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection
