<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfessionDaySection;
use Illuminate\Http\Request;

class ProfessionDayController extends Controller
{
    public function index()
    {
        $sections = ProfessionDaySection::orderBy('order')->get();

        return view('admin.profession-day.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.profession-day.form', ['section' => new ProfessionDaySection]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['section_key' => 'required|string|unique:profession_day_sections,section_key', 'title_ar' => 'required|string|max:255', 'content_ar' => 'nullable|string', 'order' => 'integer']);
        $data['is_active'] = $request->boolean('is_active', true);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/images', 'public');
        }
        ProfessionDaySection::create($data);

        return redirect()->route('admin.profession-day.index')->with('success', 'تم الإضافة بنجاح.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.profession-day.edit', $id);
    }

    public function edit(string $id)
    {
        $section = ProfessionDaySection::findOrFail($id);

        return view('admin.profession-day.form', compact('section'));
    }

    public function update(Request $request, string $id)
    {
        $section = ProfessionDaySection::findOrFail($id);
        $data = $request->validate(['section_key' => 'required|string|unique:profession_day_sections,section_key,'.$id, 'title_ar' => 'required|string|max:255', 'content_ar' => 'nullable|string', 'order' => 'integer']);
        $data['is_active'] = $request->boolean('is_active');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/images', 'public');
        }
        $section->update($data);

        return redirect()->route('admin.profession-day.index')->with('success', 'تم التحديث بنجاح.');
    }

    public function destroy(string $id)
    {
        ProfessionDaySection::findOrFail($id)->delete();

        return back()->with('success', 'تم الحذف.');
    }
}
