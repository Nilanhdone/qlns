<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        @if(Auth::check())
        <button type="button" id="sidebarCollapse" class="btn btn-secondary">
            <i class="fas fa-align-left"></i>
            <!-- <span>Toggle Sidebar</span> -->
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
        @else
        <div class="media">
            <a href="/"><img src="{{ asset('img/logo.png') }}" class="mr-3" width="80" height="80"></a>
            <div class="media-body">
                <a href="/">
                    <h3 class="mt-3 text-uppercase text-danger font-weight-bold">
                        {{ trans('messages.header.title') }}
                    </h3>
                </a>
            </div>
        </div>
        @endif

        <div class="collapse navbar-collapse text-uppercase" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @if(Auth::check())
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/logout">
                            <i class="fas fa-sign-out-alt mr-2"></i>{{ trans('messages.header.logout') }}
                        </a>
                    </li>
                @else
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/login">
                            <i class="fas fa-sign-in-alt fa-lg mr-2"></i>{{ trans('messages.header.login') }}
                        </a>
                    </li>
                @endif

                <li class="nav-item mx-0 mx-lg-1 dropdown">
                    <a id="switchLang" class="nav-link py-3 px-0 px-lg-5 rounded js-scroll-trigger dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-language fa-lg mr-2"></i>EN-VN
                    </a>

                    <div class="dropdown-menu" aria-labelledby="switchLang">
                        <a class="dropdown-item" href="lang/en"><img src="{{asset('img/en.png')}}" width="30px" height="20x"> English</a>
                        <a class="dropdown-item" href="lang/vn"><img src="{{asset('img/vn.png')}}" width="30px" height="20x"> Tiếng Việt</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
