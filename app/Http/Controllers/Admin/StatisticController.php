<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::orderBy('order')->get();

        return view('admin.statistics.index', compact('statistics'));
    }

    public function create()
    {
        return view('admin.statistics.form', ['statistic' => new Statistic]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['label_ar' => 'required|string|max:255', 'label_en' => 'nullable|string', 'value' => 'required|string', 'suffix' => 'nullable|string', 'icon' => 'nullable|string', 'order' => 'integer']);
        $data['is_active'] = $request->boolean('is_active', true);
        Statistic::create($data);

        return redirect()->route('admin.statistics.index')->with('success', 'تم الإضافة بنجاح.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.statistics.edit', $id);
    }

    public function edit(string $id)
    {
        $statistic = Statistic::findOrFail($id);

        return view('admin.statistics.form', compact('statistic'));
    }

    public function update(Request $request, string $id)
    {
        $statistic = Statistic::findOrFail($id);
        $data = $request->validate(['label_ar' => 'required|string|max:255', 'label_en' => 'nullable|string', 'value' => 'required|string', 'suffix' => 'nullable|string', 'icon' => 'nullable|string', 'order' => 'integer']);
        $data['is_active'] = $request->boolean('is_active');
        $statistic->update($data);

        return redirect()->route('admin.statistics.index')->with('success', 'تم التحديث بنجاح.');
    }

    public function destroy(string $id)
    {
        Statistic::findOrFail($id)->delete();

        return back()->with('success', 'تم الحذف.');
    }
}
