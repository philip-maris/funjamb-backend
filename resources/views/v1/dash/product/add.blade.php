@extends('v1.layout.dash-layout')
@section('content')
{{--    todo breadcumb--}}
{{--    <x-breadcumb.base-breadcumb :routeName="$routeName"></x-breadcumb.base-breadcumb>--}}
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success d-none" id="success"></div>
                <div class="alert alert-danger d-none" id="error"></div>
                <div class="card">
                    <div class="alert alert-success d-none" id="success"></div>
                    <div class="card-body">
                        <div class="d-flex align-left justify-content-between">
                            <h5 class="card-title">Add Product</h5>
                            <a href="{{route("products")}}"
                                    class="btn btn-secondary h-25 mt-2">
                                <i class="bi bi-arrow-left"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        @if(session("status"))
                            <script>
                                swal({
                                    html: {{session("status")}},
                                    icon:{{session("type")}}
                                });
                            </script>
                        @endif
                        <form class="row g-3"

                              action="{{route('storeProduct')}}"
                              method="post"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="col-md-12">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" name="productName" value="{{old("productName")}}" class="form-control" id="productName">
                                @error('productName')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="productCategoryId" class="form-label">Category</label>
                                <select id="productCategoryId" name="productCategoryId" class="form-select">
                                    <option >Choose...</option>

                                    @foreach($categories as $key => $category)
                                        <option @selected(old("productCategoryId") == $category['categoryId']) value="{{ $category['categoryId'] }}">{{ $category['categoryName'] }}</option>
                                    @endforeach
                                </select>
                                @error('productCategoryId')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="productBrandId" class="form-label">Brand</label>
                                <select id="productBrandId" name="productBrandId" class="form-select">
                                    <option>Choose...</option>
                                    @foreach($brands as $key => $brand)
                                        <option @selected(old("productBrandId") == $brand['brandId']) value="{{ $brand['brandId'] }}">{{ $brand['brandName'] }}</option>
                                    @endforeach
                                </select>
                                @error('productBrandId')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="productSellingPrice" class="form-label">Product Selling Price</label>
                                <input type="text" name="productSellingPrice" class="form-control"
                                       value="{{old("productSellingPrice")}}"
                                       id="productSellingPrice" placeholder="0.00">
                                @error('productSellingPrice')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="productOfferPrice" class="form-label">Product Offer Price</label>
                                <input type="text" name="productOfferPrice" value="{{old("productOfferPrice")}}" class="form-control" id="productOfferPrice"
                                       placeholder="0.00">
                                @error('productOfferPrice')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="productQuantity" class="form-label">Product Quantity</label>
                                <input type="text" class="form-control" name="productQuantity" id="productQuantity" value="{{old("productQuantity")}}"
                                       placeholder="0">
                                @error('productQuantity')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="productImage" class="form-label">Product Image</label>
                                <input type="file" value="{{old("productImage")}}" name="productImage" class="form-control" id="productImage">
                                @error('productImage')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="inputCity" class="form-label" id="productDescription">Product
                                    Description</label>
                                @error('productDescription')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                                <textarea name="productDescription" id="productDescription"
                                          class="tinymce-editor">
                                    {{old("productDescription")}}
                                </textarea>

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
