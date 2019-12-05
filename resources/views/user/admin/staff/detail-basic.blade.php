<div class="row mt-4">
    <div class="col-3">
        <img src="{{asset('img/avatar').'/'.$staff->avatar}}" class="img-thumbnail">
    </div>
    <div class="col-9">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.user-id') }}</th>
                    <td>{{ $staff->user_id }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.name') }}</th>
                    <td>{{ $staff->name }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.gender') }}</th>
                    @if(($staff->gender) == 'male')
                    <td>{{ trans('messages.profile.basic.male') }}</td>
                    @elseif(($staff->gender) == 'female')
                    <td>{{ trans('messages.profile.basic.female') }}</td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.birthday') }}</th>
                    <td>{{ $staff->birthday }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.identify') }}</th>
                    <td>{{ $staff->identify_number }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.degree') }}</th>
                    @if(($staff->degree) == 'bachelor')
                    <td>{{ trans('messages.degree.bachelor') }}</td>
                    @elseif(($staff->degree) == 'engineer')
                    <td>{{ trans('messages.degree.engineer') }}</td>
                    @elseif(($staff->degree) == 'master')
                    <td>{{ trans('messages.degree.master') }}</td>
                    @elseif(($staff->degree) == 'post-doctor')
                    <td>{{ trans('messages.degree.post-doctor') }}</td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.phone') }}</th>
                    <td>{{ $staff->phone }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.email') }}</th>
                    <td>{{ $staff->email }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.nationality') }}</th>
                    <td>{{ $staff->nationality }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.religion') }}</th>
                    <td>{{ $staff->religion }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.hometown') }}</th>
                    <td>{{ $staff->hometown}}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.address') }}</th>
                    <td>{{ $staff->address }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
