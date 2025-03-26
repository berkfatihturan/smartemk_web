<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Routes;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $data=Settings::first();

        if ($data==null){
            $data = new Settings();
            $data->save();
            $data = Settings::first();
        }

        return view('admin.settings.index',[
            'settingData' => $data,
        ]);
    }

    public function update(Request $request)
    {

        $data = Settings::first();

        if ($data==null){
            $data = new Settings();
            $data->save();
            $data = Settings::first();
        }

        $data->company_name = $request->input('company_name');
        $data->address = $request->input('address');

        $data->phone = $request->input('phone');
        $data->email = $request->input('email');
        $data->facebook_url = $request->input('facebook_url');
        $data->twitter_url = $request->input('twitter_url');
        $data->youtube_url = $request->input('youtube_url');
        $data->linkedin_url = $request->input('linkedin_url');
        $data->url = $request->input('url');

        $data->mail_address = $request->input('mail_address');
        $data->mail_app_key = $request->input('mail_app_key');

        if (\Illuminate\Support\Facades\Auth::user()->id == 0){
            $data->api_server_address = $request->input('api_server_address');
            $data->api_server_port = $request->input('api_server_port');
            $data->main_server_address = $request->input('main_server_address');
            $data->service_id = $request->input('service_id');

        }

        if ($request->file('logo')){
            Storage::delete($data->logo);
            $data->logo = $request->file('logo')->storeAs('public/logo',$request->file('logo')->getClientOriginalName());
        }

        if ($request->file('icon')){
            Storage::delete($data->icon);
            $data->icon = $request->file('icon')->storeAs('public/icon',$request->file('icon')->getClientOriginalName());
        }

        $data->map_link = $request->map_link;
        $data->save();

        return redirect(route('admin_settings_index'));
    }
}
