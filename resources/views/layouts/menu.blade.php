<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <ul class="nav nav-tabs navbar-nav mr-auto text-uppercase">
            <li class="nav-item mx-0 mx-lg-1 mr">
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="profile">
                <i class="fas fa-user-shield mr-2"></i>{{ trans('messages.menu.profile') }}</a>
            </li>
        </ul>
        <ul class="nav nav-tabs navbar-nav ml-auto text-uppercase">
            @if($_COOKIE['role']  == 'Admin')
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="register">
                    <i class="fas fa-user-plus mr-2"></i>{{ trans('messages.menu.create') }}</a>
                </li>

                <li class="nav-item mx-0 mx-lg-1">
                   <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="update">
                    <i class="fas fa-user-edit mr-2"></i>{{ trans('messages.menu.update') }}</a>
                </li>

                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#search">
                    <i class="fas fa-search mr-2"></i>{{ trans('messages.menu.search') }}</a>
                </li>
            @elseif($_COOKIE['role'] == 'Manager')
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#check">
                    <i class="fas fa-check mr-2"></i>{{ trans('messages.menu.check-leave') }}</a>
                </li>
            @elseif($_COOKIE['role'] == 'Employee')
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#leave">
                    <i class="fas fa-pen-nib mr-2"></i>{{ trans('messages.menu.leave') }}</a>
                </li>
            @endif
        </ul> 
    </div>
</nav>