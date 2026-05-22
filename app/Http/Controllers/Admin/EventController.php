<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'desc')->paginate(20);

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.form', ['event' => new Event, 'categories' => $this->categories()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'category' => 'nullable|string',
            'event_date' => 'nullable|date',
            'location_ar' => 'nullable|string',
            'order' => 'integer',
        ]);
        $data['slug'] = Str::slug($request->title_en ?? $request->title_ar).'-'.time();
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/images', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'تم إضافة الفعالية بنجاح.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.events.edit', $id);
    }

    public function edit(string $id)
    {
        $event = Event::findOrFail($id);

        return view('admin.events.form', compact('event') + ['categories' => $this->categories()]);
    }

    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        $data = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'category' => 'nullable|string',
            'event_date' => 'nullable|date',
            'location_ar' => 'nullable|string',
            'order' => 'integer',
        ]);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/images', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'تم تحديث الفعالية بنجاح.');
    }

    public function destroy(string $id)
    {
        Event::findOrFail($id)->delete();

        return back()->with('success', 'تم حذف الفعالية.');
    }

    private function categories(): array
    {
        return ['forum' => 'الملتقى المهني التجميلي', 'top_beauty' => 'التوب بيوتي', 'profession_day_celebration' => 'احتفال يوم المهنة العالمي'];
    }
}
