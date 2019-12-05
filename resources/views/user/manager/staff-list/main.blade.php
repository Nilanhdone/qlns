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
        @foreach($staffs as $staff)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">{{ trans('messages.profile.basic.name') }}</th>
                    <th scope="col">{{ trans('messages.profile.basic.gender') }}</th>
                    <th scope="col">{{ trans('messages.profile.basic.birthday') }}</th>
                    <th scope="col">{{ trans('messages.profile.basic.degree') }}</th>
                    <th scope="col">{{ trans('messages.profile.basic.phone') }}</th>
                    <th scope="col"></th>
                </tr>

                <tr>
                    <th scope="col"></th>
                    <th scope="col">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text text-primary">
                                    <i class="fas fa-filter"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="nameInput" onkeyup="searchName()">
                        </div>
                    </th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text text-primary">
                                    <i class="fas fa-filter"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="degreeInput" onkeyup="searchDegree()">
                        </div>
                    </th>
                    <th scope="col">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text text-primary">
                                    <i class="fas fa-filter"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="phoneInput" onkeyup="searchPhone()">
                        </div>
                    </th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody id="staffSearch">
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
                    <td>
                        <a href="mana-detail-{{ $staff->user_id }}" class="badge badge-pill badge-info text-uppercase">
                            {{ trans('messages.staff.detail.button.detail') }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
    </div>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
function searchName() {
    var input, filter, tbody, td, tr, i, txtValue;

    input = document.getElementById("nameInput");
    filter = input.value.toUpperCase();
    tbody = document.getElementById("staffSearch");
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

function searchDegree() {
    var input, filter, tbody, td, tr, i, txtValue;

    input = document.getElementById("degreeInput");
    filter = input.value.toUpperCase();
    tbody = document.getElementById("staffSearch");
    tr = tbody.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[4];
        txtValue = td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}

function searchPhone() {
    var input, filter, tbody, td, tr, i, txtValue;

    input = document.getElementById("phoneInput");
    filter = input.value.toUpperCase();
    tbody = document.getElementById("staffSearch");
    tr = tbody.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[5];
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
