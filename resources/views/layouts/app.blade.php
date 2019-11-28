<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('layouts.htmlheader') <!-- Css-library -->
@show

    <body>
        <div>
            @include('layouts.mainheader') <!-- header -->

            @if(Auth::check())
                @include('layouts.menu') <!-- user function -->
            @endif
            <section>
                @yield('content')
            </section>

            <!-- @include('layouts.footer') -->
            <!-- footer -->
        </div>

        @section('scripts')
            @include('layouts.scripts') <!-- JS -->
        @show
    </body>
</html>