<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventsController extends Controller
{
    public function index()
    {
        $categories = ['forum' => 'الملتقى المهني التجميلي', 'top_beauty' => 'التوب بيوتي', 'profession_day_celebration' => 'احتفال يوم المهنة العالمي'];

        $query = Event::active();
        if (request('category') && array_key_exists(request('category'), $categories)) {
            $query->where('category', request('category'));
        }
        $events = $query->paginate(9);

        return view('frontend.events', compact('events', 'categories'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        $related = Event::active()->where('slug', '!=', $slug)->take(3)->get();

        return view('frontend.event-show', compact('event', 'related'));
    }
}
