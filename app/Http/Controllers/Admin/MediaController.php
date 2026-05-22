<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaItem;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $items = MediaItem::orderBy('order')->paginate(24);

        return view('admin.media.index', compact('items'));
    }

    public function upload(Request $request)
    {
        $request->validate(['file' => 'required|file|max:10240']);
        $file = $request->file('file');
        $type = str_contains($file->getMimeType(), 'video') ? 'video' : (str_contains($file->getMimeType(), 'pdf') ? 'pdf' : 'image');
        $path = $file->store('uploads/'.($type === 'image' ? 'images' : ($type === 'video' ? 'videos' : 'documents')), 'public');
        MediaItem::create(['type' => $type, 'path' => $path, 'title_ar' => $request->input('title_ar', $file->getClientOriginalName())]);

        return back()->with('success', 'تم رفع الملف بنجاح.');
    }

    public function destroy(string $id)
    {
        MediaItem::findOrFail($id)->delete();

        return back()->with('success', 'تم الحذف.');
    }
}
