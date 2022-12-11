@extends('v1.layout.dash-layout')
@section('content')
    {{--    todo breadcumb--}}
    {{--    <x-breadcumb.base-breadcumb :routeName="$routeName"></x-breadcumb.base-breadcumb>--}}
    <section class="section">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-left justify-content-between">
                            <h5 class="card-title">Add Delivery</h5>
                            <a href="{{route("categories")}}"
                               class="btn btn-secondary h-25 mt-2">
                                <i class="bi bi-arrow-left"></i>
                                <span>Back</span>
                            </a>
                        </div>

                        <form class="row g-3"
                              action="{{route('updateCategory')}}"
                              method="post"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="col-md-6 m-auto">
                                <label for="brandName" class="form-label">Category Name</label>
                                <input type="hidden" name="categoryId" value="{{$category->categoryId}}" class="form-control" id="brandName">
                                <input type="text" name="categoryName" value="{{$category->categoryName}}" class="form-control" id="brandName">
                                @error('categoryName')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
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
