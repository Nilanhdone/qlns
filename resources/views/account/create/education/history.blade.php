@extends('account.create.education.number')

@section('history_education_form')
<form method="POST" action="create-his-edu">
    @csrf

    @include('account.create.education.form')

    <div id="newHisEdu"></div>
    <a class="btn btn-primary" id="addNewHisEdu">Add new education history</a>
    <a class="btn btn-primary" id="removeHisEdu">Add new education history</a>

    <div class="row">
        <div class="form-group col-md-2 offset-md-10">
            <button type="submit" class="btn btn-primary">
                Continue<i class="fas fa-chevron-right ml-3"></i>
            </button>
        </div>
    </div>
</form>
@endsection

