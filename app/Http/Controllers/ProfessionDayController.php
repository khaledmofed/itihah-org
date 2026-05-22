<?php

namespace App\Http\Controllers;

use App\Models\ProfessionDaySection;

class ProfessionDayController extends Controller
{
    public function index()
    {
        $sections = ProfessionDaySection::active()->get()->keyBy('section_key');

        return view('frontend.profession-day', compact('sections'));
    }
}
