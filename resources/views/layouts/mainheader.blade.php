<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <img src="{{asset('img/logo.png')}}" height="70" width="70" alt="Small logo">

        <ul class="navbar-nav ml-auto text-uppercase">
            <!-- <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#book">
                <i class="fas fa-calendar-check mr-2"></i>{{ trans('messages.header.search') }}</a>
            </li>


            <li class="nav-item mx-0 mx-lg-1">
               <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">
                <i class="fas fa-utensils mr-2"></i>{{ trans('messages.header.email') }}</a>
            </li> -->

            <li class="nav-item mx-0 mx-lg-1 dropdown">
                <a id="switchLang" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-language mr-2"></i>{{ trans('messages.header.language') }}
                </a>

                <div class="dropdown-menu" aria-labelledby="switchLang">
                    <a class="dropdown-item" href="lang/en"><img src="{{asset('img/en.png')}}" width="30px" height="20x"> English</a>
                    <a class="dropdown-item" href="lang/vn"><img src="{{asset('img/vn.png')}}" width="30px" height="20x"> Tiếng Việt</a>
                </div>
            </li>
        </ul> 
    </div>
</nav>