@extends('layout')

@section('content')
    <div class="row g-5">
        <div class="col-md-8">
            <h1 class="h3 mb-3 fw-normal">Edit the article</h1>

            <form method="POST" action="/articles/{{ $article->id }}">
                @method('PUT')

                @csrf

                <div class="form-group">
                    <label for="title">Article Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter article title..." value="{{ $article->title }}">
                </div>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror

                <div class="form-group">
                    <label for="body">Article Body:</label>
                    <textarea rows="10" class="form-control" id="body" name="body" placeholder="Enter article body...">{{ $article->body }}</textarea>
                </div>
                @error('body')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </form>
        </div>
@endsection
