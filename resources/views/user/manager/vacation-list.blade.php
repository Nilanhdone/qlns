@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-primary text-uppercase">
        {{ trans('messages.vacation.header') }}
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ trans('messages.vacation.name') }}</th>
                    <th scope="col">{{ trans('messages.vacation.title') }}</th>
                    <th scope="col">{{ trans('messages.vacation.reason') }}</th>
                    <th scope="col">{{ trans('messages.vacation.start-day') }}</th>
                    <th scope="col">{{ trans('messages.vacation.end-day') }}</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($vacation_list as $vacation)
                <tr>
                    <th scope="row">{{ $vacation[1] }}</th>
                    <td>{{ $vacation[0]->title }}</td>
                    <td>{{ $vacation[0]->reason }}</td>
                    <td>{{ $vacation[0]->start_day }}</td>
                    <td>{{ $vacation[0]->end_day }}</td>
                    <td>
                        <div class="btn-group dropright">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ trans('messages.vacation.button') }}
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-success" href="accept/{{ $vacation[0]->id }}">
                                    <i class="fas fa-check mr-2"></i>{{ trans('messages.vacation.accept') }}
                                </a>
                                <a class="dropdown-item text-danger" href="reject/{{ $vacation[0]->id }}">
                                    <i class="fas fa-times mr-2"></i>{{ trans('messages.vacation.reject') }}
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
