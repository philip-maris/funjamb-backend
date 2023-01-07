<?php

namespace App\Service\V1\Web;

use App\Http\Requests\V1\Api\Banner\CreateBannerRequest;
use App\Http\Requests\V1\Api\Banner\UpdateBannerRequest;
use App\Models\V1\Banner;
use Illuminate\Support\Facades\URL;

class BannerService
{
    public function index(){
        $banners = Banner::all();
        return view("v1.dash.banner.index", compact("banners"));
    }

    public function create(){
        return view("v1.dash.banner.add");
    }

    public function store(CreateBannerRequest $createBannerRequest){
        $createBannerRequest->validated();
        /*todo check if file exist */
        if (!$createBannerRequest->hasFile('bannerImage')){
            alert("error", "Invalid image");
            return back();
        }else{
            $file = $createBannerRequest->file('bannerImage');
                $fileName = time().'_'.$file->getClientOriginalName();
//                $img = Image::make($multipleImage->path());
//                $img->resize(200, 200)->save(public_path('storage/uploads/'. $fileName));
            $file->move(public_path("storage/banner"), $fileName);

        }
        $banner = Banner::create(array_merge($createBannerRequest->all(), ["bannerImage"=>URL::asset("storage/banner/$fileName")]));
        if (!$banner){
            alert("error", "unable to create banner", "error");
            return back();
        }

        alert("success", "created successful", "success");
        return back();
    }

    public function edit($bannerId){
        $banner = Banner::find($bannerId);
        if (!$banner){
            alert("error", "unable to locate banner", "error");
            return back();
        }

        return view("v1.dash.banner.edit", compact("banner"));
    }

    public function update(UpdateBannerRequest $updateBannerRequest){
        $updateBannerRequest->validated();


    }

}
