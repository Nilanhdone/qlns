<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bank of the Lao P.D.R</title>
    </head>
    <body>
        <!-- Header -->
        <div>
            <div style="float: left; width: 30%; text-align: center;">
                <img src="{{ $logo }}" width="100" height="100" />
            </div>
            <div style="float: right; width: 70%; text-align: center; color: #DD0000; font-size: 2.5em; text-transform: uppercase;">
                <p>BANK OF THE LAO P.D.R</p>
            </div>
        </div>

        <!-- Horizontal line -->
        <p style="border-top: 1px solid;"></p>

        <!-- Title -->
        <p style="text-align: center; font-size: 2em;">Profile</p>

        <!-- Profile information -->
        <div>
            <!-- Image -->
            <div style="float: left; width: 40%; text-align: center;">
                <img src="{{ $avatar }}" width="100" height="180" />
            </div>

            <!-- Information -->
            <div style="float: right; width: 60%; text-align: center; color: #DD0000;">
                <table>
                    <tr>
                        <td style="width: 40%">User ID</td>
                        <td style="width: 60%">{{ $user->user_id }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Name</td>
                        <td style="width: 60%">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Gender</td>
                        @if(($user->gender) == 'male')
                        <td style="width: 60%">Male</td>
                        @elseif(($user->gender) == 'female')
                        <td style="width: 60%">Female</td>
                        @endif
                    </tr>
                    <tr>
                        <td style="width: 40%">Birthday</td>
                        <td style="width: 60%">{{ $user->birthday }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Degree</td>
                        @if(($user->degree) == 'bachelor')
                        <td style="width: 60%">Bachelor</td>
                        @elseif(($user->degree) == 'engineer')
                        <td style="width: 60%">Engineer</td>
                        @elseif(($user->degree) == 'master')
                        <td style="width: 60%">Master</td>
                        @elseif(($user->degree) == 'post-doctor')
                        <td style="width: 60%">Post-Doctor</td>
                        @endif
                    </tr>
                    <tr>
                        <td style="width: 40%">Phone</td>
                        <td style="width: 60%">{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Email</td>
                        <td style="width: 60%">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Nationality</td>
                        <td style="width: 60%">{{ $user->nationality }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Religion</td>
                        <td style="width: 60%">{{ $user->religion }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Hometown</td>
                        <td style="width: 60%">{{ $user->hometown }}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Current address</td>
                        <td style="width: 60%">{{ $user->address }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Horizontal line -->
        <p style="border-top: 1px solid;"></p>

        <!-- Title -->
        <p style="text-align: center; font-size: 1.7em;">Education History</p>

        <!-- Education -->
        <div>
            <table style=" width: 100%;">
                <tr>
                    <th style="text-align: left; width: 25%">From</th>
                    <th style="text-align: left; width: 25%">To</th>
                    <th style="text-align: left; width: 25%">Education Unit</th>
                    <th style="text-align: left; width: 25%">Address</th>
                </tr>
                @foreach($educations as $education)
                <tr>
                    <td style="text-align: left; width: 25%">{{ $education->start_day }}</td>
                    <td style="text-align: left; width: 25%">{{ $education->end_day }}</td>
                    <td style="text-align: left; width: 25%">{{ $education->unit }}</td>
                    <td style="text-align: left; width: 25%">{{ $education->address }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- Horizontal line -->
        <p style="border-top: 1px solid;"></p>

        <!-- Title -->
        <p style="text-align: center; font-size: 1.7em;">Training History</p>

        <!-- Training -->
        <div>
            <table style=" width: 100%;">
                <tr>
                    <th style="text-align: left; width: 20%">From</th>
                    <th style="text-align: left; width: 20%">To</th>
                    <th style="text-align: left; width: 20%">Training Unit</th>
                    <th style="text-align: left; width: 20%">Address</th>
                    <th style="text-align: left; width: 20%">Content</th>
                </tr>
                @foreach($trainings as $training)
                <tr>
                    <td style="text-align: left; width: 20%">{{ $training->start_day }}</td>
                    <td style="text-align: left; width: 20%">{{ $training->end_day }}</td>
                    <td style="text-align: left; width: 20%">{{ $training->unit }}</td>
                    <td style="text-align: left; width: 20%">{{ $training->address }}</td>
                    <td style="text-align: left; width: 20%">{{ $training->content }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- Horizontal line -->
        <p style="border-top: 1px solid;"></p>

        <!-- Title -->
        <p style="text-align: center; font-size: 1.7em;">Company Work History</p>

        <!-- Company -->
        <div>
            <table style=" width: 100%;">
                <tr>
                    <th style="text-align: left; width: 25%">From</th>
                    <th style="text-align: left; width: 25%">To</th>
                    <th style="text-align: left; width: 25%">Company Name</th>
                    <th style="text-align: left; width: 25%">Position</th>
                </tr>
                @foreach($companys as $company)
                <tr>
                    <td style="text-align: left; width: 25%">{{ $company->start_day }}</td>
                    <td style="text-align: left; width: 25%">{{ $company->end_day }}</td>
                    <td style="text-align: left; width: 25%">{{ $company->unit }}</td>
                    <td style="text-align: left; width: 25%">{{ $company->position }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- Horizontal line -->
        <p style="border-top: 1px solid;"></p>

        <!-- Title -->
        <p style="text-align: center; font-size: 1.7em;">Government Work History</p>

        <!-- Government -->
        <div>
            <table style=" width: 100%;">
                <tr>
                    <th style="text-align: left; width: 25%">From</th>
                    <th style="text-align: left; width: 25%">To</th>
                    <th style="text-align: left; width: 25%">Government Unit Name</th>
                    <th style="text-align: left; width: 25%">Position</th>
                </tr>
                @foreach($governments as $government)
                <tr>
                    <td style="text-align: left; width: 25%">{{ $government->start_day }}</td>
                    <td style="text-align: left; width: 25%">{{ $government->end_day }}</td>
                    <td style="text-align: left; width: 25%">{{ $government->unit }}</td>
                    <td style="text-align: left; width: 25%">{{ $government->position }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- Horizontal line -->
        <p style="border-top: 1px solid;"></p>

        <!-- Title -->
        <p style="text-align: center; font-size: 1.7em;">Join Party History</p>

        <!-- Party -->
        <div>
            <table style=" width: 100%;">
                <tr>
                    <th style="text-align: left; width: 25%">Join day</th>
                    <th style="text-align: left; width: 25%">Party Unit</th>
                    <th style="text-align: left; width: 25%">Position</th>
                </tr>
                @foreach($partys as $party)
                <tr>
                    <td style="text-align: left; width: 25%">{{ $party->join_day }}</td>
                    <td style="text-align: left; width: 25%">{{ $party->unit }}</td>
                    <td style="text-align: left; width: 25%">{{ $party->position }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- Horizontal line -->
        <p style="border-top: 1px solid;"></p>

        <!-- Title -->
        <p style="text-align: center; font-size: 1.7em;">Family Relationship</p>

        <!-- Family -->
        <div>
            <table style=" width: 100%;">
                <tr>
                    <th style="text-align: left; width: 25%">Name</th>
                    <th style="text-align: left; width: 25%">Year of birth</th>
                    <th style="text-align: left; width: 25%">Relationship</th>
                    <th style="text-align: left; width: 25%">Address</th>
                </tr>
                @foreach($familys as $family)
                <tr>
                    <td style="text-align: left; width: 25%">{{ $family->name }}</td>
                    <td style="text-align: left; width: 25%">{{ $family->year }}</td>
                    <td style="text-align: left; width: 25%">{{ $family->relationship }}</td>
                    <td style="text-align: left; width: 25%">{{ $family->address }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- Horizontal line -->
        <p style="border-top: 1px solid;"></p>

        <!-- Title -->
        <p style="text-align: center; font-size: 1.7em;">Foreigner Relationship</p>

        <!-- Foreigner -->
        <div>
            <table style=" width: 100%;">
                <tr>
                    <th style="text-align: left; width: 25%">Name</th>
                    <th style="text-align: left; width: 25%">Year of birth</th>
                    <th style="text-align: left; width: 25%">Relationship</th>
                    <th style="text-align: left; width: 25%">Nationality</th>
                </tr>
                @foreach($foreigners as $foreigner)
                <tr>
                    <td style="text-align: left; width: 25%">{{ $foreigner->name }}</td>
                    <td style="text-align: left; width: 25%">{{ $foreigner->year }}</td>
                    <td style="text-align: left; width: 25%">{{ $foreigner->relationship }}</td>
                    <td style="text-align: left; width: 25%">{{ $foreigner->nationality }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- Horizontal line -->
        <p style="border-top: 1px solid;"></p>

        <!-- Title -->
        <p style="text-align: center; font-size: 1.7em;">Laudatory</p>

        <!-- Laudatory -->
        <div>
            <table style=" width: 100%;">
                <tr>
                    <th style="text-align: left; width: 25%">Title</th>
                    <th style="text-align: left; width: 25%">Year</th>
                    <th style="text-align: left; width: 25%">Organization</th>
                    <th style="text-align: left; width: 25%">Content</th>
                </tr>
                @foreach($laudatorys as $laudatory)
                <tr>
                    <td style="text-align: left; width: 25%">{{ $laudatory->title }}</td>
                    <td style="text-align: left; width: 25%">{{ $laudatory->year }}</td>
                    <td style="text-align: left; width: 25%">{{ $laudatory->organization }}</td>
                    <td style="text-align: left; width: 25%">{{ $laudatory->content }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- Horizontal line -->
        <p style="border-top: 1px solid;"></p>

        <!-- Title -->
        <p style="text-align: center; font-size: 1.7em;">Discipline</p>

        <!-- Discipline -->
        <div>
            <table style=" width: 100%;">
                <tr>
                    <th style="text-align: left; width: 25%">Discipline</th>
                    <th style="text-align: left; width: 25%">Year</th>
                    <th style="text-align: left; width: 25%">Organization</th>
                    <th style="text-align: left; width: 25%">Method</th>
                </tr>
                @foreach($disciplines as $discipline)
                <tr>
                    <td style="text-align: left; width: 25%">{{ $discipline->infringe }}</td>
                    <td style="text-align: left; width: 25%">{{ $discipline->year }}</td>
                    <td style="text-align: left; width: 25%">{{ $discipline->organization }}</td>
                    <td style="text-align: left; width: 25%">{{ $discipline->method }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- Horizontal line -->
        <p style="border-top: 1px solid;"></p>

        <p style="text-align: center; font-size: 1.7em;">Work Process</p>

        <!-- Work process -->
        <div>
            <table style=" width: 100%;">
                <tr>
                    <th style="text-align: left; width: 15%">From</th>
                    <th style="text-align: left; width: 15%">To</th>
                    <th style="text-align: left; width: 15%">Bracnh</th>
                    <th style="text-align: left; width: 25%">Unit</th>
                    <th style="text-align: left; width: 10%">Position</th>
                    <th style="text-align: left; width: 8%">Salary</th>
                    <th style="text-align: left; width: 12%">Insurance Number</th>
                </tr>
                @foreach($processs as $process)
                <tr>
                    <td style="text-align: left;">{{ $process->start_day }}</td>
                    <td style="text-align: left;">{{ $process->end_day }}</td>
                    <td style="text-align: left;">{{ trans('messages.branchs.'.$process->branch) }}</td>
                    <td style="text-align: left;">{{ trans('messages.units.'.$process->unit) }}</td>
                    <td style="text-align: left;">{{ trans('messages.positions.'.$process->position) }}</td>
                    <td style="text-align: center;">{{ $process->salary }}</td>
                    <td style="text-align: left;">{{ $process->insurance }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- Horizontal line -->
        <p style="border-top: 1px solid;"></p>

        <p style="text-align: center; font-size: 1.7em;">Application History</p>

        <!-- Application -->
        <div>
            <table style=" width: 100%;">
                <tr>
                    <th style="text-align: left; width: 25%">From</th>
                    <th style="text-align: left; width: 25%">To</th>
                    <th style="text-align: left; width: 25%">Title</th>
                    <th style="text-align: left; width: 25%">Reason</th>
                </tr>
                @foreach($applications as $application)
                <tr>
                    <td style="text-align: left; width: 25%">{{ $application->start_day }}</td>
                    <td style="text-align: left; width: 25%">{{ $application->end_day }}</td>
                    <td style="text-align: left; width: 25%">{{ $application->title }}</td>
                    <td style="text-align: left; width: 25%">{{ $application->reason }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>
