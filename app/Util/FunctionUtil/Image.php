<?php

namespace App\Util\FunctionUtil;

trait Image
{
    public function image_upload($request,$imageName, ){
        $image = $request->file('productImage');
        if (!$request->hasFile("{$imageName}")){
            alert("", "image doest not exit", "error");
            return back();
        }

        $fileName = time().'_'.$image->getClientOriginalName();
    }




}
