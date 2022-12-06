@extends('v1.layout.dash-layout')
@section('content')
    {{--todo breadcumb--}}
{{--    <x-breadcumb.base-breadcumb :routeName="$routeName"></x-breadcumb.base-breadcumb>--}}
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="alert alert-success d-none" id="success"></div>
                    <div class="card-body">
                        <div class="d-flex align-left justify-content-between">
                            <h5 class="card-title">Products</h5>
                            <a href="{{route("addProduct")}}"
                                 class="btn btn-secondary h-25 mt-2">
                                <i class="bi bi-plus-circle"></i>
                                <span>Add</span>
                            </a>
                        </div>

                        <!-- Table with stripped rows -->
                        <div class="overflow-auto">
                            <table class="table  datatable ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">SellingPrice</th>
                                    <th scope="col">OfferPrice</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody class="tbody">
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td scope="row">{{$key + 1}}</td>
                                        <td>{{$product['productName']}}</td>
                                        <td>{{$product['productSlug']}}</td>
                                        <td>
                                            <img style="height: 150px; width: 50px;" src="{{$product['productImage']}}">
                                        </td>
                                        <td>{{$product['productSellingPrice']}}</td>
                                        <td>{{$product['productOfferPrice']}}</td>
                                        <td>{{$product['productQuantity']}}</td>
                                        <td>{{$product['productDiscount']}}</td>
                                        <td>{{$product['productStatus']}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a
                                                    href="{{route("editProduct",["productId"=>$product['productId']])}}"
                                                    class="btn btn-primary ">
                                                    Edit
                                                </a>
                                                <a
                                                    href="{{route("deleteProduct", ["id"=>$product['productId']])}}"
                                                    class="btn btn-danger ">
                                                    Delete
                                                </a>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
