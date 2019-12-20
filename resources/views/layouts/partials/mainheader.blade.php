<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <!-- <button type="button" id="sidebarCollapse" class="btn btn-secondary">
            <i class="fas fa-align-left"></i>
        </button> -->
        <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button> -->
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

        <div class="collapse navbar-collapse text-uppercase text-primary font-weight-bold" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @if(Auth::check())
                @if(Auth::user()->role == 'admin')
                <li class="nav-item mx-0 mx-lg-1 dropdown">
                    <a id="function" class="nav-link py-3 px-0 px-lg-5 rounded js-scroll-trigger dropdown-toggle text-primary font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-users-cog fa-lg mr-2"></i>{{ trans('bank.header.functions') }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="function">
                        <a class="dropdown-item text-primary font-weight-bold" href="{{ route('show-create-account') }}">
                            <i class="fas fa-user-plus mr-2"></i>{{ trans('bank.header.create') }}
                        </a>
                        <a class="dropdown-item text-primary font-weight-bold" href="{{ route('show-search') }}">
                            <i class="fas fa-search mr-2"></i>{{ trans('bank.header.search') }}
                        </a>
                        <a class="dropdown-item text-primary font-weight-bold" href="{{ route('calendar') }}">
                            <i class="fas fa-clipboard-list mr-2"></i>{{ trans('bank.header.timekeep') }}
                        </a>
                        <a class="dropdown-item text-primary font-weight-bold" href="{{ route('show-report') }}">
                            <i class="fas fa-file-download mr-2"></i>{{ trans('bank.header.report') }}
                        </a>
                    </div>
                </li>
                @endif
                <li class="nav-item mx-0 mx-lg-1 dropdown">
                    <a id="profile" class="nav-link py-3 px-0 px-lg-5 rounded js-scroll-trigger dropdown-toggle text-primary font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle fa-lg mr-2"></i>{{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="profile">
                        <a class="dropdown-item text-primary font-weight-bold" href="{{ route('profile') }}">
                            <i class="fas fa-id-badge mr-2"></i>{{ trans('bank.header.profile') }}
                        </a>
                        <a class="dropdown-item text-primary font-weight-bold" href="{{ route('change-password') }}">
                            <i class="fas fa-unlock-alt mr-2"></i>{{ trans('bank.header.change-pass') }}
                        </a>
                        <a class="dropdown-item text-primary font-weight-bold" href="/logout">
                            <i class="fas fa-sign-out-alt mr-2"></i>{{ trans('messages.header.logout') }}
                        </a>
                    </div>
                </li>
                @else
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-primary font-weight-bold" href="/login">
                        <i class="fas fa-sign-in-alt fa-lg mr-2"></i>{{ trans('messages.header.login') }}
                    </a>
                </li>
                @endif

                <li class="nav-item mx-0 mx-lg-1 dropdown">
                    <a id="switchLang" class="nav-link py-3 px-0 px-lg-5 rounded js-scroll-trigger dropdown-toggle text-primary font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-language fa-lg mr-2"></i>EN-VN
                    </a>

                    <div class="dropdown-menu" aria-labelledby="switchLang">
                        <a class="dropdown-item text-primary font-weight-bold" href="lang/en"><img src="{{asset('img/en.png')}}" width="30px" height="20x"> English</a>
                        <a class="dropdown-item text-primary font-weight-bold" href="lang/vn"><img src="{{asset('img/vn.png')}}" width="30px" height="20x"> Tiếng Việt</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
