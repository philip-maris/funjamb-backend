<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Service\V1\Api\AdminService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminsController extends Controller
{

    public function __construct(protected AdminService $adminService){
        //todo code here

    }
    //todo overview
    public function overview(): View|Factory|Application
    {
        return $this->adminService->overview();
    }
    //todo view products
    public function products(): View|Factory|Application
    {
        return $this->adminService->products();
    }
    //todo add view products
    public function addProduct(): View|Factory|Application
    {
        return $this->adminService->addProduct();
    }
    //todo view brands
    public function brands(): View|Factory|Application
    {
        return $this->adminService->brands();
    }

    //todo view categories
    public function categories(): View|Factory|Application
    {
        return $this->adminService->categories();
    }
    //todo view staffs
    public function staffs(): View|Factory|Application
    {
        return $this->adminService->staffs();
    }
   //todo view customer
    public function customers(): View|Factory|Application
    {
        return $this->adminService->customers();
    }
}
