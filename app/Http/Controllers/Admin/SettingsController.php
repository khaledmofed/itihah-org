<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->settings ?? [] as $key => $value) {
            Setting::set($key, $value);
        }

        foreach (['logo', 'footer_logo', 'favicon', 'hero_badge_image', 'hero_avatar_1', 'hero_avatar_2', 'hero_avatar_3'] as $fileKey) {
            if ($request->hasFile($fileKey)) {
                $path = $request->file($fileKey)->store('uploads/images', 'public');
                Setting::set($fileKey, $path);
            }
        }

        return back()->with('success', 'تم حفظ الإعدادات بنجاح.');
    }
}
