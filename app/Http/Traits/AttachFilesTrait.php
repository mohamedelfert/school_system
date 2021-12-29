<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{

    public function uploadFile($request,$name)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('attachments/library/',$file_name,'upload_attach_path');
    }

    public function deleteFile($name)
    {
        $file_exist = Storage::disk('upload_attach_path')->exists('attachments/library/'.$name);
        if ($file_exist){
            Storage::disk('upload_attach_path')->delete('attachments/library/'.$name);
        }
    }

}
