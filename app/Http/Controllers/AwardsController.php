<?php

namespace App\Http\Controllers;

use App\Models\Award;

class AwardsController extends Controller
{
    public function index()
    {
        $awards = Award::active()->get();

        return view('frontend.awards', compact('awards'));
    }

    public function show($slug)
    {
        $award = Award::where('slug', $slug)->firstOrFail();
        $related = Award::active()->where('slug', '!=', $slug)->take(3)->get();

        return view('frontend.award-show', compact('award', 'related'));
    }
}
