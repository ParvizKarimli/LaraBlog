<!doctype html>
<html lang="en">
@include('partials.head')
<body>

<div class="container">
    @include('partials.header')

    @include('partials.nav')
</div>

<main class="container">
    @yield('content')

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    @include('partials.about')

                    @include('partials.archives')

                    @include('partials.elsewhere')
                </div>
            </div>
        </div>

</main>

@include('partials.footer')

</body>
</html>
