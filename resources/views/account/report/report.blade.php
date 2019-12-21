@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-primary text-uppercase font-weight-bolder">
        <i class="fas fa-file-export mr-2"></i>{{ trans('bank.report.header') }}
    </div>

    <div class="card-body">
        <a href="/export-staff-staff" class="text-primary font-weight-bolder">
            <p><i class="fas fa-file-excel mr-2"></i>{{ trans('bank.report.staff') }}</p>
        </a>
        <a href="/export-staff-retire" class="text-primary font-weight-bolder">
            <p><i class="fas fa-file-excel mr-2"></i>{{ trans('bank.report.retire') }}</p>
        </a>
    </div>
</div>
@endsection
