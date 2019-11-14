@extends('layouts.app')

@section('content')
<div style="float: left; width: 25%; border-right: 2px dashed #D3D3D3;">
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
                    @foreach ($departments as $department)
                    <a class="nav-link" onclick="onTop()" href="{{ $department->unit }}">
                        {{ trans('messages.staff.main.departments.'.$department->unit) }}
                    </a>
                    @endforeach
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
                    @foreach ($equivalent_departments as $department)
                    <a class="nav-link" onclick="onTop()" href="{{ $department->unit }}">
                        {{ trans('messages.staff.main.equivalent-departments.'.$department->unit) }}
                    </a>
                    @endforeach
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
                    @foreach ($bol_branches as $department)
                    <a class="nav-link" onclick="onTop()" href="{{ $department->unit }}">
                        {{ trans('messages.staff.main.bol-branches.'.$department->unit) }}
                    </a>
                    @endforeach
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
                    @foreach ($ED_under_BOLs as $department)
                    <a class="nav-link" onclick="onTop()" href="{{ $department->unit }}">
                        {{ trans('messages.staff.main.ED-under-BOL.'.$department->unit) }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>    
    </div>
</div>

<div style="float: right; width: 75%;">
    <div class="ml-2">
        <section>
            @yield('detail')
        </section>
    </div>
</div>
@endsection
