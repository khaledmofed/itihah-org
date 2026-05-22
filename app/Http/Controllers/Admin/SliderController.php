<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    private const VIDEO_RULES = ['nullable', 'file', 'max:131072', 'mimes:mp4,mpeg,mpg,mov,qt,webm,ogg,ogv,avi,m4v,mkv'];

    public function index()
    {
        $sliders = Slider::orderBy('order')->get();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.form', ['slider' => new Slider]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'subtitle_ar' => 'nullable|string',
            'button_text_ar' => 'nullable|string',
            'button_url' => 'nullable|string|max:2048',
            'video_url' => 'nullable|string|max:2048',
            'video' => self::VIDEO_RULES,
            'order' => 'nullable|integer|min:0',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['order'] = $data['order'] ?? 0;
        unset($data['video']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/images', 'public');
        }

        if ($request->hasFile('video')) {
            $data['video_path'] = $request->file('video')->store('uploads/videos', 'public');
        }

        Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('success', 'تم إضافة السلايدر بنجاح.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.sliders.edit', $id);
    }

    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);

        return view('admin.sliders.form', compact('slider'));
    }

    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);
        $data = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'subtitle_ar' => 'nullable|string',
            'button_text_ar' => 'nullable|string',
            'button_url' => 'nullable|string|max:2048',
            'video_url' => 'nullable|string|max:2048',
            'video' => self::VIDEO_RULES,
            'order' => 'nullable|integer|min:0',
        ]);

        unset($data['video']);

        if ($request->hasFile('video')) {
            if ($slider->video_path) {
                Storage::disk('public')->delete($slider->video_path);
            }
            $data['video_path'] = $request->file('video')->store('uploads/videos', 'public');
        } elseif ($request->boolean('clear_video') && $slider->video_path) {
            Storage::disk('public')->delete($slider->video_path);
            $data['video_path'] = null;
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/images', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');
        $data['order'] = $data['order'] ?? $slider->order;
        $slider->update($data);

        return redirect()->route('admin.sliders.index')->with('success', 'تم تحديث السلايدر بنجاح.');
    }

    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }
        if ($slider->video_path) {
            Storage::disk('public')->delete($slider->video_path);
        }
        $slider->delete();

        return back()->with('success', 'تم حذف السلايدر.');
    }
}
