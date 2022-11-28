<?php

namespace App\Service\Vi\Web;

use App\Http\Requests\V1\Api\Product\CreateProductRequest;
use App\Http\Requests\V1\Api\Product\UpdateProductRequest;
use App\Models\V1\Brand;
use App\Models\V1\Category;
use App\Models\V1\Product;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductService
{
    public function index(){
        $products = Product::all();
        return view("v1.dash.product.index", ["products"=>$products]);
    }

    public function create(){
        $brands = Brand::all();
        $categories = Category::all();
        return view("v1.dash.product.add",[
            "brands"=>$brands,
            "categories"=>$categories,
        ]);
    }
    public function store( CreateProductRequest $request)
    {
            //TODO VALIDATION
            $validated =  $request->validated();

            $category = Category::find($request['productCategoryId']);
            if (!$category) return back()->with(["type"=>"success", "status"=> "Unable to locate category"]);

            $brand = Brand::find($request['productBrandId']);
            if (!$brand) return back()->with(["type"=>"success", "status"=> "Unable to locate brand"]);

            /*todo check if file exist */
            if (!$request->hasFile('productImage'))
                return back()->with(["type"=>"success", "status"=> "Invalid image"]);

        $productImage = $request->file('productImage');
        $fileName = time().'_'.$productImage->getClientOriginalName();

        $img = Image::make($productImage->path());
         $img->resize(200, 200)->save(public_path('storage/uploads/'. $fileName));


        //calculate product discount
            $productDiscount = 0;
            //dd((integer)$validated['productSellingPrice'] !== 0);
            if ((integer)$validated['productOfferPrice'] !== 0 ){
                if ((integer)$validated['productSellingPrice'] == 0)
                    return back()->with(["type"=>"error", "status"=> "selling price is required"]);

                $cal = (($validated['productSellingPrice'] - $validated['productOfferPrice']) / $validated['productSellingPrice']) * 100;
                $productDiscount =  $cal;
            }
            if (!isset($validated['productOfferPrice'])){
                $validated['productOfferPrice'] = 0;
            }
            $response = $category->products()->create(array_merge($validated, [
                'productImage'=> URL::asset("storage/uploads/$fileName"),
                "productSlug"=> Str::slug($request['productName'], "_"),
                "productDiscount"=> $productDiscount
            ]));
            if (!$response) return back()->with(["type"=>"error", "status"=> "unable to create product"]);

            return back()->with(["type"=>"success", "status"=> "PRODUCT CREATED SUCCESSFUL"]);
    }

    public function edit($id){
//        dd($id);
        $product = Product::where("productId", $id)->first();
        $brands = Brand::all();
        $categories = Category::all();
//        dd($product);
        if (!$product) return back()->with(["type"=>"error", "status"=>"cannot locate product"]);
        return view("v1.dash.product.edit", compact("product", "brands", "categories"));
    }

    public function update(UpdateProductRequest $request){

            //TODO VALIDATION
            $request->validated();


            $product = Product::find($request['productId']);
            if (!$product)  return back()->with(["type"=>"error", "status"=> "selling price is required"]);
            $response = $product->update(array_merge($request->except('productId'),
                ['productStatus'=>'ACTIVE']));
            if (!$response)  return back()->with(["type"=>"error", "status"=> "selling price is required"]);

               return back()->with(["type"=>"success", "status"=> "Updated successful"]);

    }
}
