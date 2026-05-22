<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(20);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.form', ['news' => new News]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'excerpt_ar' => 'nullable|string',
            'author' => 'nullable|string',
        ]);
        $data['slug'] = Str::slug($request->title_en ?? $request->title_ar).'-'.time();
        $data['is_published'] = $request->boolean('is_published');
        $data['published_at'] = $request->boolean('is_published') ? now() : null;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/images', 'public');
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'تم إضافة الخبر بنجاح.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.news.edit', $id);
    }

    public function edit(string $id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.form', compact('news'));
    }

    public function update(Request $request, string $id)
    {
        $article = News::findOrFail($id);
        $news = $article;
        $data = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'excerpt_ar' => 'nullable|string',
            'author' => 'nullable|string',
        ]);
        $data['is_published'] = $request->boolean('is_published');
        if ($data['is_published'] && ! $article->published_at) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/images', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.news.index')->with('success', 'تم تحديث الخبر بنجاح.');
    }

    public function destroy(string $id)
    {
        News::findOrFail($id)->delete();

        return back()->with('success', 'تم حذف الخبر.');
    }
}
