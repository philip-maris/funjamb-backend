<?php

namespace App\Http\Controllers\V1\Web;

use App\Service\Vi\Web\CategoryService;

class CategoriesController
{
    public function __construct(public CategoryService $categoryService){

    }

    public function index(){
        return $this->categoryService->index();
    }
}
