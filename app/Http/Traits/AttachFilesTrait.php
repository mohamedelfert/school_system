<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{

    public function uploadFile($request,$name,$folder)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('attachments/'.$folder.'/',$file_name,'upload_attach_path');
    }

    public function deleteFile($name,$folder)
    {
        $file_exist = Storage::disk('upload_attach_path')->exists('attachments/library/'.$name);
        if ($file_exist){
            Storage::disk('upload_attach_path')->delete('attachments/'.$folder.'/'.$name);
        }
    }

}
