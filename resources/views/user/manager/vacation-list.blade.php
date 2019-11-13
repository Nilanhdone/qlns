@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card ml-2">
        <div class="card-header text-primary text-uppercase"><i class="fas fa-user mr-2"></i>
            Vacation list
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">User name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Start day</th>
                        <th scope="col">End day</th>
                    </tr>
                </thead>
                <tbody>
                    @if($flag)
                        @foreach($vacation_list as $vacation)
                            <tr>
                                <th scope="row">{{ $vacation[1] }}</th>
                                <td>{{ $vacation[0]->title }}</td>
                                <td>{{ $vacation[0]->reason }}</td>
                                <td>{{ $vacation[0]->start_day }}</td>
                                <td>{{ $vacation[0]->end_day }}</td>
                            </tr>
                        @endforeach
                    @elseif(!$flag)
                        <tr>
                            <th scope="row" colspan="5">No data</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
