@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitTrainButton, #cancelTrainButton, #removeTrainHis {
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
        <form method="POST" action="#" id="trainingHistoryForm">
            @csrf
            <input type="hidden" value="{{ count($trainings) }}" id="number">
            @foreach($trainings as $training)
            <div class="row trainingForm">
                <div class="col-2">
                    <div class="form-group">
                        <label>From</label>

                        <input type="date" class="form-control @error('train_start_day[]') is-invalid @enderror border border-primary" name="train_start_day[]" value="{{ $training->start_day }}" readonly required>

                        @error('train_start_day[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>To</label>

                        <input type="date" class="form-control @error('train_end_day[]') is-invalid @enderror border border-primary" name="train_end_day[]" value="{{ $training->end_day }}" readonly required>

                        @error('train_end_day[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Training Unit</label>

                        <input type="text" class="form-control @error('train_unit[]') is-invalid @enderror border border-primary" name="train_unit[]" value="{{ $training-unit }}" readonly required>

                        @error('train_unit[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Address</label>

                        <input type="text" class="form-control @error('train_address[]') is-invalid @enderror border border-primary" name="train_address[]" value="{{ $training-address }}" readonly required>

                        @error('train_address[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="row trainingForm">
                <div class="col-12">
                    <div class="form-group">
                        <label>Training Content</label>

                        <input type="text" class="form-control @error('train_content[]') is-invalid @enderror border border-primary" name="train_content[]" value="{{ old('train_content[]') }}" required>

                        @error('train_content[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="w-100"></div>
            @endforeach

            <div id="newTrainHis"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="submitTrainButton">
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
    $("#menuList").find(".nav-link:eq(2)").attr("class", "nav-link active");

    // Training History add
    $("#addNewTrainHis").click(function() {
        $("#newTrainHis").append(`@include('account.create.training')`);

        $("#trainingHistoryForm").find(".trainingForm").length > $("#number").val() ? $("#removeTrainHis").css("display", "inline") : $("#removeTrainHis").css("display", "none");
    });

    // Training History remove
    $("#removeTrainHis").click(function() {
        $("form .trainingForm").last().remove();
        $("form .trainingForm").last().remove();

        $("#trainingHistoryForm").find(".trainingForm").length > $("#number").val() ? $(this).css("display", "inline") : $(this).css("display", "none");
    });
</script>
@endsection
