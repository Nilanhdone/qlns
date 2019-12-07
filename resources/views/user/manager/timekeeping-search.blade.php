@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3  class="text-uppercase text-danger mb-2">
            <p>{{ trans('messages.units.'.$unit) }}</p>
            <small>{{ trans('messages.branchs.'.$branch) }}</small>
        </h3>
    </div>

    <div class="card-body row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="3">
                            Search by day - {{ $month }} - {{ $year }}
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <form method="POST" action="{{ route('day-search') }}" id="searchByDay">
                                @csrf
                                <select class="btn border-primary" name="day" form="searchByDay">
                                    @for($i = 1; $i <= $today; $i++)
                                    <option value="{{ $i }}">{{ $i }}
                                    </option>
                                    @endfor
                                </select>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @yield('search-day-content')
                </tbody>
            </table>
        </div>
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="3">
                            Search by month - {{ $year }}
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <form method="POST" action="{{ route('month-search') }}" id="searchByMonth">
                                @csrf
                                <select class="btn border-primary" name="month" form="searchByMonth">
                                    @for($i = 1; $i <= $month; $i++)
                                    <option value="{{ $i }}">{{ $i }}
                                    </option>
                                    @endfor
                                </select>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Number of absent</th>
                    </tr>
                </thead>
                <tbody>
                    @yield('search-month-content')
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
