<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::published()->paginate(8);
        $latest = News::published()->take(5)->get();

        return view('frontend.news', compact('news', 'latest'));
    }

    public function show($slug)
    {
        $article = News::published()->where('slug', $slug)->firstOrFail();
        $related = News::published()->where('id', '!=', $article->id)->take(4)->get();

        return view('frontend.news-show', compact('article', 'related'));
    }
}
