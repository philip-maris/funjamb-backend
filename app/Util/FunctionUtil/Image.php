<?php

namespace App\Util\FunctionUtil;

use Illuminate\Support\Facades\URL;

trait Image
{
    public function image_upload($request,$imageName ){
        if (!$request->hasFile("{$imageName}")){
            alert("error", "Invalid image");
            return back();
        }else{
//            $files = $request->file("{$imageName}");
//
//            foreach ($files as $multipleImage){
////                $productImage = $request->file('productImage');
//                $fileName = time().'_'.$multipleImage->getClientOriginalName();
////                $img = Image::make($multipleImage->path());
////                $img->resize(200, 200)->save(public_path('storage/uploads/'. $fileName));
//                $multipleImage->move(public_path("storage/uploads"), $fileName);
//                $productImage =  $product->productImage()->create([
//                    "productImageUrl"=>URL::asset("storage/uploads/$fileName"),
//                ]);
//            }
        }
    }




}
