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
</main>

@include('partials.footer')

</body>
</html>
