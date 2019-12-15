<table class="table">
    <tbody>
        <tr>
            <th scope="col">User ID</th>
            <td>{{ $user->user_id }}</td>
        </tr>
        <tr>
            <th scope="col">Full name</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th scope="col">Gender</th>
            @if(($user->gender) == 'male')
            <td>{{ trans('messages.profile.basic.male') }}</td>
            @elseif(($user->gender) == 'female')
            <td>{{ trans('messages.profile.basic.female') }}</td>
            @endif
        </tr>
        <tr>
            <th scope="col">Birthday</th>
            <td>{{ $user->birthday }}</td>
        </tr>
        <tr>
            <th scope="col">Degree</th>
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
            <th scope="col">Nationality</th>
            <td>{{ $user->nationality }}</td>
        </tr>
        <tr>
            <th scope="col">Religion</th>
            <td>{{ $user->religion }}</td>
        </tr>
        <tr>
            <th scope="col">Hometown</th>
            <td>{{ $user->hometown }}</td>
        </tr>
        <tr>
            <th scope="col">Current address</th>
            <td>{{ $user->address }}</td>
        </tr>
        <tr>
            <th scope="col">Phone</th>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <th scope="col">Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th scope="col">Unit</th>
            <td>{{ trans('messages.units.'.$user->unit) }}</td>
        </tr>
        <tr>
            <th scope="col">Position</th>
            <td>{{ trans('messages.positions.'.$user->position) }}</td>
        </tr>
    </tbody>
</table>