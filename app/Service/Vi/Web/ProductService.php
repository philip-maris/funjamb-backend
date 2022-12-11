<?php

namespace App\Service\Vi\Web;

use App\Http\Requests\V1\Api\Product\CreateProductRequest;
use App\Http\Requests\V1\Api\Product\UpdateProductRequest;
use App\Models\V1\Brand;
use App\Models\V1\Category;
use App\Models\V1\Product;
use App\Util\ExceptionUtil\ExceptionUtil;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductService
{
    public function index(){
        $products = Product::where("productStatus", "Active")->get();
        return view("v1.dash.product.index", ["products"=>$products]);
    }

    public function create(){
        $brands = Brand::where("BrandStatus", "Active")->get();
        $categories = Category::where("CategoryStatus", "Active")->get();

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
            if (!$category){
                alert("error", "Unable to locate category", "error");
                return back();
            }

            $brand = Brand::find($request['productBrandId']);
            if (!$brand){
                alert("error", "Unable to locate brand", "error");
                return back();
            }

            /*todo check if file exist */
            if (!$request->hasFile('productImage')){
                alert("error", "Invalid image");
                return back();
            }

        $productImage = $request->file('productImage');
        $fileName = time().'_'.$productImage->getClientOriginalName();

        $img = Image::make($productImage->path());
         $img->resize(300, 300)->save(public_path('storage/uploads/'. $fileName));

            $productDiscount = 0;
            if ((integer)$validated['productOfferPrice'] !== 0 ){
                if ((integer)$validated['productSellingPrice'] == 0){
                    alert("error", "selling price is required", "error");
                    return back();
                }
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
            if (!$response){
                alert("error","unable to create product", "error");
                return back();
            }

            alert("success", "PRODUCT CREATED SUCCESSFUL", "success");
            return back();
    }

    public function edit($productId){
//        dd($id);
        $product = Product::where("productId", $productId)->first();
        $brands = Brand::where("BrandStatus", "Active")->get();
        $categories = Category::where("CategoryStatus", "Active")->get();

        if (!$product){
            alert("error", "cannot locate product", "error");
            return back();
        }
        return view("v1.dash.product.edit", compact("product", "brands", "categories"));
    }

    public function update(UpdateProductRequest $request){

            $request->validated();
            $product = Product::find($request['productId']);
            if (!$product){
                alert("error", "product not found", "error");
                return back();
            }
          //todo delete resize image
            $productImage = $request->file('productImage');
            $fileName = time().'_'.$productImage->getClientOriginalName();
            $img = Image::make($productImage->path());
            $img->resize(300, 300)->save(public_path('storage/uploads/'. $fileName));
            //todo delete file
            $basename =  File::basename($product->productImage);
            $file = File::delete(public_path("storage/uploads/". $basename));

            if (!$file){
                alert("error", "something went wrong");
                return back();
            }
          $response = $product->update(array_merge($request->except('productId'),[
                    'productStatus'=>'Active',
                    "productSlug"=> Str::slug($request['productName'], "_"),
                    'productImage'=> URL::asset("storage/uploads/$fileName"),
                ]));

            if (!$response){
                alert("error", "unable to update product", "error");
                return back();
            }

            alert("success", "Updated successful", "success");
           return redirect()->route("products");

    }

    public function delete($id){
        $product = Product::where("productId", $id)->first();

          $basename =  File::basename($product->productImage);

          if(!$product->delete()){
              $file = File::delete(public_path("storage/uploads/". $basename));

              if (!$file){
                  alert("error", "something went wrong");
                  return back();
              }
                alert("error", "Unable to delete product", "error");
              return back();
          }

          alert("success", "Deleted successful", "success");
        return redirect()->route("products");
    }
}
