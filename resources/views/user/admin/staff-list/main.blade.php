@extends('layouts.app')

@section('content')
<div style="float: left; width: 25%;">
    <div class="accordion ml-2" id="staff">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#head" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('messages.branchs.head') }}
                    </button>
                </h2>
            </div>

            <div id="head" class="collapse" aria-labelledby="headingOne" data-parent="#staff">
                <div class="card-body">
                    @foreach ($heads as $head)
                    <a class="nav-link" onclick="onTop()" href="staff{{ $head->unit }}">
                        {{ trans('messages.units.'.$head->unit) }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#ob" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('messages.branchs.ob') }}
                    </button>
                </h2>
            </div>

            <div id="ob" class="collapse" aria-labelledby="headingOne" data-parent="#staff">
                <div class="card-body">
                    @foreach ($obs as $ob)
                    <a class="nav-link" onclick="onTop()" href="staff{{ $ob->unit }}">
                        {{ trans('messages.units.'.$ob->unit) }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#lb" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('messages.branchs.lb') }}
                    </button>
                </h2>
            </div>

            <div id="lb" class="collapse" aria-labelledby="headingOne" data-parent="#staff">
                <div class="card-body">
                    @foreach ($lbs as $lb)
                    <a class="nav-link" onclick="onTop()" href="staff{{ $lb->unit }}">
                        {{ trans('messages.units.'.$lb->unit) }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#sb" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('messages.branchs.sb') }}
                    </button>
                </h2>
            </div>

            <div id="sb" class="collapse" aria-labelledby="headingOne" data-parent="#staff">
                <div class="card-body">
                    @foreach ($sbs as $sb)
                    <a class="nav-link" onclick="onTop()" href="staff{{ $sb->unit }}">
                        {{ trans('messages.units.'.$sb->unit) }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cb" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('messages.branchs.cb') }}
                    </button>
                </h2>
            </div>

            <div id="cb" class="collapse" aria-labelledby="headingOne" data-parent="#staff">
                <div class="card-body">
                    @foreach ($cbs as $cb)
                    <a class="nav-link" onclick="onTop()" href="staff{{ $cb->unit }}">
                        {{ trans('messages.units.'.$cb->unit) }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#xb" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('messages.branchs.xb') }}
                    </button>
                </h2>
            </div>

            <div id="xb" class="collapse" aria-labelledby="headingOne" data-parent="#staff">
                <div class="card-body">
                    @foreach ($xbs as $xb)
                    <a class="nav-link" onclick="onTop()" href="staff{{ $xb->unit }}">
                        {{ trans('messages.units.'.$xb->unit) }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>  
    </div>
</div>

<div style="float: right; width: 75%;">
    <div class="ml-2">
        <section>
            @yield('detail')
        </section>
    </div>
</div>
@endsection
