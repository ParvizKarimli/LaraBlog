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

            <a href="/articles/{{ $article->id }}/{{ $article->slug }}/edit" class="btn bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Edit
            </a>

            <a class="btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                onclick="
                    event.preventDefault();
                    if(confirm('Are you sure you want to delete this article?')) {
                        document.getElementById('delete-article-{{ $article->id }}').submit();
                    }
                "
            >
                Delete
            </a>

            <form method="POST" action="/articles/{{ $article->id }}" id="delete-article-{{ $article->id }}">
                @method('DELETE')
                @csrf
            </form>
        </div>
@endsection
