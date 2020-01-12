@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitForeignerButton, #cancelForeignerButton, #removeForeignerRela, #addForeignerButton {
        display: none;
    }
</style>
@endsection

@section('component')
<div class="card">
    <div class="card-header">
        @if(count($foreigners) > 0)
        <button id="editForeignerButton" class="btn btn-primary"><i class="fas fa-edit"></i></button>
        @endif
        <button id="cancelForeignerButton" class="btn btn-secondary"><i class="fas fa-times"></i></button>
        <button id="addNewForeignerRela" class="btn btn-primary"><i class="fas fa-plus"></i></button>
        <button id="removeForeignerRela" class="btn btn-primary"><i class="fas fa-minus"></i></button>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('edit-foreigner') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            @foreach($foreigners as $foreigner)
            <div class="row foreignerForm">
                <input type="hidden" name="id[]" value="{{ $foreigner->id }}">
                <div class="col-3">
                    <div class="form-group">
                        <label>{{ trans('bank.foreigner.name') }}</label>

                        <input type="text" class="form-control border border-primary" name="fore_name[]" value="{{ $foreigner->name }}" readonly required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>{{ trans('bank.foreigner.year') }}</label>

                        <input type="text" class="form-control border border-primary" name="fore_year[]" value="{{ $foreigner->year }}" readonly required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>{{ trans('bank.foreigner.relationship') }}</label>

                        <input type="text" class="form-control border border-primary" name="fore_rela[]" value="{{ $foreigner->relationship }}" readonly required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>{{ trans('bank.foreigner.nationality') }}</label>

                        <input type="text" class="form-control border border-primary" name="fore_nation[]" value="{{ $foreigner->nationality }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>{{ trans('bank.foreigner.time') }}</label>

                        <input type="text" class="form-control border border-primary" name="fore_time[]" value="{{ $foreigner->time }}" readonly required>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="row">
                <div class="col-auto mr-auto"></div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{ $foreigner->id }}">
                        {{ trans('bank.modal.delete') }}
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="del{{ $foreigner->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        {{ trans('bank.modal.fore') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        {{ trans('bank.modal.close') }}
                                    </button>
                                    <a href="/del-foreigner-{{ $foreigner->id }}" class="btn btn-danger">
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
                    <button type="submit" class="btn btn-primary" id="submitForeignerButton">
                        {{ trans('bank.create.edit') }}
                    </button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('add-foreigner') }}" id="foreignerRelatoryForm">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div id="newForeignerRela"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="addForeignerButton">
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
$("#menuList").find(".nav-link:eq(8)").attr("class", "nav-link active");

// foreigner History add
$("#addNewForeignerRela").click(function() {
    $("#newForeignerRela").append(`@include('account.create.foreigner')`);

    if ($("#foreignerRelatoryForm").find(".foreignerForm").length > 0) {
        $("#editForeignerButton").css("display", "none");
        $("#removeForeignerRela").css("display", "inline");
        $("#addForeignerButton").css("display", "inline");
    } else {
        $("#editForeignerButton").css("display", "inline");
        $("#removeForeignerRela").css("display", "none");
        $("#addForeignerButton").css("display", "none");
    }
});

// foreigner History remove
$("#removeForeignerRela").click(function() {
    $("form .foreignerForm").last().remove();

    if ($("#foreignerRelatoryForm").find(".foreignerForm").length > 0) {
        $("#editForeignerButton").css("display", "none");
        $(this).css("display", "inline");
        $("#addForeignerButton").css("display", "inline");
    } else {
        $("#editForeignerButton").css("display", "inline");
        $(this).css("display", "none");
        $("#addForeignerButton").css("display", "none");
    }
});

$("#editForeignerButton").click(function() {
    $("#addNewForeignerRela").css("display", "none");
    $("form input").removeAttr("readonly");

    $("#submitForeignerButton").css("display", "inline");
    $("#cancelForeignerButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelForeignerButton").click(function() {
    $("#addNewForeignerRela").css("display", "inline");
    $("form input").attr("readonly", "");

    $("#submitForeignerButton").css("display", "none");
    $("#editForeignerButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection
