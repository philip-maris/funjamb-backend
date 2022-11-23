<?php

namespace App\Service\Vi\Web;

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
}
