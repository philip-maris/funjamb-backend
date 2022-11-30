<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Brand\CreateBrandRequest;
use App\Http\Requests\V1\Api\Brand\UpdateBrandRequest;
use App\Service\Vi\Web\BrandService;

class BrandsController extends Controller
{
    public function __construct(public BrandService $brandService){

    }

    public function index(){
        return $this->brandService->index();
    }

    public function show(){
        return $this->brandService->show();
    }

    public function create(CreateBrandRequest $request){
        return $this->brandService->create($request);
    }

    public function edit($brandId){
        return $this->brandService->edit($brandId);
    }

    public function update(UpdateBrandRequest $brandRequest){
        return $this->brandService->update($brandRequest);
    }

    public function delete($brandId){
        return $this->brandService->delete($brandId);
    }
}
