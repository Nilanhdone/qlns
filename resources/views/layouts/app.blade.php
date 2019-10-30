<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('layouts.htmlheader')
@show

    <body>
        <div>
            @include('layouts.mainheader')

            <section>
                @yield('content')
            </section>

            <!-- footer -->
        </div>
    </body>
</html>