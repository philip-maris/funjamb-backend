<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Category\CreateCategoryRequest;
use App\Http\Requests\V1\Api\Category\UpdateCategoryRequest;
use App\Service\V1\Web\CategoryService;

class CategoriesController extends Controller
{

    public function __construct(public CategoryService $categoryService){
        $this->middleware("auth");
    }

    public function index(){
        return $this->categoryService->index();
    }

    public function show(){
        return $this->categoryService->show();
    }

    public function create(CreateCategoryRequest $request){
        return $this->categoryService->create($request);
    }

    public function edit($categoryId){
        return $this->categoryService->edit($categoryId);
    }

    public function update(UpdateCategoryRequest $categoryRequest){
//        dd("hello");
        return $this->categoryService->update($categoryRequest);
    }

    public function delete($categoryId){
        return $this->categoryService->delete($categoryId);
    }
}
