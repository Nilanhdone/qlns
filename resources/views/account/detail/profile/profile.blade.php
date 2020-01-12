@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-uppercase text-primary font-weight-bolder">
        <div class="row">
            <div class="col-auto mr-auto">
                {{ trans('bank.header.profile') }}
            </div>
            <div class="col-auto">
                <a href="/print-{{ $user->user_id }}" class="btn btn-primary" target="_blank">
                    <i class="fas fa-print mr-2"></i>{{ trans('bank.create.print') }}
                </a>
            </div>
        </div>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success"><i class="fas fa-check"></i>
            {!! Session::get('success') !!}
        </div>
    @endif

    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <div class="row mb-4">
                    <img src="{{asset('img/avatar').'/'.$user->avatar}}" class="rounded mx-auto d-block" height="200" width="120" data-toggle="modal" data-target="#changeImage" title="{{ trans('bank.img.title') }}">

                    <div class="modal fade" id="changeImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <form method="POST" action="{{ route('change-image') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                                            {{ trans('bank.img.header') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                                        <input type="file" class="form-control-file" accept="image/jpeg, image/jpg, image/png" name="image" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            {{ trans('bank.img.cancel') }}
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('bank.img.change') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="w-100"></div>
                
                <div class="row nav flex-column nav-pills" id="menuList">
                    <a class="nav-link" href="/detail-{{ $user_id }}-basic">
                        {{ trans('bank.create.basic') }}
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-processs">
                        {{ trans('bank.create.process') }}
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-educations">
                        {{ trans('bank.create.edu') }}
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-trainings">
                        {{ trans('bank.create.train') }}
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-companys">
                        {{ trans('bank.create.com') }}
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-governments">
                        {{ trans('bank.create.gov') }}
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-partys">
                        {{ trans('bank.create.party') }}
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-familys">
                        {{ trans('bank.create.fami') }}
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-foreigners">
                        {{ trans('bank.create.fore') }}
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-laudatorys">
                        {{ trans('bank.create.lau') }}
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-disciplines">
                        {{ trans('bank.create.dis') }}
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-applications">
                        {{ trans('bank.create.application') }}
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
