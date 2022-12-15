@extends('partials.layout')

@section('articles')
    @unless(count($articles) === 0)
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
    @endunless
@endsection
