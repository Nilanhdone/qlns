@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #genderCheck, #degreeList, #submitBasicButton, #cancelBasicButton {
        display: none;
    }
</style>
@endsection

@section('component')
<div class="card">
    <div class="card-header">
        <button id="editBasicButton" class="btn btn-primary"><i class="fas fa-edit"></i></button>
        <button id="cancelBasicButton" class="btn btn-secondary"><i class="fas fa-times"></i></button>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('edit-application') }}">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user_id }}">
            @foreach($applications as $application)

            <input type="hidden" name="id[]" value="{{ $application->id }}">
            <div class="row">
                <div class="col-5">
                    <!-- Title -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">
                            {{ trans('messages.send-vacation.title') }}
                        </label>

                        <div class="col-md-8">
                            <input class="form-control @error('title') is-invalid @enderror" name="title[]" value="{{ $application->title }}" readonly required>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Start day -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">
                            {{ trans('messages.send-vacation.start-day') }}
                        </label>

                        <div class="col-md-8">
                            <input type="date" class="form-control @error('start_day') is-invalid @enderror" name="start_day[]" value="{{ $application->start_day }}" readonly  required>

                            @error('start_day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- End day -->
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">
                            {{ trans('messages.send-vacation.end-day') }}
                        </label>

                        <div class="col-md-8">
                            <input type="date" class="form-control @error('end_day') is-invalid @enderror" name="end_day[]" value="{{ $application->end_day}}" readonly required>

                            @error('end_day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-5">
                    <!-- Reason -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">
                            {{ trans('messages.send-vacation.reason') }}
                        </label>

                        <div class="col-md-8">
                            <textarea type="textarea" rows="6" class="form-control @error('reason') is-invalid @enderror" name="reason[]" value="" readonly required>{{ $application->reason }}
                            </textarea>

                            @error('reason')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{ $application->id }}">
                        {{ trans('bank.modal.delete') }}
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="del{{ $application->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        {{ trans('bank.modal.app') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        {{ trans('bank.modal.close') }}
                                    </button>
                                    <a href="/del-app-{{ $application->id }}" class="btn btn-danger">
                                        {{ trans('bank.modal.delete') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="form-group row">
                <div class="col-md-8 offset-md-3">
                    <button type="submit" class="btn btn-primary" id="submitBasicButton">
                        {{ trans('bank.create.edit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
    $("#menuList").find(".nav-link:eq(11)").attr("class", "nav-link active");
    $("#editBasicButton").click(function() {
        $("form input").removeAttr("readonly");
        $("form textarea").removeAttr("readonly");

        $("#submitBasicButton").css("display", "inline");
        $("#cancelBasicButton").css("display", "inline");
        $(this).css("display", "none");
    });

    $("#cancelBasicButton").click(function() {
        $("form input").attr("readonly", "");
        $("form textarea").attr("readonly", "");

        $("#submitBasicButton").css("display", "none");
        $("#editBasicButton").css("display", "inline");
        $(this).css("display", "none");
    });
</script>
@endsection
