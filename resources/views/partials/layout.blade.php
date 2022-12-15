<!doctype html>
<html lang="en">
@include('partials.head')
<body>

<div class="container">
    @include('partials.header')

    @include('partials.nav')
</div>

<main class="container">
    @include('partials.featured')

    @include('partials.features')

    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                Blog Articles
            </h3>

            @yield('articles')

            @include('partials.pagination')

        </div>

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
