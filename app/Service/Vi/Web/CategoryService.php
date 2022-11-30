<?php

namespace App\Service\Vi\Web;

use App\Http\Requests\V1\Api\Category\CreateCategoryRequest;
use App\Http\Requests\V1\Api\Category\UpdateCategoryRequest;
use App\Models\V1\Brand;
use App\Models\V1\Category;

class CategoryService
{
    public function index(){
        $category = Category::latest()->get();
//        dd($category);
        return view("v1.dash.category.index", [
            "categories"=>$category
        ]);
    }


    public function show(){
        return view("v1.dash.category.add");
    }

    public function create(CreateCategoryRequest $createCategoryRequest){
        $createCategoryRequest->validated();
        $response = Category::create($createCategoryRequest->all());
        if (!$response) {
            alert("error", "Unable to create category", "error");
            return back();
        }
        alert("success", "created successful", "success");
        return back();
    }

    public function edit($categoryId){
        $category = Category::where("categoryId", $categoryId)->first();
        if (!$category){
            alert("error", "category doesnt exist", "error");

            return back();
        }
        return view("v1.dash.category.edit", compact("category"));
    }

    public function update(UpdateCategoryRequest $updateCategoryRequest){
//        dd("hello");
        $validated = $updateCategoryRequest->validated();
        $category = Category::where("categoryId", $validated["categoryId"])->first();
        if (!$category){
            alert("error", "category doesnt exist", "error");
            return back();
        };

        $response = $category->update($updateCategoryRequest->only("categoryName"));
        if (!$response){
            alert("error", "Unable to update category", "error");
            return back();
        }

        alert("success", "Category updated successful", "success");
        return redirect()->route("categories");
    }

    public function delete($categoryId){
        $category = Category::where("categoryId", $categoryId)->first();
        if (!$category){
            alert("error", "category not found", "error");
            return back();
        }

        if (!$category->delete()){
            alert("error", "category cannot be deleted", "error");
            return back();
        }

        alert("success", "category deleted successful", "success");
        return back();
    }
}
