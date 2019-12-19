<table class="table">
    <tbody>
        <tr>
            <th scope="col">{{ trans('messages.register.user-id') }}</th>
            <td>{{ $user->user_id }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.name') }}</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.gender') }}</th>
            @if(($user->gender) == 'male')
            <td>{{ trans('messages.profile.basic.male') }}</td>
            @elseif(($user->gender) == 'female')
            <td>{{ trans('messages.profile.basic.female') }}</td>
            @endif
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.birthday') }}</th>
            <td>{{ $user->birthday }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.degree') }}</th>
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
            <th scope="col">{{ trans('messages.register.nationality') }}</th>
            <td>{{ $user->nationality }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.religion') }}</th>
            <td>{{ $user->religion }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.hometown') }}</th>
            <td>{{ $user->hometown }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.address') }}</th>
            <td>{{ $user->address }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.phone') }}</th>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.email') }}</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.unit') }}</th>
            <td>{{ trans('messages.units.'.$user->unit) }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.position') }}</th>
            <td>{{ trans('messages.positions.'.$user->position) }}</td>
        </tr>
    </tbody>
</table>