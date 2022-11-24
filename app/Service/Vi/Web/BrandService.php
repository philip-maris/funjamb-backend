<?php

namespace App\Service\Vi\Web;

use App\Models\V1\Brand;

class BrandService
{
    public function index(){
        $brands = Brand::latest()->get();

        return view("v1.dash.brand.index", ["brands"=>$brands]);
    }
}
