<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Service\Vi\Web\BrandService;

class BrandsController extends Controller
{
    public function __construct(public BrandService $brandService){

    }

    public function index(){
        return $this->brandService->index();
    }
}
