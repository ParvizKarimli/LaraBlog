@extends('partials.layout')

@section('content')
    @unless(count($articles) === 0)
        <h1 class="pb-4 mb-4 fst-italic border-bottom">
            Blog Articles
        </h1>

        @foreach($articles as $article)
            <article class="blog-post">
                <h2 class="blog-post-title mb-1">
                    {{ $article->title }}
                </h2>

                <p class="blog-post-meta">
                    {{ $article->created_at->toFormattedDateString() }} by <a href="#">Mark</a>
                </p>

                <p>
                    {{ $article->body }}
                </p>
                <hr>
            </article>
        @endforeach

        @include('partials.pagination')

    @else
        <p>No articles found.</p>

    @endunless
@endsection
