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
            <input type="hidden" value="{{ count($educations) }}" id="number">
            @foreach($educations as $education)
            <div class="row eduForm">
                <input type="hidden" name="id[]" value="{{ $education->id }}">
                <div class="col-3">
                    <div class="form-group">
                        <label>From</label>

                        <input type="date" class="form-control @error('edu_start_day[]') is-invalid @enderror border border-primary" name="edu_start_day[]" value="{{ $education->start_day }}" readonly required>

                        @error('edu_start_day[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>To</label>

                        <input type="date" class="form-control @error('edu_end_day[]') is-invalid @enderror border border-primary" name="edu_end_day[]" value="{{ $education->end_day }}" readonly required>

                        @error('edu_end_day[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Education unit</label>

                        <input type="text" class="form-control @error('edu_unit[]') is-invalid @enderror border border-primary" name="edu_unit[]" value="{{ $education->unit }}" readonly required>

                        @error('edu_unit[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Address</label>

                        <input type="text" class="form-control @error('edu_address[]') is-invalid @enderror border border-primary" name="edu_address[]" value="{{ $education->address }}" readonly required>

                        @error('edu_address[]')
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
                <div class="col-md-8 offset-md-3">
                    <button type="submit" class="btn btn-primary" id="submitEduButton">Edit</button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('add-edu') }}" id="educationHistoryForm">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div id="newEduHis"></div>

            <div class="form-group row">
                <div class="col-md-8 offset-md-3">
                    <button type="submit" class="btn btn-primary" id="addEduButton">Add new</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
    $("#menuList").find(".nav-link:eq(1)").attr("class", "nav-link active");

    $("#editEduButton").click(function() {
        $("#addNewEduHis").css("display", "none");
        $("#eduForm input").removeAttr("readonly");

        $("#submitEduButton").css("display", "inline");
        $("#cancelEduButton").css("display", "inline");
        $(this).css("display", "none");
    });

    $("#cancelEduButton").click(function() {
        $("#addNewEduHis").css("display", "inline");
        $("#eduForm input").attr("readonly", "");

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
