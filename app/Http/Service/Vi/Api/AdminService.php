<?php

namespace App\Http\Service\Vi\Api;

use App\Http\Controllers\V1\BrandsController;
use App\Models\V1\Brand;
use App\Models\V1\Category;
use App\Util\ListUtil\SidebarListUtil;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class AdminService
{
    use SidebarListUtil;

    public ?string $currentRouteName;

    /*todo constructor */
    public function __construct(
        protected CategoryService $categoryService,
        protected BrandsController $brandsController,
    )
    {
        $this->currentRouteName = Route::currentRouteName();
    }

    /*todo overview*/
    public function overview(): Factory|View|Application
    {
        return view('admin.dashboard.Index', [
            'sidebar'=>$this->sidebarList, 'routeName'=>$this->currentRouteName
        ]);
    }

    /*todo products*/
    public function products(): Factory|View|Application
    {
        return view('admin.product.Index',[
            'sidebar'=>$this->sidebarList,
            'routeName'=>$this->currentRouteName
        ]);
    }

    /*todo add products*/
    public function addProduct(): Factory|View|Application
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.add', [
            'sidebar'=>$this->sidebarList,
            'routeName'=>$this->currentRouteName,
            'categories'=>$categories,
            'brands'=>$brands,
        ]);
    }
    /*todo orders*/
    public function orders(): Factory|View|Application
    {
        return view('admin.orderView');
    }


    /*todo staff*/
    public function staffs(): Factory|View|Application
    {
        return view('admin.staffView');
    }

    /*todo delivery*/
    public function deliveries(): Factory|View|Application
    {
        return view('admin.deliveryView');
    }


    /*todo brands*/
    public function brands(): Factory|View|Application
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.Index',[
            'sidebar'=>$this->sidebarList,
            'routeName'=>$this->currentRouteName,
            'brands'=>$brands
        ]);
    }

    /*todo category*/
    public function categories(): Factory|View|Application
    {
        $categories = Category::latest()->get();
        return view('admin.category.Index',  [
            'sidebar'=>$this->sidebarList,
            'routeName'=>$this->currentRouteName,
            'categories'=>$categories,
        ]);
    }

    /*todo view customer*/
    public function customers(): Factory|View|Application
    {
        return view('admin.customerView');
    }

}
