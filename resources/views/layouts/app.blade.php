<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('layouts.htmlheader')
@show

    <body>
        <div>
            @include('layouts.mainheader')

            <section>
                @yield('main-content')
            </section>

            <!-- footer -->
        </div>
    </body>
</html>