<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\Award;
use App\Models\EducationalPath;
use App\Models\Event;
use App\Models\MediaItem;
use App\Models\News;
use App\Models\Slider;
use App\Models\Supporter;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'sliders' => Slider::count(),
            'events' => Event::count(),
            'awards' => Award::count(),
            'news' => News::count(),
            'education' => EducationalPath::count(),
            'supporters' => Supporter::count(),
            'media' => MediaItem::count(),
            'users' => AdminUser::count(),
        ];
        $latestEvents = Event::latest('event_date')->take(5)->get();

        return view('admin.dashboard', compact('counts', 'latestEvents'));
    }
}
