@extends('layouts.app')

@section('custom_css')
<style type="text/css">
    #removeEduHis, #removeTrainHis, #removeComHis, #removeGovHis, #removePartyHis, #removeFamilyRela, #removeForeignerRela, #removeLaudatory, #removeDiscipline {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="card">
    <div class="card-header text-uppercase text-primary font-weight-bolder">
        {{ trans('messages.register.header') }}
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success"><i class="fas fa-check"></i>
            {!! Session::get('success') !!}
        </div>
    @endif

    @if(Session::has('errors'))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li><i class="fa fa-exclamation-circle mr-2"></i>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('create-account') }}" enctype="multipart/form-data" id="create">
        @csrf

        <div class="card-header text-uppercase text-primary font-weight-bolder">
            {{ trans('bank.create.basic') }}
        </div>
        <div class="card-body">
            @include('account.create.basic-info')
        </div>

        <div class="card-header text-uppercase text-primary font-weight-bolder" id="educationHeader">
            {{ trans('bank.create.edu') }}
        </div>

        <div class="card-body" id="educationHistoryForm">
            @include('account.create.education')
            @include('account.create.education')
            @include('account.create.education')

            <div id="newEduHis"></div>
            <a class="btn btn-primary text-white" id="addNewEduHis"><i class="fas fa-plus"></i></a>
            <a class="btn btn-primary text-white" id="removeEduHis"><i class="fas fa-minus"></i></a>
        </div>

        <div class="card-header text-uppercase text-primary font-weight-bolder">
            {{ trans('bank.create.train') }}
        </div>

        <div class="card-body" id="trainingHistoryForm">
            <div id="newTrainHis"></div>
            <a class="btn btn-primary text-white" id="addNewTrainHis"><i class="fas fa-plus"></i></a>
            <a class="btn btn-primary text-white" id="removeTrainHis"><i class="fas fa-minus"></i></a>
        </div>

        <div class="card-header text-uppercase text-primary font-weight-bolder">
            {{ trans('bank.create.com') }}
        </div>

        <div class="card-body" id="companyHistoryForm">
            <div id="newComHis"></div>
            <a class="btn btn-primary text-white" id="addNewComHis"><i class="fas fa-plus"></i></a>
            <a class="btn btn-primary text-white" id="removeComHis"><i class="fas fa-minus"></i></a>
        </div>

        <div class="card-header text-uppercase text-primary font-weight-bolder">
            {{ trans('bank.create.gov') }}
        </div>

        <div class="card-body" id="governmentHistoryForm">
            <div id="newGovHis"></div>
            <a class="btn btn-primary text-white" id="addNewGovHis"><i class="fas fa-plus"></i></a>
            <a class="btn btn-primary text-white" id="removeGovHis"><i class="fas fa-minus"></i></a>
        </div>

        <div class="card-header text-uppercase text-primary font-weight-bolder">
            {{ trans('bank.create.party') }}
        </div>

        <div class="card-body" id="partyHistoryForm">
            <div id="newPartyHis"></div>
            <a class="btn btn-primary text-white" id="addNewPartyHis"><i class="fas fa-plus"></i></a>
            <a class="btn btn-primary text-white" id="removePartyHis"><i class="fas fa-minus"></i></a>
        </div>

        <div class="card-header text-uppercase text-primary font-weight-bolder">
            {{ trans('bank.create.fami') }}
        </div>

        <div class="card-body" id="familyRelationshipForm">
            @include('account.create.family')
            @include('account.create.family')

            <div id="newFamilyRela"></div>
            <a class="btn btn-primary text-white" id="addNewFamilyRela"><i class="fas fa-plus"></i></a>
            <a class="btn btn-primary text-white" id="removeFamilyRela"><i class="fas fa-minus"></i></a>
        </div>

        <div class="card-header text-uppercase text-primary font-weight-bolder">
            {{ trans('bank.create.fore') }}
        </div>

        <div class="card-body" id="foreignerRelationshipForm">
            <div id="newForeignerRela"></div>
            <a class="btn btn-primary text-white" id="addNewForeignerRela"><i class="fas fa-plus"></i></a>
            <a class="btn btn-primary text-white" id="removeForeignerRela"><i class="fas fa-minus"></i></a>
        </div>

        <div class="card-header text-uppercase text-primary font-weight-bolder">
            {{ trans('bank.create.lau') }}
        </div>

        <div class="card-body" id="laudatoryForm">
            <div id="newLaudatory"></div>
            <a class="btn btn-primary text-white" id="addNewLaudatory"><i class="fas fa-plus"></i></a>
            <a class="btn btn-primary text-white" id="removeLaudatory"><i class="fas fa-minus"></i></a>
        </div>

        <div class="card-header text-uppercase text-primary font-weight-bolder">
            {{ trans('bank.create.dis') }}
        </div>

        <div class="card-body" id="disciplineForm">
            <div id="newDiscipline"></div>
            <a class="btn btn-primary text-white" id="addNewDiscipline"><i class="fas fa-plus"></i></a>
            <a class="btn btn-primary text-white" id="removeDiscipline"><i class="fas fa-minus"></i></a>
        </div>

        <div class="card-header text-uppercase text-primary font-weight-bolder">
            {{ trans('bank.create.po-ro') }}
        </div>

        <div class="card-body">
            @include('account.create.process')
        </div>

        <div class="card-body row">
            <div class="col-6 offset-4">
                <button type="sumbit" class="btn btn-primary">
                    {{ trans('bank.create.create') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
// Education History add
$("#addNewEduHis").click(function() {
    $("#newEduHis").append(`@include('account.create.education')`);

    $("#educationHistoryForm").find(".eduForm").length > 3 ? $("#removeEduHis").css("display", "inline") : $("#removeEduHis").css("display", "none");
});

// Education History remove
$("#removeEduHis").click(function() {
    $("form .eduForm").last().remove();

    $("#educationHistoryForm").find(".eduForm").length > 3 ? $(this).css("display", "inline") : $(this).css("display", "none");
});

// Training History add
$("#addNewTrainHis").click(function() {
    $("#newTrainHis").append(`@include('account.create.training')`);

    $("#trainingHistoryForm").find(".trainingForm").length > 0 ? $("#removeTrainHis").css("display", "inline") : $("#removeTrainHis").css("display", "none");
});

// Training History remove
$("#removeTrainHis").click(function() {
    $("form .trainingForm").last().remove();
    $("form .trainingForm").last().remove();

    $("#trainingHistoryForm").find(".trainingForm").length > 0 ? $(this).css("display", "inline") : $(this).css("display", "none");
});

// Company History add
$("#addNewComHis").click(function() {
    $("#newComHis").append(`@include('account.create.company')`);

    $("#companyHistoryForm").find(".companyForm").length > 0 ? $("#removeComHis").css("display", "inline") : $("#removeComHis").css("display", "none");
});

// Company History remove
$("#removeComHis").click(function() {
    $("form .companyForm").last().remove();

    $("#companyHistoryForm").find(".companyForm").length > 0 ? $(this).css("display", "inline") : $(this).css("display", "none");
});

// Government History add
$("#addNewGovHis").click(function() {
    $("#newGovHis").append(`@include('account.create.government')`);

    $("#governmentHistoryForm").find(".governmentForm").length > 0 ? $("#removeGovHis").css("display", "inline") : $("#removeGovHis").css("display", "none");
});

// Government History remove
$("#removeGovHis").click(function() {
    $("form .governmentForm").last().remove();

    $("#governmentHistoryForm").find(".governmentForm").length > 0 ? $(this).css("display", "inline") : $(this).css("display", "none");
});

// Join Party History add
$("#addNewPartyHis").click(function() {
    $("#newPartyHis").append(`@include('account.create.party')`);

    $("#partyHistoryForm").find(".partyForm").length > 0 ? $("#removePartyHis").css("display", "inline") : $("#removePartyHis").css("display", "none");
});

// Join Party History remove
$("#removePartyHis").click(function() {
    $("form .partyForm").last().remove();

    $("#partyHistoryForm").find(".partyForm").length > 0 ? $(this).css("display", "inline") : $(this).css("display", "none");
});

// Farmily Relationship add
$("#addNewFamilyRela").click(function() {
    $("#newFamilyRela").append(`@include('account.create.family')`);

    $("#familyRelationshipForm").find(".familyForm").length > 2 ? $("#removeFamilyRela").css("display", "inline") : $("#removeFamilyRela").css("display", "none");
});

// Farmily Relationship remove
$("#removeFamilyRela").click(function() {
    $("form .familyForm").last().remove();

    $("#familyRelationshipForm").find(".familyForm").length > 2 ? $(this).css("display", "inline") : $(this).css("display", "none");
});

// Foreigner Relationship add
$("#addNewForeignerRela").click(function() {
    $("#newForeignerRela").append(`@include('account.create.foreigner')`);

    $("#foreignerRelationshipForm").find(".foreignerForm").length > 0 ? $("#removeForeignerRela").css("display", "inline") : $("#removeForeignerRela").css("display", "none");
});

// Foreigner Relationship remove
$("#removeForeignerRela").click(function() {
    $("form .foreignerForm").last().remove();

    $("#foreignerRelationshipForm").find(".foreignerForm").length > 0 ? $(this).css("display", "inline") : $(this).css("display", "none");
});

// Laudatory add
$("#addNewLaudatory").click(function() {
    $("#newLaudatory").append(`@include('account.create.laudatory')`);

    $("#laudatoryForm").find(".laudatoryForm").length > 0 ? $("#removeLaudatory").css("display", "inline") : $("#removeLaudatory").css("display", "none");
});

// Laudatory remove
$("#removeLaudatory").click(function() {
    $("form .laudatoryForm").last().remove();

    $("#laudatoryForm").find(".laudatoryForm").length > 0 ? $(this).css("display", "inline") : $(this).css("display", "none");
});

// Discipline add
$("#addNewDiscipline").click(function() {
    $("#newDiscipline").append(`@include('account.create.discipline')`);

    $("#disciplineForm").find(".disciplineForm").length > 0 ? $("#removeDiscipline").css("display", "inline") : $("#removeDiscipline").css("display", "none");
});

// Discipline remove
$("#removeDiscipline").click(function() {
    $("form .disciplineForm").last().remove();

    $("#disciplineForm").find(".disciplineForm").length > 0 ? $(this).css("display", "inline") : $(this).css("display", "none");
});
</script>
@endsection

