@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitEduButton, #cancelEduButton, #removeEduHis, #addEduButton {
        display: none;
    }
</style>
@endsection

@section('component')
<div class="card">
    <div class="card-header">
        <button id="editEduButton" class="btn btn-primary"><i class="fas fa-edit"></i></button>
        <button id="cancelEduButton" class="btn btn-secondary"><i class="fas fa-times"></i></button>
        <button id="addNewEduHis" class="btn btn-primary"><i class="fas fa-plus"></i></button>
        <button id="removeEduHis" class="btn btn-primary"><i class="fas fa-minus"></i></button>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('edit-edu') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            @foreach($educations as $education)
            <div class="row eduForm">
                <input type="hidden" name="id[]" value="{{ $education->id }}">
                <div class="col-3">
                    <div class="form-group">
                        <label>{{ trans('bank.education.from') }}</label>

                        <input type="month" class="form-control border border-primary" name="edu_start_day[]" value="{{ $education->start_day }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>{{ trans('bank.education.to') }}</label>

                        <input type="month" class="form-control border border-primary" name="edu_end_day[]" value="{{ $education->end_day }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>{{ trans('bank.education.level') }}</label>

                        <input type="text" class="form-control border border-primary" name="edu_level[]" value="{{ $education->level }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>{{ trans('bank.education.address') }}</label>

                        <input type="text" class="form-control border border-primary" name="edu_address[]" value="{{ $education->address }}" readonly required>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="row">
                <div class="col-auto mr-auto"></div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{ $education->id }}">
                        {{ trans('bank.modal.delete') }}
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="del{{ $education->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        {{ trans('bank.modal.edu') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        {{ trans('bank.modal.close') }}
                                    </button>
                                    <a href="/del-edu-{{ $education->id }}" class="btn btn-danger">
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
                <div class="col-md-8 offset-md-3">
                    <button type="submit" class="btn btn-primary" id="submitEduButton">
                        {{ trans('bank.create.edit') }}
                    </button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('add-edu') }}" id="educationHistoryForm">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div id="newEduHis"></div>

            <div class="form-group row">
                <div class="col-md-8 offset-md-3">
                    <button type="submit" class="btn btn-primary" id="addEduButton">
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
    $("#menuList").find(".nav-link:eq(2)").attr("class", "nav-link active");

    $("#editEduButton").click(function() {
        $("#addNewEduHis").css("display", "none");
        $("form input").removeAttr("readonly");

        $("#submitEduButton").css("display", "inline");
        $("#cancelEduButton").css("display", "inline");
        $(this).css("display", "none");
    });

    $("#cancelEduButton").click(function() {
        $("#addNewEduHis").css("display", "inline");
        $("form input").attr("readonly", "");

        $("#submitEduButton").css("display", "none");
        $("#editEduButton").css("display", "inline");
        $(this).css("display", "none");
    });

    $("#addNewEduHis").click(function() {
        $("#newEduHis").append(`@include('account.create.education')`);

        if ($("#educationHistoryForm").find(".eduForm").length > 0) {
            $("#editEduButton").css("display", "none");
            $("#removeEduHis").css("display", "inline");
            $("#addEduButton").css("display", "inline");
        } else {
            $("#editEduButton").css("display", "inline");
            $("#removeEduHis").css("display", "none");
            $("#addEduButton").css("display", "none");
        }
    });

    // Education History remove
    $("#removeEduHis").click(function() {
        $("#educationHistoryForm .eduForm").last().remove();

        if ($("#educationHistoryForm").find(".eduForm").length > 0) {
            $("#editEduButton").css("display", "none");
            $(this).css("display", "inline");
            $("#addEduButton").css("display", "inline");
        } else {
            $("#editEduButton").css("display", "inline");
            $(this).css("display", "none");
            $("#addEduButton").css("display", "none");
        }
    });
</script>
@endsection
