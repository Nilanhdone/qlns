@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3  class="text-uppercase text-danger mb-2">
            <p>{{ trans('messages.units.'.$unit) }}</p>
            <small>{{ trans('messages.branchs.'.$branch) }}</small>
        </h3>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="3">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text text-primary">
                                    <i class="fas fa-filter"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="nameInput" onkeyup="searchName()">
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody id="timekeepSearch">
                @foreach($timekeeps as $timekeep)
                <tr>
                    <td>
                        <img src="{{asset('img/avatar').'/'.$timekeep['avatar']}}" class="mr-3" height="100px" width="70px">
                    </td>
                    <td>{{ $timekeep['name'] }}</td>
                    <td>
                        @if($timekeep->status == 'not')
                        <a href="yes-{{ $timekeep->user_id }}" class="badge badge-pill badge-success text-uppercase">
                            {{ trans('messages.time.yes') }}
                        </a>
                        <a href="no-{{ $timekeep->user_id }}" class="badge badge-pill badge-danger text-uppercase">
                            {{ trans('messages.time.no') }}
                        </a>
                        @elseif($timekeep->status == 'yes')
                        <a href="#" class="badge badge-pill badge-success text-uppercase">
                            <i class="fas fa-check mr-2"></i>{{ trans('messages.time.'.$timekeep->status) }}
                        </a>
                        <a href="change-{{ $timekeep->user_id }}" class="badge badge-pill badge-primary text-uppercase">
                            {{ trans('messages.time.change') }}
                        </a>
                        @elseif($timekeep->status == 'no')
                        <a href="#" class="badge badge-pill badge-danger text-uppercase">
                            <i class="fas fa-check mr-2"></i>{{ trans('messages.time.'.$timekeep->status) }}
                        </a>
                        <a href="change-{{ $timekeep->user_id }}" class="badge badge-pill badge-primary text-uppercase">
                            {{ trans('messages.time.change') }}
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
function searchName() {
    var input, filter, tbody, td, tr, i, txtValue;

    input = document.getElementById("nameInput");
    filter = input.value.toUpperCase();
    tbody = document.getElementById("timekeepSearch");
    tr = tbody.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        txtValue = td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>
@endsection
