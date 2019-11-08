@extends('user.admin.staff-list.main')

@section('detail')
    @foreach($users as $user)
        <p>{{ $user->name }}</p>
    @endforeach
@endsection