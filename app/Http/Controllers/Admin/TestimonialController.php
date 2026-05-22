<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.form', ['testimonial' => new Testimonial]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'role_ar' => 'nullable|string|max:255',
            'content_ar' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'sort_order' => 'nullable|integer',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $data['rating'] = $data['rating'] ?? 5;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/testimonials', 'public');
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'تم إضافة الشهادة بنجاح.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.testimonials.edit', $id);
    }

    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $data = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'role_ar' => 'nullable|string|max:255',
            'content_ar' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'sort_order' => 'nullable|integer',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $data['rating'] = $data['rating'] ?? 5;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/testimonials', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'تم تحديث الشهادة بنجاح.');
    }

    public function destroy(string $id)
    {
        Testimonial::findOrFail($id)->delete();

        return back()->with('success', 'تم حذف الشهادة.');
    }
}
