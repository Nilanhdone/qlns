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
                        <td>User ID</td>
                        <td>{{ $user->user_id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        @if(($user->gender) == 'male')
                        <td>Male</td>
                        @elseif(($user->gender) == 'female')
                        <td>Female</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Birthday</td>
                        <td>{{ $user->birthday }}</td>
                    </tr>
                    <tr>
                        <td>Degree</td>
                        @if(($user->degree) == 'bachelor')
                        <td>Bachelor</td>
                        @elseif(($user->degree) == 'engineer')
                        <td>Engineer</td>
                        @elseif(($user->degree) == 'master')
                        <td>Master</td>
                        @elseif(($user->degree) == 'post-doctor')
                        <td>Post-Doctor</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Nationality</td>
                        <td>{{ $user->nationality }}</td>
                    </tr>
                    <tr>
                        <td>Religion</td>
                        <td>{{ $user->religion }}</td>
                    </tr>
                    <tr>
                        <td>Hometown</td>
                        <td>{{ $user->hometown }}</td>
                    </tr>
                    <tr>
                        <td>Current address</td>
                        <td>{{ $user->address }}</td>
                    </tr>
                    <tr>
                        <td>Passport</td>
                        <td>{{ $user->passport }}</td>
                    </tr>
                    <tr>
                        <td>Identity</td>
                        <td>{{ $user->identity }}</td>
                    </tr>
                    <tr>
                        <td">Matrimony</td>
                        @if(($user->matrimony) == 'single')
                        <td>Single</td>
                        @elseif(($user->matrimony) == 'married')
                        <td>Married</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Day into the party</td>
                        <td">{{ $user->party_day }}</td>
                    </tr>
                    <tr>
                        <td>Date of enlistment</td>
                        <td>{{ $user->army_day }}</td>
                    </tr>
                    <tr>
                        <td style="width: 50%">Recruitment day</td>
                        <td style="width: 50%">{{ $user->recruitment_day }}</td>
                    </tr>
                </table>
            </div>
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
                    @if($process->end_day == null)
                    <td style="text-align: left;">now</td>
                    @else
                    <td style="text-align: left;">{{ $process->end_day }}</td>
                    @endif
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

        <!-- Title -->
        <p style="text-align: center; font-size: 1.7em;">Education History</p>

        <!-- Education -->
        <div>
            <table style=" width: 100%;">
                <tr>
                    <th style="text-align: left; width: 25%">From</th>
                    <th style="text-align: left; width: 25%">To</th>
                    <th style="text-align: left; width: 25%">Study level</th>
                    <th style="text-align: left; width: 25%">Address</th>
                </tr>
                @foreach($educations as $education)
                <tr>
                    <td style="text-align: left; width: 25%">{{ $education->start_day }}</td>
                    <td style="text-align: left; width: 25%">{{ $education->end_day }}</td>
                    <td style="text-align: left; width: 25%">{{ $education->level }}</td>
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
                    <th style="text-align: left; width: 20%">Training course</th>
                    <th style="text-align: left; width: 20%">Training places</th>
                    <th style="text-align: left; width: 20%">Training content</th>
                </tr>
                @foreach($trainings as $training)
                <tr>
                    <td style="text-align: left;">{{ $training->start_day }}</td>
                    <td style="text-align: left;">{{ $training->end_day }}</td>
                    <td style="text-align: left;">{{ $training->course }}</td>
                    <td style="text-align: left;">{{ $training->address }}</td>
                    <td style="text-align: left;">{{ $training->content }}</td>
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
                    <th style="text-align: left; width: 25%">From</th>
                    <th style="text-align: left; width: 25%">To</th>
                    <th style="text-align: left; width: 25%">Position</th>
                    <th style="text-align: left; width: 25%">Other information</th>
                </tr>
                @foreach($partys as $party)
                <tr>
                    <td style="text-align: left; width: 25%">{{ $party->start_day }}</td>
                    <td style="text-align: left; width: 25%">{{ $party->end_day }}</td>
                    <td style="text-align: left; width: 25%">{{ $party->position }}</td>
                    <td style="text-align: left; width: 25%">{{ $party->other }}</td>
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
                    <th style="text-align: left; width: 20%">Name</th>
                    <th style="text-align: left; width: 20%">Year of birth</th>
                    <th style="text-align: left; width: 20%">Relationship</th>
                    <th style="text-align: left; width: 20%">Nationality</th>
                    <th style="text-align: left; width: 20%">Time</th>
                </tr>
                @foreach($foreigners as $foreigner)
                <tr>
                    <td style="text-align: left;">{{ $foreigner->name }}</td>
                    <td style="text-align: left;">{{ $foreigner->year }}</td>
                    <td style="text-align: left;">{{ $foreigner->relationship }}</td>
                    <td style="text-align: left;">{{ $foreigner->nationality }}</td>
                    <td style="text-align: left;">{{ $foreigner->time }}</td>
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
                    <th style="text-align: left; width: 25%">Laudatory method</th>
                    <th style="text-align: left; width: 25%">Decision number</th>
                </tr>
                @foreach($laudatorys as $laudatory)
                <tr>
                    <td style="text-align: left; width: 25%">{{ $laudatory->title }}</td>
                    <td style="text-align: left; width: 25%">{{ $laudatory->year }}</td>
                    <td style="text-align: left; width: 25%">{{ $laudatory->method }}</td>
                    <td style="text-align: left; width: 25%">{{ $laudatory->number }}</td>
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
                    <th style="text-align: left; width: 25%">Discipline method</th>
                </tr>
                @foreach($disciplines as $discipline)
                <tr>
                    <td style="text-align: left; width: 25%">{{ $discipline->discipline }}</td>
                    <td style="text-align: left; width: 25%">{{ $discipline->year }}</td>
                    <td style="text-align: left; width: 25%">{{ $discipline->method }}</td>
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
