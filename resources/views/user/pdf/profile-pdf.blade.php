<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ trans('messages.sidebar.header') }}</title>
    </head>
    <body>
        <!-- Header -->
        <div>
            <div style="float: left; width: 30%; text-align: center;">
                <img src="https://res.cloudinary.com/ninjahh/image/upload/v1575709178/ninja_restaurant/qyme8zq4p8cf9ukaojqw.png" width="100" height="100" />
            </div>
            <div style="float: right; width: 70%; text-align: center; color: #DD0000; font-size: 2.5em; text-transform: uppercase;">
                <p>{{ trans('messages.sidebar.header') }}</p>
            </div>
        </div>

        <!-- Horizontal line -->
        <p style="border-top: 1px solid;"></p>

        <!-- Title -->
        <p style="text-align: center; font-size: 2em;">{{ trans('messages.sidebar.profile') }}</p>

        <!-- Profile information -->
        <div>
            <!-- Image -->
            <div style="float: left; width: 40%; text-align: center;">
                <img src="https://res.cloudinary.com/ninjahh/image/upload/v1575709484/ninja_restaurant/gv0rouiblecsgnpgdlpr.png" width="150" height="200" />
            </div>

            <!-- Information -->
            <div style="float: right; width: 60%; text-align: center; color: #DD0000;">
                <table>
                    <tr>
                        <td style="width: 40%">{{ trans('messages.profile.basic.user-id') }}</td>
                        <td style="width: 60%">{{ $user->user_id }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">{{ trans('messages.profile.basic.name') }}</td>
                        <td style="width: 60%">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">{{ trans('messages.profile.basic.gender') }}</td>
                        @if(($user->gender) == 'male')
                        <td style="width: 60%">{{ trans('messages.profile.basic.male') }}</td>
                        @elseif(($user->gender) == 'female')
                        <td style="width: 60%">{{ trans('messages.profile.basic.female') }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td style="width: 40%">{{ trans('messages.profile.basic.birthday') }}</td>
                        <td style="width: 60%">{{ $user->birthday }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">{{ trans('messages.profile.basic.identify') }}</td>
                        <td style="width: 60%">{{ $user->identify_number }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">{{ trans('messages.profile.basic.degree') }}</td>
                        @if(($user->degree) == 'bachelor')
                        <td style="width: 60%">{{ trans('messages.degree.bachelor') }}</td>
                        @elseif(($user->degree) == 'engineer')
                        <td style="width: 60%">{{ trans('messages.degree.engineer') }}</td>
                        @elseif(($user->degree) == 'master')
                        <td style="width: 60%">{{ trans('messages.degree.master') }}</td>
                        @elseif(($user->degree) == 'post-doctor')
                        <td style="width: 60%">{{ trans('messages.degree.post-doctor') }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td style="width: 40%">{{ trans('messages.profile.basic.phone') }}</td>
                        <td style="width: 60%">{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">{{ trans('messages.profile.basic.email') }}</td>
                        <td style="width: 60%">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">{{ trans('messages.profile.basic.nationality') }}</td>
                        <td style="width: 60%">{{ $user->nationality }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">{{ trans('messages.profile.basic.religion') }}</td>
                        <td style="width: 60%">{{ $user->religion }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">{{ trans('messages.profile.basic.hometown') }}</td>
                        <td style="width: 60%">{{ $user->hometown }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">{{ trans('messages.profile.basic.address') }}</td>
                        <td style="width: 60%">{{ $user->address }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <p></p>

        <!-- Work process -->
        <div>
            <table>
                <tr>
                    <th style="text-align: left;">{{ trans('messages.profile.work.from') }}</th>
                    <th style="text-align: left;">{{ trans('messages.profile.work.to') }}</th>
                    <th style="text-align: left;">{{ trans('messages.profile.work.branch') }}</th>
                    <th style="text-align: left;">{{ trans('messages.profile.work.unit') }}</th>
                    <th style="text-align: left;">{{ trans('messages.profile.work.position') }}</th>
                    <th style="text-align: left;">{{ trans('messages.profile.work.salary') }}</th>
                    <th style="text-align: left;">{{ trans('messages.profile.work.insurance') }}</th>
                </tr>
                @foreach($works as $work)
                <tr>
                    <td style="text-align: left;">{{ $work->start_day }}</td>
                    @if($work->end_day == null)
                    <td style="text-align: left;">{{ trans('messages.profile.work.now') }}</td>
                    @else
                    <td style="text-align: left;">{{ $work->end_day }}</td>
                    @endif
                    <td style="text-align: left;">{{ trans('messages.branchs.'.$work->branch) }}</td>
                    <td style="text-align: left;">{{ trans('messages.units.'.$work->unit) }}</td>
                    <td style="text-align: left;">{{ trans('messages.positions.'.$work->position) }}</td>
                    <td style="text-align: center;">{{ $work->salary }}</td>
                    <td style="text-align: left;">{{ $work->insurance_number }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>
