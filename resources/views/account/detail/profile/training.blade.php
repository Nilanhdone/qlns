@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitTrainButton, #cancelTrainButton, #removeTrainHis, #addTrainButton {
        display: none;
    }
</style>
@endsection

@section('component')
<div class="card">
    <div class="card-header">
        @if(count($trainings) > 0)
        <button id="editTrainButton" class="btn btn-primary"><i class="fas fa-edit"></i></button>
        @endif
        <button id="cancelTrainButton" class="btn btn-secondary"><i class="fas fa-times"></i></button>
        <button id="addNewTrainHis" class="btn btn-primary"><i class="fas fa-plus"></i></button>
        <button id="removeTrainHis" class="btn btn-primary"><i class="fas fa-minus"></i></button>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('edit-train') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            @foreach($trainings as $training)
            <div class="row trainingForm">
                <input type="hidden" name="id[]" value="{{ $training->id }}">
                <div class="col-3">
                    <div class="form-group">
                        <label>From</label>

                        <input type="date" class="form-control border border-primary" name="train_start_day[]" value="{{ $training->start_day }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>To</label>

                        <input type="date" class="form-control border border-primary" name="train_end_day[]" value="{{ $training->end_day }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Training Unit</label>

                        <input type="text" class="form-control border border-primary" name="train_unit[]" value="{{ $training->unit }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Address</label>

                        <input type="text" class="form-control border border-primary" name="train_address[]" value="{{ $training->address }}" readonly required>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="row trainingForm">
                <div class="col-12">
                    <div class="form-group">
                        <label>Training Content</label>

                        <input type="text" class="form-control border border-primary" name="train_content[]" value="{{ $training->content }}" readonly required>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="row">
                <div class="col-auto mr-auto"></div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{ $training->id }}">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="del{{ $training->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        Delete this training history?
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="/del-train-{{ $training->id }}" class="btn btn-danger">Delete</a>
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
                    <button type="submit" class="btn btn-primary" id="submitTrainButton">
                        Update
                    </button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('add-train') }}" id="trainingHistoryForm">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div id="newTrainHis"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="addTrainButton">
                        Add new
                    </button>
                </div>
            </div>
        <form>
    </div>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
    $("#menuList").find(".nav-link:eq(2)").attr("class", "nav-link active");

    $("#editTrainButton").click(function() {
        $("#addNewTrainHis").css("display", "none");
        $(".trainingForm input").removeAttr("readonly");

        $("#submitTrainButton").css("display", "inline");
        $("#cancelTrainButton").css("display", "inline");
        $(this).css("display", "none");
    });

    $("#cancelTrainButton").click(function() {
        $("#addNewTrainHis").css("display", "inline");
        $(".trainingForm input").attr("readonly", "");

        $("#submitTrainButton").css("display", "none");
        $("#editTrainButton").css("display", "inline");
        $(this).css("display", "none");
    });

    // Training History add
    $("#addNewTrainHis").click(function() {
        $("#newTrainHis").append(`@include('account.create.training')`);

        if ($("#trainingHistoryForm").find(".trainingForm").length > 0) {
            $("#editTrainButton").css("display", "none");
            $("#removeTrainHis").css("display", "inline");
            $("#addTrainButton").css("display", "inline");
        } else {
            $("#editTrainButton").css("display", "inline");
            $("#removeTrainHis").css("display", "none");
            $("#addTrainButton").css("display", "none");
        }
    });

    // Training History remove
    $("#removeTrainHis").click(function() {
        $("form .trainingForm").last().remove();
        $("form .trainingForm").last().remove();

        if ($("#trainingHistoryForm").find(".trainingForm").length > 0) {
            $("#editTrainButton").css("display", "none");
            $(this).css("display", "inline");
            $("#addTrainButton").css("display", "inline");
        } else {
            $("#editTrainButton").css("display", "inline");
            $(this).css("display", "none");
            $("#addTrainButton").css("display", "none");
        }
    });
</script>
@endsection
