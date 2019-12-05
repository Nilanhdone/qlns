@extends('user.admin.search.search-by-name')

@section('search-detail')
<table class="table">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">{{ trans('messages.profile.basic.name') }}</th>
            <th scope="col">{{ trans('messages.profile.basic.gender') }}</th>
            <th scope="col">{{ trans('messages.profile.basic.birthday') }}</th>
            <th scope="col">{{ trans('messages.profile.basic.degree') }}</th>
            <th scope="col">{{ trans('messages.profile.basic.phone') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($staffs as $staff)
        <tr>
            <td>
                <img src="{{asset('img/avatar').'/'.$staff->avatar}}" class="mr-3" height="100px" width="70px">
            </td>
            <td>{{ $staff->name }}</td>
            @if(($staff->gender) == 'male')
            <td>{{ trans('messages.profile.basic.male') }}</td>
            @elseif(($staff->gender) == 'female')
            <td>{{ trans('messages.profile.basic.female') }}</td>
            @endif
            <td>{{ $staff->birthday }}</td>
            @if(($staff->degree) == 'bachelor')
            <td>{{ trans('messages.degree.bachelor') }}</td>
            @elseif(($staff->degree) == 'engineer')
            <td>{{ trans('messages.degree.engineer') }}</td>
            @elseif(($staff->degree) == 'master')
            <td>{{ trans('messages.degree.master') }}</td>
            @elseif(($staff->degree) == 'post-doctor')
            <td>{{ trans('messages.degree.post-doctor') }}</td>
            @endif
            <td>{{ $staff->phone }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
