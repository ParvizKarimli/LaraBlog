@extends('layout')

@section('content')
    <div class="row g-5">
        <div class="col-md-8">
            <h1 class="pb-4 mb-4 fst-italic border-bottom">
            </h1>

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
        </div>
@endsection
