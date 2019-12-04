<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

    <body>
        <div class="wrapper">
            @if(Auth::check())
                @include('layouts.partials.sidebar')
            @endif

            <div id="content">
                @include('layouts.partials.mainheader')
                <section>
                    @yield('content')
                </section>
            </div>

            <!-- footer here -->
        </div>

        @section('scripts')
            @include('layouts.partials.scripts')
        @show

        @yield('custom_js')
    </body>
</html>
