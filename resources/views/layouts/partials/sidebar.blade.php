<!-- Sidebar  -->
<nav id="sidebar" class="p-3 mb-2 bg-secondary text-white">
    <div class="sidebar-header components">
        <a href="{{ route('home') }}">
            <h4 class="text-uppercase">
                {{ trans('messages.sidebar.header') }}
            </h4>
        </a>
    </div>

    <ul class="list-unstyled components">
        <!-- Settings header -->
        <h4 class="text-uppercase">
            <i class="fas fa-user-circle mr-2"></i>{{ trans('messages.sidebar.profile') }}
        </h4>

        <!-- Profile -->
        <li>
            <a href="#profileSidebar" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-id-badge mr-2"></i>{{ trans('messages.sidebar.profile') }}
            </a>
            <ul class="collapse list-unstyled" id="profileSidebar">
                <li>
                    <a class="nav-link" onclick="onTop()" href="{{ route('profile') }}">
                        <i class="fas fa-user-shield mr-2"></i>{{ trans('messages.sidebar.info') }}
                    </a>
                </li>
                <li>
                    <a class="nav-link" onclick="onTop()" href="{{ route('change-password') }}">
                        <i class="fas fa-user-lock mr-2"></i>{{ trans('messages.sidebar.change-password') }}
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="list-unstyled components">
        <h4 class="text-uppercase">
            <i class="fas fa-user-cog mr-2"></i>{{ trans('messages.sidebar.function') }}
        </h4>

        @if(Auth::user()->role == 'admin')
        <li>
            <a class="nav-link" onclick="onTop()" href="{{ route('search-by-name') }}">
                <i class="fas fa-search mr-2"></i>{{ trans('messages.sidebar.search-name') }}
            </a>
        </li>
        <li>
            <a class="nav-link" onclick="onTop()" href="{{ route('multiple-search') }}">
                <i class="fas fa-search-plus mr-2"></i>{{ trans('messages.sidebar.multiple-search') }}
            </a>
        </li>

        <li>
            <a class="nav-link" onclick="onTop()" href="{{ route('register') }}">
                <i class="fas fa-user-plus mr-2"></i>{{ trans('messages.sidebar.register') }}
            </a>
        </li>
        @elseif(Auth::user()->role == 'manager')
        <li>
            <a class="nav-link" onclick="onTop()" href="{{ route('check-vacation') }}">
                <i class="fas fa-file-alt mr-2"></i>{{ trans('messages.sidebar.vacation-check') }}
            </a>
        </li>
        <li>
            <a class="nav-link" onclick="onTop()" href="{{ route('mana-staff') }}">
                <i class="fas fa-list mr-2"></i>{{ trans('messages.sidebar.staff-list') }}
            </a>
        </li>

        <li>
            <a href="#timeKeepSidebar" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-user-check mr-2"></i>{{ trans('messages.sidebar.timekeep') }}
            </a>
            <ul class="collapse list-unstyled" id="timeKeepSidebar">
                <li>
                    <a class="nav-link" onclick="onTop()" href="{{ route('timekeeping') }}">
                        <i class="fas fa-user-check mr-2"></i>{{ trans('messages.sidebar.timekeep') }}
                    </a>
                </li>
                <li>
                    <a class="nav-link" onclick="onTop()" href="{{ route('timekeeping-search') }}">
                        <i class="fas fa-search mr-2"></i>{{ trans('messages.sidebar.search') }}
                    </a>
                </li>
            </ul>
        </li>
        @elseif(Auth::user()->role == 'employee')
        <li>
            <a class="nav-link" onclick="onTop()" href="{{ route('send-vacation') }}">
                <i class="fas fa-paper-plane mr-2"></i>{{ trans('messages.sidebar.vacation-leave') }}
            </a>
        </li>
        @endif
    </ul>
</nav>
