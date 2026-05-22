<?php

namespace App\Http\Controllers;

use App\Models\EducationalPath;

class EducationController extends Controller
{
    public function index()
    {
        return view('frontend.education');
    }

    public function category($category)
    {
        $paths = EducationalPath::active()->byCategory($category)->get();
        $labels = ['taheel' => 'تأهيل', 'tatweer' => 'تطوير', 'certificates' => 'فئة الشهادات'];
        $label = $labels[$category] ?? $category;

        return view('frontend.education-category', compact('paths', 'category', 'label'));
    }
}
