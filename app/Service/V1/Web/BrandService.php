<?php

namespace App\Service\V1\Web;

use App\Http\Requests\V1\Api\Brand\CreateBrandRequest;
use App\Http\Requests\V1\Api\Brand\UpdateBrandRequest;
use App\Models\V1\Brand;

class BrandService
{
    public function index(){
        $brands = Brand::latest()->get();

        return view("v1.dash.brand.index", ["brands"=>$brands]);
    }

    public function show(){
        return view("v1.dash.brand.add");
    }

    public function create(CreateBrandRequest $createBrandRequest){
        $createBrandRequest->validated();
        $response = Brand::create($createBrandRequest->all());
        if (!$response) {
            alert("error", "Unable to create brand", "error");
            return back();
        }
        alert("success", "created successful", "success");
        return back();
    }

    public function edit($brandId){
       $brand = Brand::where("brandId", $brandId)->first();
       if (!$brand){
           alert("error", "brand doesnt exist", "error");

           return back();
       }
        return view("v1.dash.brand.edit", compact("brand"));
    }

    public function update(UpdateBrandRequest $updateBrandRequest){
       $validated = $updateBrandRequest->validated();
        $brand = Brand::where("brandId", $validated["brandId"])->first();
        if (!$brand){
            alert("error", "brand doesnt exist", "error");
            return back();
        };

        $response = $brand->update($updateBrandRequest->only("brandName"));
        if (!$response){
            alert("error", "Unable to update brand", "error");
            return back();
        }

        alert("success", "Brand updated successful", "success");
        return redirect()->route("brands");
    }

    public function delete($brandId){
        $brand = Brand::where("brandId", $brandId)->first();
        if (!$brand){
            alert("error", "brand not found", "error");
            return back();
        }

        if (!$brand->delete()){
            alert("error", "brand cannot be deleted", "error");
            return back();
        }

        alert("success", "brand deleted successful", "success");
        return back();
    }
}
