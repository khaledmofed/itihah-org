<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\Award;
use App\Models\EducationalPath;
use App\Models\Event;
use App\Models\News;
use App\Models\Slider;
use App\Models\Statistic;
use App\Models\Supporter;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::active()->get();
        $statistics = Statistic::active()->orderBy('order')->get();
        $about = AboutSection::where('section_key', 'intro')->first();
        $education = EducationalPath::active()->get()->groupBy('category');
        $awards = Award::active()->orderBy('order')->get();
        $events = Event::active()->latest('event_date')->take(3)->get();
        $supporters = Supporter::active()->get();
        $news = News::published()->latest('published_at')->take(3)->get();
        $testimonials = Testimonial::active()->orderBy('sort_order')->get();

        return view('frontend.home', compact(
            'sliders', 'statistics', 'about', 'education', 'awards', 'events', 'supporters', 'news', 'testimonials'
        ));
    }
}
