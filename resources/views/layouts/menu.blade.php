<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container" style="border-bottom: 2px solid rgba(0,0,0,.125);">
        <ul class="nav navbar-nav mr-auto text-uppercase">
            <li class="nav-item mx-0 mx-lg-1 mr">
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('profile') }}">
                <i class="fas fa-user-shield mr-2"></i>{{ trans('messages.menu.profile') }}</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto text-uppercase">
            @if(($user->role)  == 'admin')
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('register') }}">
                    <i class="fas fa-user-plus mr-2"></i>{{ trans('messages.menu.create') }}</a>
                </li>

                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('staff') }}">
                    <i class="fas fa-users mr-2"></i>{{ trans('messages.menu.staff') }}</a>
                </li>

                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('search') }}">
                    <i class="fas fa-search mr-2"></i>{{ trans('messages.menu.search') }}</a>
                </li>
            @elseif(($user->role) == 'manager')
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('check-vacation') }}">
                    <i class="fas fa-check mr-2"></i>{{ trans('messages.menu.check-vacation') }}</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('add-work-calendar') }}">
                    <i class="fas fa-calendar-plus mr-2"></i>Add work calendar</a>
                </li>
            @elseif(($user->role) == 'employee')
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('send-vacation') }}">
                    <i class="fas fa-pen-nib mr-2"></i>{{ trans('messages.menu.leave') }}</a>
                </li>
            @endif
        </ul> 
    </div>
</nav>