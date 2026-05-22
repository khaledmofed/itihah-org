<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $sections = AboutSection::orderBy('order')->get();

        return view('admin.about.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.about.form', ['section' => new AboutSection]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'section_key' => 'required|string|unique:about_sections,section_key',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'icon' => 'nullable|string',
            'order' => 'integer',
        ]);
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/images', 'public');
        }

        AboutSection::create($data);

        return redirect()->route('admin.about.index')->with('success', 'تم إضافة القسم بنجاح.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.about.edit', $id);
    }

    public function edit(string $id)
    {
        $section = AboutSection::findOrFail($id);

        return view('admin.about.form', compact('section'));
    }

    public function update(Request $request, string $id)
    {
        $section = AboutSection::findOrFail($id);
        $data = $request->validate([
            'section_key' => 'required|string|unique:about_sections,section_key,'.$id,
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'icon' => 'nullable|string',
            'order' => 'integer',
        ]);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/images', 'public');
        }

        $section->update($data);

        return redirect()->route('admin.about.index')->with('success', 'تم تحديث القسم بنجاح.');
    }

    public function destroy(string $id)
    {
        AboutSection::findOrFail($id)->delete();

        return back()->with('success', 'تم حذف القسم.');
    }
}
