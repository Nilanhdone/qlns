@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-uppercase text-primary font-weight-bolder">
        Profile
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success"><i class="fas fa-check"></i>
            {!! Session::get('success') !!}
        </div>
    @endif

    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <div class="nav flex-column nav-pills" id="menuList">
                    <a class="nav-link" href="/detail-{{ $user_id }}-basic">
                        Basic Information
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-educations">
                        Education History
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-trainings">
                        Traning History
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-companys">
                        Company History
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-governments">
                        Government History
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-partys">
                        Join Party History
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-familys">
                        Family Relationship
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-foreigners">
                        Foreigner Relationship
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-laudatorys">
                        Laudatory
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-disciplines">
                        Discipline
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-processs">
                        Process
                    </a>
                </div>
            </div>
            <div class="col-10">
                <div>
                    @yield('component')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
