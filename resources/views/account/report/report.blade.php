@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-primary text-uppercase font-weight-bolder">
        <i class="fas fa-file-export mr-2"></i>{{ trans('bank.report.header') }}
    </div>

    <div class="card-body">
        @if(Session::has('errors'))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><i class="fa fa-exclamation-circle mr-2"></i>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Export all staff -->
        <a class="text-primary font-weight-bolder" data-toggle="modal" data-target="#exportStaff">
            <p><i class="fas fa-file-excel mr-2"></i>{{ trans('bank.report.staff') }}</p>
        </a>

        <!-- Modal -->
        <div class="modal fade" id="exportStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalCenterTitle">
                            {{ trans('bank.report.modal-header', [ 'results' => $staff_number]) }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{ trans('bank.report.close') }}
                        </button>
                        @if($staff_number > 0)
                        <button type="button" class="btn btn-primary">
                            <a href="/export-staff-staff">
                                <i class="fas fa-download mr-2"></i>{{ trans('bank.report.download') }}
                            </a>
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Export all staff -->
        <a class="text-primary font-weight-bolder" data-toggle="modal" data-target="#exportRetire">
            <p><i class="fas fa-file-excel mr-2"></i>{{ trans('bank.report.retire') }}</p>
        </a>

        <!-- Modal -->
        <div class="modal fade" id="exportRetire" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalCenterTitle">
                            {{ trans('bank.report.modal-header', [ 'results' => $retire_number]) }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{ trans('bank.report.close') }}
                        </button>
                        @if($retire_number > 0)
                        <button type="button" class="btn btn-primary">
                            <a href="/export-staff-retire">
                                <i class="fas fa-download mr-2"></i>{{ trans('bank.report.download') }}
                            </a>
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
