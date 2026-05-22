<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;

class AboutController extends Controller
{
    public function index()
    {
        $sections = AboutSection::active()->get()->keyBy('section_key');

        return view('frontend.about', compact('sections'));
    }

    public function section($key)
    {
        $section = AboutSection::where('section_key', $key)->firstOrFail();
        $sections = AboutSection::active()->get()->keyBy('section_key');

        return view('frontend.about-section', compact('section', 'sections'));
    }
}
