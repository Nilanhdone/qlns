@extends('layouts.app')

@section('content')
<div style="float: left; width: 20%; border-right: 2px dashed #D3D3D3;">
    <div class="accordion ml-2" id="staff">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cn1" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('messages.staff.main.departments.header') }}
                    </button>
                </h2>
            </div>

            <div id="cn1" class="collapse" aria-labelledby="headingOne" data-parent="#staff">
                <div class="card-body">
                    <div class="nav flex-column nav-pills" id="v-pills-department" role="tablist" aria-orientation="vertical">
                        @foreach ($departments as $department)
                        <a class="nav-link" onclick="onTop()" id="v-pills-department" href="#{{ $department->unit }}" data-toggle="pill" role="tab" aria-controls="v-pills-department" aria-selected="true">
                            {{ trans('messages.staff.main.departments.'.$department->unit) }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cn2" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('messages.staff.main.equivalent-departments.header') }}
                    </button>
                </h2>
            </div>

            <div id="cn2" class="collapse" aria-labelledby="headingOne" data-parent="#staff">
                <div class="card-body">
                    <div class="nav flex-column nav-pills" id="v-pills-eq-department" role="tablist1" aria-orientation="vertical">
                        @foreach ($equivalent_departments as $department)
                        <a class="nav-link" onclick="onTop()" id="v-pills-eq-department" href="#{{ $department->unit }}" data-toggle="pill" role="tab" aria-controls="v-pills-eq-department" aria-selected="true">
                            {{ trans('messages.staff.main.equivalent-departments.'.$department->unit) }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cn3" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('messages.staff.main.bol-branches.header') }}
                    </button>
                </h2>
            </div>

            <div id="cn3" class="collapse" aria-labelledby="headingOne" data-parent="#staff">
                <div class="card-body">
                    <div class="nav flex-column nav-pills" id="v-pills-branch" role="tablist" aria-orientation="vertical">
                        @foreach ($bol_branches as $department)
                        <a class="nav-link" onclick="onTop()" id="v-pills-branch" href="#{{ $department->unit }}" data-toggle="pill" role="tab" aria-controls="v-pills-branch" aria-selected="true">
                            {{ trans('messages.staff.main.bol-branches.'.$department->unit) }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cn4" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('messages.staff.main.ED-under-BOL.header') }}
                    </button>
                </h2>
            </div>

            <div id="cn4" class="collapse" aria-labelledby="headingOne" data-parent="#staff">
                <div class="card-body">
                    <div class="nav flex-column nav-pills" id="v-pills-edub" role="tablist" aria-orientation="vertical">
                        @foreach ($ED_under_BOLs as $department)
                        <a class="nav-link" onclick="onTop()" id="v-pills-edub" href="#{{ $department->unit }}" data-toggle="pill" role="tab" aria-controls="v-pills-edub" aria-selected="true">
                            {{ trans('messages.staff.main.ED-under-BOL.'.$department->unit) }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="float: right; width: 80%;">
    <div class="tab-content" id="v-pills-tabContent"> 
        @foreach ($departments as $department)
        <div class="tab-pane fade" id="{{ $department->unit }}" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <h3 class="text-uppercase text-danger text-center">
                {{ trans('messages.staff.main.departments.'.$department->unit) }}
            </h3>
        </div>
        @endforeach
    </div>
</div>
@endsection

<script type="text/javascript">
function onTop() {
    window.scrollTo(0, 0);
}
</script>
