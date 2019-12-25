@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitLaudatoryButton, #cancelLaudatoryButton, #removeLaudatory, #addLaudatoryButton {
        display: none;
    }
</style>
@endsection

@section('component')
<div class="card">
    <div class="card-header">
        @if(count($laudatorys) > 0)
        <button id="editLaudatoryButton" class="btn btn-primary"><i class="fas fa-edit"></i></button>
        @endif
        <button id="cancelLaudatoryButton" class="btn btn-secondary"><i class="fas fa-times"></i></button>
        <button id="addNewLaudatory" class="btn btn-primary"><i class="fas fa-plus"></i></button>
        <button id="removeLaudatory" class="btn btn-primary"><i class="fas fa-minus"></i></button>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('edit-laudatory') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id}}">
            @foreach($laudatorys as $laudatory)
            <div class="row laudatoryForm">
                <input type="hidden" name="id[]" value="{{ $laudatory->id }}">
                <div class="col-4">
                    <div class="form-group">
                        <label>{{ trans('bank.laudatory.title') }}</label>

                        <input type="text" class="form-control border border-primary" name="title[]" value="{{ $laudatory->title }}" readonly required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>{{ trans('bank.laudatory.year') }}</label>

                        <input type="text" class="form-control border border-primary" name="lau_year[]" value="{{ $laudatory->year }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>{{ trans('bank.laudatory.method') }}</label>

                        <input type="text" class="form-control border border-primary" name="lau_method[]" value="{{ $laudatory->method }}" readonly required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>{{ trans('bank.laudatory.number') }}</label>

                        <input type="text" class="form-control border border-primary" name="lau_number[]" value="{{ $laudatory->number }}" readonly required>
                    </div>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="row">
                <div class="col-auto mr-auto"></div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{ $laudatory->id }}">
                        {{ trans('bank.modal.delete') }}
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="del{{ $laudatory->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        {{ trans('bank.modal.lau') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        {{ trans('bank.modal.close') }}
                                    </button>
                                    <a href="/del-laudatory-{{ $laudatory->id }}" class="btn btn-danger">
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
                    <button type="submit" class="btn btn-primary" id="submitLaudatoryButton">
                        {{ trans('bank.create.edit') }}
                    </button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('add-laudatory') }}" id="laudatorytoryForm">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id}}">
            <div id="newLaudatory"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="addLaudatoryButton">
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
$("#menuList").find(".nav-link:eq(9)").attr("class", "nav-link active");

// laudatory History add
$("#addNewLaudatory").click(function() {
    $("#newLaudatory").append(`@include('account.create.laudatory')`);

    if ($("#laudatorytoryForm").find(".laudatoryForm").length > 0) {
        $("#editLaudatoryButton").css("display", "none");
        $("#removeLaudatory").css("display", "inline");
        $("#addLaudatoryButton").css("display", "inline");
    } else {
        $("#editLaudatoryButton").css("display", "inline");
        $("#removeLaudatory").css("display", "none");
        $("#addLaudatoryButton").css("display", "none");
    }
});

// laudatory History remove
$("#removeLaudatory").click(function() {
    $("form .laudatoryForm").last().remove();

    if ($("#laudatorytoryForm").find(".laudatoryForm").length > 0) {
        $("#editLaudatoryButton").css("display", "none");
        $(this).css("display", "inline");
        $("#addLaudatoryButton").css("display", "inline");
    } else {
        $("#editLaudatoryButton").css("display", "inline");
        $(this).css("display", "none");
        $("#addLaudatoryButton").css("display", "none");
    }
});

$("#editLaudatoryButton").click(function() {
    $("#addNewLaudatory").css("display", "none");
    $("form input").removeAttr("readonly");

    $("#submitLaudatoryButton").css("display", "inline");
    $("#cancelLaudatoryButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelLaudatoryButton").click(function() {
    $("#addNewLaudatory").css("display", "inline");
    $("form input").attr("readonly", "");

    $("#submitLaudatoryButton").css("display", "none");
    $("#editLaudatoryButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection
