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

        <li>
            <a href="#searchSidebar" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-search mr-2"></i>{{ trans('messages.sidebar.search') }}
            </a>
            <ul class="collapse list-unstyled" id="searchSidebar">
                <li>
                    <a class="nav-link" onclick="onTop()" href="{{ route('search-by-name') }}">
                        <i class="fas fa-user-check mr-2"></i>{{ trans('messages.sidebar.search-name') }}
                    </a>
                </li>
                <li>
                    <a class="nav-link" onclick="onTop()" href="{{ route('multiple-search') }}">
                        <i class="fas fa-search-plus mr-2"></i>{{ trans('messages.sidebar.multiple-search') }}
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="nav-link" onclick="onTop()" href="{{ route('register') }}">
                <i class="fas fa-user-plus"></i>{{ trans('messages.sidebar.register') }}
            </a>
        
            <a class="nav-link" onclick="onTop()" href="{{ route('check-vacation') }}">
                <i class="fas fa-file-alt"></i>{{ trans('messages.sidebar.vacation-check') }}
            </a>
        
            <a class="nav-link" onclick="onTop()" href="{{ route('send-vacation') }}">
                <i class="fas fa-paper-plane"></i>{{ trans('messages.sidebar.vacation-leave') }}
            </a>
        </li>
    </ul>

    <ul class="list-unstyled components">
        <h4 class="text-uppercase">
            <i class="fas fa-users mr-2"></i>{{ trans('messages.sidebar.staff-list') }}
        </h4>

        <li>
            <a href="#headSidebar" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-hotel mr-2"></i>{{ trans('messages.branchs.head') }}
            </a>
            <ul class="collapse list-unstyled" id="headSidebar">
                @foreach ($heads as $head)
                <li>
                    <a class="nav-link" onclick="onTop()" href="staff{{ $head->unit }}">
                        {{ trans('messages.units.'.$head->unit) }}
                    </a>
                </li>
                @endforeach
            </ul>
        </li>

        <li>
            <a href="#obSidebar" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-university mr-2"></i>{{ trans('messages.branchs.ob') }}
            </a>
            <ul class="collapse list-unstyled" id="obSidebar">
                @foreach ($obs as $ob)
                <li>
                    <a class="nav-link" onclick="onTop()" href="staff{{ $head->unit }}">
                        {{ trans('messages.units.'.$ob->unit) }}
                    </a>
                </li>
                @endforeach
            </ul>
        </li>

        <li>
            <a href="#lbSidebar" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-university mr-2"></i>{{ trans('messages.branchs.lb') }}
            </a>
            <ul class="collapse list-unstyled" id="lbSidebar">
                @foreach ($lbs as $lb)
                <li>
                    <a class="nav-link" onclick="onTop()" href="staff{{ $head->unit }}">
                        {{ trans('messages.units.'.$lb->unit) }}
                    </a>
                </li>
                @endforeach
            </ul>
        </li>

        <li>
            <a href="#sbSidebar" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-university mr-2"></i>{{ trans('messages.branchs.sb') }}
            </a>
            <ul class="collapse list-unstyled" id="sbSidebar">
                @foreach ($sbs as $sb)
                <li>
                    <a class="nav-link" onclick="onTop()" href="staff{{ $head->unit }}">
                        {{ trans('messages.units.'.$sb->unit) }}
                    </a>
                </li>
                @endforeach
            </ul>
        </li>

        <li>
            <a href="#cbSidebar" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-university mr-2"></i>{{ trans('messages.branchs.cb') }}
            </a>
            <ul class="collapse list-unstyled" id="cbSidebar">
                @foreach ($cbs as $cb)
                <li>
                    <a class="nav-link" onclick="onTop()" href="staff{{ $head->unit }}">
                        {{ trans('messages.units.'.$cb->unit) }}
                    </a>
                </li>
                @endforeach
            </ul>
        </li>

        <li>
            <a href="#xbSidebar" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-university mr-2"></i>{{ trans('messages.branchs.xb') }}
            </a>
            <ul class="collapse list-unstyled" id="xbSidebar">
                @foreach ($xbs as $xb)
                <li>
                    <a class="nav-link" onclick="onTop()" href="staff{{ $head->unit }}">
                        {{ trans('messages.units.'.$xb->unit) }}
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
    </ul>
</nav>
