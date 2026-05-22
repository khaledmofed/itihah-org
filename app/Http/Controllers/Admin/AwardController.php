<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::orderBy('order')->get();

        return view('admin.awards.index', compact('awards'));
    }

    public function create()
    {
        return view('admin.awards.form', ['award' => new Award]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description_ar' => 'nullable|string',
            'criteria_ar' => 'nullable|string',
            'badge_color' => 'nullable|string',
            'order' => 'integer',
        ]);
        $data['slug'] = Str::slug($request->title_en ?? $request->title_ar.'-'.time());
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/images', 'public');
        }

        Award::create($data);

        return redirect()->route('admin.awards.index')->with('success', 'تم إضافة الجائزة بنجاح.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.awards.edit', $id);
    }

    public function edit(string $id)
    {
        $award = Award::findOrFail($id);

        return view('admin.awards.form', compact('award'));
    }

    public function update(Request $request, string $id)
    {
        $award = Award::findOrFail($id);
        $data = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description_ar' => 'nullable|string',
            'criteria_ar' => 'nullable|string',
            'badge_color' => 'nullable|string',
            'order' => 'integer',
        ]);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/images', 'public');
        }

        $award->update($data);

        return redirect()->route('admin.awards.index')->with('success', 'تم تحديث الجائزة بنجاح.');
    }

    public function destroy(string $id)
    {
        Award::findOrFail($id)->delete();

        return back()->with('success', 'تم حذف الجائزة.');
    }
}
