@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
    #submitComButton, #cancelComButton, #removeComHis {
        display: none;
    }
</style>
@endsection

@section('component')
<div class="card">
    <div class="card-header">
        @if(count($companys) > 0)
        <button id="editComButton" class="btn btn-primary"><i class="fas fa-edit"></i></button>
        @endif
        <button id="cancelComButton" class="btn btn-secondary"><i class="fas fa-times"></i></button>
        <button id="addNewComHis" class="btn btn-primary"><i class="fas fa-plus"></i></button>
        <button id="removeComHis" class="btn btn-primary"><i class="fas fa-minus"></i></button>
    </div>
    <div class="card-body">
        <form method="POST" action="#" id="companyHistoryForm">
            @csrf
            <input type="hidden" value="{{ count($companys) }}" id="number">
            @foreach($companys as $company)
            <div class="row companyForm">
                <div class="col-3">
                    <div class="form-group">
                        <label>From</label>

                        <input type="date" class="form-control @error('com_start_day[]') is-invalid @enderror border border-primary" name="com_start_day[]" value="{{ $company->start_day }}" readonly required>

                        @error('com_start_day[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>To</label>

                        <input type="date" class="form-control @error('com_end_day[]') is-invalid @enderror border border-primary" name="com_end_day[]" value="{{ $company->end_day }}" readonly required>

                        @error('com_end_day[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Company Name</label>

                        <input type="text" class="form-control @error('com_name[]') is-invalid @enderror border border-primary" name="com_name[]" value="{{ $company->name }}" readonly required>

                        @error('com_name[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Position</label>

                        <input type="text" class="form-control @error('com_position[]') is-invalid @enderror border border-primary" name="com_position[]" value="{{ $company->position }}" readonly required>

                        @error('com_position[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="w-100"></div>
            @endforeach

            <div id="newComHis"></div>

            <div class="form-group row">
                <div class="col-8 offset-3">
                    <button type="submit" class="btn btn-primary" id="submitComButton">
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
$("#menuList").find(".nav-link:eq(3)").attr("class", "nav-link active");

// Company History add
$("#addNewComHis").click(function() {
    $("#newComHis").append(`@include('account.create.company')`);

    $("#companyHistoryForm").find(".companyForm").length > $("#number").val() ? $("#removeComHis").css("display", "inline") : $("#removeComHis").css("display", "none");
});

// Company History remove
$("#removeComHis").click(function() {
    $("form .companyForm").last().remove();

    $("#companyHistoryForm").find(".companyForm").length > $("#number").val() ? $(this).css("display", "inline") : $(this).css("display", "none");
});

$("#editComButton").click(function() {
    $("form input").removeAttr("readonly");

    $("#submitComButton").css("display", "inline");
    $("#cancelComButton").css("display", "inline");
    $(this).css("display", "none");
});

$("#cancelComButton").click(function() {
    $("form input").attr("readonly", "");

    $("#submitComButton").css("display", "none");
    $("#editComButton").css("display", "inline");
    $(this).css("display", "none");
});
</script>
@endsection
