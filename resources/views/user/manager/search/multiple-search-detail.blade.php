@extends('user.manager.search.multiple-search')

@section('search-detail')
<ul class="list-unstyled">
    @foreach($staffs as $staff)
    @if($staff->status == 1)
    <div class="row mt-2">
        <div class="col-4 offset-md-1">
            <li class="media">
                <img src="{{asset('img/avatar').'/'.$staff->avatar}}" class="mr-3" height="100px" width="70px">

                <div class="media-body">
                    <h5 class="mt-0 mb-1 text-primary">{{ $staff->name }}</h5>
                    <p class="font-italic">{{ trans('messages.positions.'.$staff->position) }}</p>
                </div>
            </li>
        </div>
        <div class="col-4 text-uppercase">
            <a href="detail/{{ $staff->user_id }}" class="badge badge-pill badge-info">
                {{ trans('messages.staff.detail.button.detail') }}
            </a>
        </div>
    </div>
    @endif
    @endforeach
</ul>
@endsection