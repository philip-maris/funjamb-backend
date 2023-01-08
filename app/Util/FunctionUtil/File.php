<?php

namespace App\Util\FunctionUtil;

trait File
{
    public function image_upload($request, $name, $path){
        if (!$request->hasFile($name)){
            return false;
        }else{
            $file = $request->file($name);
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path($path), $fileName);
            return $fileName;
        }
    }
}
