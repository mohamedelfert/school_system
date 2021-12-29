<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $title    = 'مدرستي - الاعدادات';
        $settings = Setting::findOrFail(1);
        return view('settings.show',compact('title','settings'));
    }

    public function update(Request $request)
    {
        $setting                    = Setting::findOrFail($request->id);
        $setting->school_name       = $request->school_name;
        $setting->school_title      = $request->school_title;
        $setting->phone             = $request->phone;
        $setting->address           = $request->address;
        $setting->school_email      = $request->school_email;
        $setting->current_session   = $request->current_session;
        $setting->end_first_term    = $request->end_first_term;
        $setting->end_second_term   = $request->end_second_term;

        // check if request has logo or not
        if ($request->hasFile('logo')){

            // delete old file
            $logo_exist = Storage::disk('upload_attach_path')->exists('attachments/logo/'.$setting->logo);
            if ($logo_exist){
                Storage::disk('upload_attach_path')->delete('attachments/logo/'.$setting->logo);
            }

            // upload new file
            $file_name = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('attachments/logo/',$file_name,'upload_attach_path');

            // get new file name
            $new_file_name   = $request->file('logo')->getClientOriginalName();
            // check if file name is new or not
            $setting->logo = $setting->logo != $new_file_name ? $new_file_name : $setting->logo;

        }

        $setting->update();

        toastr()->success(trans('messages.update'));
        return back();
    }
}
