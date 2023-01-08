<?php

namespace App\Service\V1\Web;

use App\Http\Requests\V1\Api\Banner\CreateBannerRequest;
use App\Http\Requests\V1\Api\Banner\UpdateBannerRequest;
use App\Models\V1\Banner;
use App\Util\FunctionUtil\File;
use Illuminate\Support\Facades\URL;

class BannerService
{
    use File;
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
        $fileName = $this->image_upload($createBannerRequest, 'bannerImage', "storage/banner");
        if(!$fileName){
            alert("", "invalid image", "error");
            return back();
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
//        dd($updateBannerRequest->bannerId);
        $banner = Banner::find($updateBannerRequest->bannerId);
        if (!$banner){
            alert("error", "unable to locate banner", "error");
            return back();
        }

        /*todo check if file exist */
        $fileName = $this->image_upload($updateBannerRequest, 'bannerImage', "storage/banner");
//        dd($fileName);
        $updateBanner = $banner->update(array_merge($updateBannerRequest->all(), [
            "bannerImage"=> $fileName ? URL::asset("storage/banner/$fileName") : $banner->bannerImage,
        ]));

        if (!$updateBanner){
            alert("error", "unable to update banner", "error");
            return back();
        }

        return redirect()->route("banners");
    }

    public function delete($bannerId){
        $banner = Banner::find($bannerId);
        if (!$banner->delete()){
            alert("error", "unable to delete banner", "error");
            return back();
        }
        alert("", "delete successfully", "success");
        return back();
    }

}
