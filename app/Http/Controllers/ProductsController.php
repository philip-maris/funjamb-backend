<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\ReadByProductIdRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Service\ProductService;
use Illuminate\Http\JsonResponse;

class ProductsController extends Controller
{
    public function __construct(protected ProductService $productService){
        //todo code here
    }

    public function create(CreateProductRequest $request): JsonResponse
    {
        return $this->productService->create($request);
    }
    public function update(UpdateProductRequest $request): JsonResponse
    {
        return $this->productService->update($request);
    }
    public function read(): JsonResponse
    {
        return $this->productService->read();
    }
    public function readById(ReadByProductIdRequest $request): JsonResponse
    {
        return $this->productService->readById($request);
    }
    public function delete(ReadByProductIdRequest $request): JsonResponse
    {
        return $this->productService->delete($request);
    }
}
