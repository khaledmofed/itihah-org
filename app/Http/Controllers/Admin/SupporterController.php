<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supporter;
use Illuminate\Http\Request;

class SupporterController extends Controller
{
    public function index()
    {
        $supporters = Supporter::orderBy('order')->get();

        return view('admin.supporters.index', compact('supporters'));
    }

    public function create()
    {
        return view('admin.supporters.form', ['supporter' => new Supporter]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name_ar' => 'required|string|max:255', 'name_en' => 'nullable|string', 'description_ar' => 'nullable|string', 'url' => 'nullable|url', 'type' => 'nullable|string', 'order' => 'integer']);
        $data['is_active'] = $request->boolean('is_active', true);
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('uploads/images', 'public');
        }
        Supporter::create($data);

        return redirect()->route('admin.supporters.index')->with('success', 'تم الإضافة بنجاح.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.supporters.edit', $id);
    }

    public function edit(string $id)
    {
        $supporter = Supporter::findOrFail($id);

        return view('admin.supporters.form', compact('supporter'));
    }

    public function update(Request $request, string $id)
    {
        $supporter = Supporter::findOrFail($id);
        $data = $request->validate(['name_ar' => 'required|string|max:255', 'name_en' => 'nullable|string', 'description_ar' => 'nullable|string', 'url' => 'nullable|url', 'type' => 'nullable|string', 'order' => 'integer']);
        $data['is_active'] = $request->boolean('is_active');
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('uploads/images', 'public');
        }
        $supporter->update($data);

        return redirect()->route('admin.supporters.index')->with('success', 'تم التحديث بنجاح.');
    }

    public function destroy(string $id)
    {
        Supporter::findOrFail($id)->delete();

        return back()->with('success', 'تم الحذف.');
    }
}
