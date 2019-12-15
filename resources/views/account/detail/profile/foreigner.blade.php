@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitForeignerButton, #cancelForeignerButton, #removeForeignerRela {
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
        <form method="POST" action="#" id="ForeignerRelatoryForm">
            @csrf
            <input type="hidden" value="{{ count($foreigners) }}" id="number">
            @foreach($foreigners as $foreigner)
            <div class="row foreignerForm">
                <div class="col-4">
                    <div class="form-group">
                        <label>Name</label>

                        <input type="text" class="form-control @error('fore_name[]') is-invalid @enderror border border-primary" name="fore_name[]" value="{{ $foreigner->name }}" required>

                        @error('fore_name[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Year of birth</label>

                        <input type="text" class="form-control @error('fore_year[]') is-invalid @enderror border border-primary" name="fore_year[]" value="{{ $foreigner->year }}" required>

                        @error('fore_year[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Relationship</label>

                        <input type="text" class="form-control @error('fore_rela[]') is-invalid @enderror border border-primary" name="fore_rela[]" value="{{ $foreigner->relationship }}" required>

                        @error('fore_rela[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Nationality</label>

                        <input type="text" class="form-control @error('fore_nation[]') is-invalid @enderror border border-primary" name="fore_nation[]" value="{{ $foreigner->nationality }}" required>

                        @error('fore_nation[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="w-100"></div>
            @endforeach

            <div id="newForeignerRela"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="submitForeignerButton">
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
$("#menuList").find(".nav-link:eq(7)").attr("class", "nav-link active");

// foreigner History add
$("#addNewForeignerRela").click(function() {
    $("#newForeignerRela").append(`@include('account.create.foreigner')`);

    $("#ForeignerRelatoryForm").find(".foreignerForm").length > $("#number").val() ? $("#removeForeignerRela").css("display", "inline") : $("#removeForeignerRela").css("display", "none");
});

// foreigner History remove
$("#removeForeignerRela").click(function() {
    $("form .foreignerForm").last().remove();

    $("#ForeignerRelatoryForm").find(".foreignerForm").length > $("#number").val() ? $(this).css("display", "inline") : $(this).css("display", "none");
});

$("#editForeignerButton").click(function() {
    $("form input").removeAttr("readonly");

    $("#submitForeignerButton").css("display", "inline");
    $("#cancelForeignerButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelForeignerButton").click(function() {
    $("form input").attr("readonly", "");

    $("#submitForeignerButton").css("display", "none");
    $("#editForeignerButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection
