@extends('layouts.app')

@section('content')
<div class="container">
    <div style="float: left; width: 30%; border-right: 2px dashed #D3D3D3;">
        <div class="accordion ml-2" id="staff">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cn1" aria-expanded="true" aria-controls="collapseOne">
                            {{ trans('messages.staff.main.departments.header') }}
                        </button>
                    </h2>
                </div>

                <div id="cn1" onclick="onTop()" class="collapse" aria-labelledby="headingOne" data-parent="#staff">
                    <div class="card-body">
                        @foreach ($departments as $department)
                        <a class="nav-link" href="{{ $department->unit }}">
                            {{ trans('messages.staff.main.departments.'.$department->unit) }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>       
        </div>
    </div>

    <div style="float: right; width: 70%;">
        <div class="ml-2">
            <section>
                @yield('detail')
            </section>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
</script>
