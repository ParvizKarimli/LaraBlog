@extends('layout')

@section('content')
    @unless(count($articles) === 0)
        @include('partials.featured')

        @include('partials.features')

        <div class="row g-5">
            <div class="col-md-8">
                <h1 class="pb-4 mb-4 fst-italic border-bottom">
                    Latest Articles
                </h1>

                @foreach($articles as $article)
                    <article class="blog-post">
                        <h2 class="blog-post-title mb-1">
                            <a href="/articles/{{ $article->id }}">
                                {{ $article->title }}
                            </a>
                        </h2>

                        <p class="blog-post-meta">
                            {{ $article->created_at->toFormattedDateString() }} by <a href="#">Mark</a>
                        </p>

                        <p>
                            {{ Str::words($article->body, 10, '...') }}
                        </p>
                        <hr>
                    </article>
                @endforeach

                @include('partials.pagination')
            </div>

    @else
        <p>No articles found.</p>

    @endunless
@endsection
