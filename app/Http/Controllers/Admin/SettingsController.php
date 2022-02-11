<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }
    public function socialite()
    {
        request()->merge([
            'FACEBOOK_ENABLE' => request('FACEBOOK_ENABLE', 0),
            'GOOGLE_ENABLE' => request('GOOGLE_ENABLE', 0),
        ]);
        $data = request()->all();
        unset($data['_token']);
        unset($data['locale']);
        foreach ($data as $key => $value) {
            Settings::updateOrCreate(['name' => $key],[
                'name' => $key,
                'value' => $value,
            ]);
        }

        return back();

    }
    public function brandlogo()
    {
        $data = request()->all();
        unset($data['_token']);
        unset($data['locale']);
        foreach ($data as $key => $value) {
            Settings::updateOrCreate(['name' => $key],[
                'name' => $key,
                'value' => $value,
            ]);
        }
        return back();
    }
}
