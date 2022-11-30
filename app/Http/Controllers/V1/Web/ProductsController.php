<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Product\CreateProductRequest;
use App\Http\Requests\V1\Api\Product\UpdateProductRequest;
use App\Service\Vi\Web\ProductService;

class ProductsController extends Controller
{
    public function __construct(public ProductService $productService){

    }
    public function index(){
        return $this->productService->index();
    }

    public function create(){
        return $this->productService->create();
    }

    public function store(CreateProductRequest $request){
        return $this->productService->store($request);
    }

    public function edit($productId){
//        dd($productId);
        return $this->productService->edit($productId);
    }

    public function update(UpdateProductRequest $request){
        return $this->productService->update($request);
    }

    public function delete($id){
        return $this->productService->delete($id);
    }

}
