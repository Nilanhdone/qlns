@extends('layouts.app')

@section('content')
    <div style="float: left; width: 20%; border-right: 2px dashed #D3D3D3;">
        <div class="accordion ml-2" id="staff-list">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cn1" aria-expanded="true" aria-controls="collapseOne">
                            {{ trans('messages.staff-list.main.departments') }}
                        </button>
                    </h2>
                </div>

                <div id="cn1" class="collapse" aria-labelledby="headingOne" data-parent="#staff-list">
                    <div class="card-body">
                        <div>
                            <a href="#test">abv  </a>
                        </div>
                        <div>
                            <a href="#">abváda  </a>
                        </div>
                        <div>
                            <a href="#">abváda  </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cn2" aria-expanded="true" aria-controls="collapseOne">
                            {{ trans('messages.staff-list.main.equivalent-departments') }}
                        </button>
                    </h2>
                </div>

                <div id="cn2" class="collapse" aria-labelledby="headingOne" data-parent="#staff-list">
                    <div class="card-body">
                        Anim pariatur cliádd
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cn3" aria-expanded="true" aria-controls="collapseOne">
                            {{ trans('messages.staff-list.main.bol-branches') }}
                        </button>
                    </h2>
                </div>

                <div id="cn3" class="collapse" aria-labelledby="headingOne" data-parent="#staff-list">
                    <div class="card-body">
                        Anim pariatur cliádd
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cn4" aria-expanded="true" aria-controls="collapseOne">
                            {{ trans('messages.staff-list.main.ED-under-BOL') }}
                        </button>
                    </h2>
                </div>

                <div id="cn4" class="collapse" aria-labelledby="headingOne" data-parent="#staff-list">
                    <div class="card-body">
                        Anim pariatur cliádd
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="float: right; width: 70%;">
    </div>
@endsection
