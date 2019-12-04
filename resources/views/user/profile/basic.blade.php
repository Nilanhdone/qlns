<div class="row mt-4">
    <div class="col-3">
        <img src="{{asset('img/avatar').'/'.$user->avatar}}" class="img-thumbnail">
    </div>
    <div class="col-9">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.user-id') }}</th>
                    <td>{{ $user->user_id }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.name') }}</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.gender') }}</th>
                    @if(($user->gender) == 'male')
                    <td>{{ trans('messages.profile.basic.male') }}</td>
                    @elseif(($user->gender) == 'female')
                    <td>{{ trans('messages.profile.basic.female') }}</td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.birthday') }}</th>
                    <td>{{ $user->birthday }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.identify') }}</th>
                    <td>{{ $user->identify_number }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.degree') }}</th>
                    @if(($user->degree) == 'bachelor')
                    <td>{{ trans('messages.degree.bachelor') }}</td>
                    @elseif(($user->degree) == 'engineer')
                    <td>{{ trans('messages.degree.engineer') }}</td>
                    @elseif(($user->degree) == 'master')
                    <td>{{ trans('messages.degree.master') }}</td>
                    @elseif(($user->degree) == 'post-doctor')
                    <td>{{ trans('messages.degree.post-doctor') }}</td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.phone') }}</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.email') }}</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.nationality') }}</th>
                    <td>{{ $user->nationality }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.religion') }}</th>
                    <td>{{ $user->religion }}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.hometown') }}</th>
                    <td>{{ $user->hometown}}</td>
                </tr>
                <tr>
                    <th scope="row">{{ trans('messages.profile.basic.address') }}</th>
                    <td>{{ $user->address }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
