@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitLaudatoryButton, #cancelLaudatoryButton, #removeLaudatory {
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
        <form method="POST" action="#" id="LaudatorytoryForm">
            @csrf
            <input type="hidden" value="{{ count($laudatorys) }}" id="number">
            @foreach($laudatorys as $laudatory)
            <div class="row laudatoryForm">
                <div class="col-4">
                    <div class="form-group">
                        <label>Title</label>

                        <input type="text" class="form-control @error('title[]') is-invalid @enderror border border-primary" name="title[]" value="{{ $laudatory->title }}" readonly required>

                        @error('title[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Year</label>

                        <input type="text" class="form-control @error('lau_year[]') is-invalid @enderror border border-primary" name="lau_year[]" value="{{ $laudatory->year }}" readonly required>

                        @error('lau_year[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Organization</label>

                        <input type="text" class="form-control @error('lau_organization[]') is-invalid @enderror border border-primary" name="lau_organization[]" value="{{ $laudatory->organization }}" readonly required>

                        @error('lau_organization[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Content</label>

                        <input type="text" class="form-control @error('lau_content[]') is-invalid @enderror border border-primary" name="lau_content[]" value="{{ $laudatory->content }}" readonly required>

                        @error('lau_content[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="w-100"></div>
            @endforeach

            <div id="newLaudatory"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="submitLaudatoryButton">
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
$("#menuList").find(".nav-link:eq(8)").attr("class", "nav-link active");

// laudatory History add
$("#addNewLaudatory").click(function() {
    $("#newLaudatory").append(`@include('account.create.laudatory')`);

    $("#LaudatorytoryForm").find(".laudatoryForm").length > $("#number").val() ? $("#removeLaudatory").css("display", "inline") : $("#removeLaudatory").css("display", "none");
});

// laudatory History remove
$("#removeLaudatory").click(function() {
    $("form .laudatoryForm").last().remove();

    $("#LaudatorytoryForm").find(".laudatoryForm").length > $("#number").val() ? $(this).css("display", "inline") : $(this).css("display", "none");
});

$("#editLaudatoryButton").click(function() {
    $("form input").removeAttr("readonly");

    $("#submitLaudatoryButton").css("display", "inline");
    $("#cancelLaudatoryButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelLaudatoryButton").click(function() {
    $("form input").attr("readonly", "");

    $("#submitLaudatoryButton").css("display", "none");
    $("#editLaudatoryButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection
