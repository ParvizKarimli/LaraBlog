@extends('layout')

@section('content')
        <div class="row g-5">
            @unless(count($articles) === 0)
                @include('partials.featured')
                @include('partials.features')
            @endunless

            <div class="col-md-8">
                @unless(count($articles) === 0)
                    <h1 class="pb-4 mb-4 fst-italic border-bottom">
                        Latest Articles
                    </h1>

                    @foreach($articles as $article)
                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">
                                <a href="/articles/{{ $article->id }}/{{ $article->slug }}">
                                    {{ $article->title }}
                                </a>
                            </h2>

                            <p class="blog-post-meta">
                                {{ $article->category }}
                            </p>

                            <p class="blog-post-meta">
                                {{ $article->created_at->toFormattedDateString() }} by <a href="#">Mark</a>
                            </p>

                            <p>
                                {{ Str::words($article->body, 10, '...') }} <a href="/articles/{{ $article->id }}/{{ $article->slug }}">Read More</a>
                            </p>
                            <hr>
                        </article>
                    @endforeach

                    @include('partials.pagination')
                @else
                    <p>No articles found.</p>
                @endunless
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    @include('partials.about')

                    @include('partials.archives')

                    @include('partials.elsewhere')
                </div>
            </div>
        </div>
@endsection
