<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <img src="{{asset('img/logo.png')}}" height="70" width="70" alt="Small logo">
        <h3 class="text-danger mr-auto text-uppercase">{{ trans('messages.header.title') }}</h3>

        <ul class="navbar-nav ml-auto text-uppercase">
            @if(Auth::check())
            <li class="nav-item mx-0 mx-lg-1 dropdown">
                <a id="user" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle mr-2"></i>
                </a>

                <div class="dropdown-menu" aria-labelledby="user">
                    <a class="dropdown-item text-primary" href="change-password"><i class="fas fa-tools mr-2"></i>
                        {{ trans('messages.header.change-password') }}
                    </a>
                    <a class="dropdown-item text-primary" href="logout"><i class="fas fa-sign-out-alt mr-2"></i>
                        {{ trans('messages.header.logout') }}
                    </a>
                </div>
            </li>
            @endif

            <li class="nav-item mx-0 mx-lg-1 dropdown">
                <a id="switchLang" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-language mr-2"></i>{{ trans('messages.header.language') }}
                </a>

                <div class="dropdown-menu" aria-labelledby="switchLang">
                    <a class="dropdown-item text-primary" href="lang/en"><img src="{{asset('img/en.png')}}" width="30px" height="20x"> English</a>
                    <a class="dropdown-item text-primary" href="lang/vn"><img src="{{asset('img/vn.png')}}" width="30px" height="20x"> Tiếng Việt</a>
                </div>
            </li>
        </ul> 
    </div>
</nav>