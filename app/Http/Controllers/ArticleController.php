<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()
            ->filter(request(['category']))
            ->paginate(10);

            $archives = Article::selectRaw('
                    year(created_at) year, 
                    monthname(created_at) as month, 
                    count(*) number_of_articles
                ')
                ->groupBy('year', 'month')
                ->orderBy('created_at')
                ->get();

        return view('articles.index', compact('articles', 'archives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => [
                'required',
                Rule::in(['technology','design','politics','science','travel'])
            ],
            'title' => 'required|min:2|unique:articles',
            'body' => 'required|min:3'
        ]);

        $article = new Article;
        $article->category = $request->category;
        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->body = $request->body;
        $article->save();

        return redirect('/')->with('message', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'category' => [
                'required',
                Rule::in(['technology','design','politics','science','travel'])
            ],
            'title' => [
                'required',
                'min:2',
                Rule::unique('articles')->ignore($article->id)
            ],
            'body' => 'required|min:3'
        ]);

        $article->category = $request->category;
        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->body = $request->body;
        $article->update();

        return redirect('/')->with('message', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/')->with('message', 'Article deleted successfully.');
    }
}
