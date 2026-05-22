<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationalPath;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    private function cats(): array
    {
        return ['taheel' => 'تأهيل', 'tatweer' => 'تطوير', 'certificates' => 'فئة الشهادات'];
    }

    public function index()
    {
        $paths = EducationalPath::orderBy('category')->orderBy('order')->get();

        return view('admin.education.index', ['paths' => $paths, 'categories' => $this->cats()]);
    }

    public function create()
    {
        return view('admin.education.form', ['path' => new EducationalPath, 'categories' => $this->cats()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category' => 'required|in:taheel,tatweer,certificates',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'duration' => 'nullable|string',
            'level' => 'nullable|string',
            'color' => 'nullable|string',
            'order' => 'integer',
        ]);
        $data['is_active'] = $request->boolean('is_active', true);
        $data['objectives'] = $request->filled('objectives')
            ? array_filter(array_map('trim', explode("\n", $request->objectives)))
            : null;
        $data['requirements'] = $request->filled('requirements')
            ? array_filter(array_map('trim', explode("\n", $request->requirements)))
            : null;

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('uploads/images', 'public');
        }

        EducationalPath::create($data);

        return redirect()->route('admin.education.index')->with('success', 'تم الإضافة بنجاح.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.education.edit', $id);
    }

    public function edit(string $id)
    {
        $path = EducationalPath::findOrFail($id);

        return view('admin.education.form', compact('path') + ['categories' => $this->cats()]);
    }

    public function update(Request $request, string $id)
    {
        $path = EducationalPath::findOrFail($id);
        $data = $request->validate([
            'category' => 'required|in:taheel,tatweer,certificates',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'duration' => 'nullable|string',
            'level' => 'nullable|string',
            'color' => 'nullable|string',
            'order' => 'integer',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $data['objectives'] = $request->filled('objectives')
            ? array_filter(array_map('trim', explode("\n", $request->objectives)))
            : null;
        $data['requirements'] = $request->filled('requirements')
            ? array_filter(array_map('trim', explode("\n", $request->requirements)))
            : null;

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('uploads/images', 'public');
        }

        $path->update($data);

        return redirect()->route('admin.education.index')->with('success', 'تم التحديث بنجاح.');
    }

    public function destroy(string $id)
    {
        EducationalPath::findOrFail($id)->delete();

        return back()->with('success', 'تم الحذف.');
    }
}
