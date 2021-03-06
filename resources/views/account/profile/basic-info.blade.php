<table class="table">
    <tbody>
        <tr>
            <th scope="col">{{ trans('messages.register.user-id') }}</th>
            <td>{{ $user->user_id }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('bank.create.recruitment') }}</th>
            <td>{{ $user->recruitment_day }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.name') }}</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.gender') }}</th>
            <td>{{ trans('messages.profile.basic.'.$user->gender) }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.birthday') }}</th>
            <td>{{ $user->birthday }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('messages.register.degree') }}</th>
            <td>{{ trans('messages.degree.'.$user->degree) }}</td>
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
        <tr>
            <th scope="col">{{ trans('bank.create.identity') }}</th>
            <td>{{ $user->identity }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('bank.create.passport') }}</th>
            <td>{{ $user->passport }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('bank.create.matrimony') }}</th>
            <td>{{ trans('bank.create.'.$user->matrimony) }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('bank.create.party_day') }}</th>
            <td>{{ $user->party_day }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('bank.create.army_day') }}</th>
            <td>{{ $user->army_day }}</td>
        </tr>
        <tr>
            <th scope="col">{{ trans('bank.create.health') }}</th>
            <td>{{ $user->health }}</td>
        </tr>
    </tbody>
</table>