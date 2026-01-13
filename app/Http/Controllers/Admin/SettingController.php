<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $settings = Setting::all()->groupBy('group');
=======
        // Get all settings and convert to a key-value array
        $allSettings = Setting::all();

        // Create a flat array with setting keys as array keys
        $settings = [];
        foreach ($allSettings as $setting) {
            $settings[$setting->key] = $setting->value_en;
            // Also store language-specific values for bilingual fields
            $settings[$setting->key . '_en'] = $setting->value_en;
            $settings[$setting->key . '_fr'] = $setting->value_fr;
        }

        // Ensure settings is always an array (never null)
        $settings = $settings ?: [];

>>>>>>> master
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
<<<<<<< HEAD
        foreach ($request->settings as $key => $values) {
            Setting::set(
                $key,
                $values['en'] ?? null,
                $values['fr'] ?? null
            );
=======
        // Get all input except _token
        $input = $request->except('_token');

        // Define setting keys that have language variants
        $bilingualKeys = [
            'site_name', 'tagline', 'default_meta_title',
            'default_meta_description', 'about_text'
        ];

        // Process bilingual settings
        foreach ($bilingualKeys as $key) {
            $valueEn = $input[$key . '_en'] ?? null;
            $valueFr = $input[$key . '_fr'] ?? null;

            if ($valueEn !== null || $valueFr !== null) {
                Setting::set($key, $valueEn, $valueFr, 'general');
            }
        }

        // Process single-value settings
        $singleKeys = [
            'phone', 'whatsapp', 'email', 'address',
            'facebook_url', 'instagram_url', 'youtube_url', 'linkedin_url'
        ];

        foreach ($singleKeys as $key) {
            if (isset($input[$key])) {
                Setting::set($key, $input[$key], $input[$key], 'contact');
            }
>>>>>>> master
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}
