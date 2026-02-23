<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $theme = Setting::firstOrCreate(['key' => 'theme'], ['value' => 'theme-gold']);
        return view('admin.settings.index', compact('theme'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'theme' => 'required|in:theme-gold,theme-blue,theme-green,theme-purple,theme-red,theme-white-blue,theme-white-green,theme-white-gold',
        ]);

        Setting::updateOrCreate(
            ['key' => 'theme'],
            ['value' => $request->theme]
        );

        return redirect()->back()->with('success', 'Theme updated successfully.');
    }
}
