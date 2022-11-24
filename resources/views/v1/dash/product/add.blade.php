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
                                <input type="text" name="productName" class="form-control" id="productName">
                                @error('productName')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="productCategoryId" class="form-label">Category</label>
                                <select id="productCategoryId" name="productCategoryId" class="form-select">
                                    <option selected>Choose...</option>
                                    @foreach($categories as $key => $category)
                                        <option value="{{ $category['categoryId'] }}">{{ $category['categoryName'] }}</option>
                                    @endforeach
                                </select>
                                @error('productCategoryId')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="productBrandId" class="form-label">Brand</label>
                                <select id="productBrandId" name="productBrandId" class="form-select">
                                    <option selected>Choose...</option>
                                    @foreach($brands as $key => $brand)
                                        <option value="{{ $brand['brandId'] }}">{{ $brand['brandName'] }}</option>
                                    @endforeach
                                </select>
                                @error('productBrandId')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="productSellingPrice" class="form-label">Product Selling Price</label>
                                <input type="text" name="productSellingPrice" class="form-control"
                                       id="productSellingPrice" placeholder="0.00">
                                @error('productSellingPrice')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="productOfferPrice" class="form-label">Product Offer Price</label>
                                <input type="text" name="productOfferPrice" class="form-control" id="productOfferPrice"
                                       placeholder="0.00">
                                @error('productOfferPrice')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="productQuantity" class="form-label">Product Quantity</label>
                                <input type="text" class="form-control" name="productQuantity" id="productQuantity"
                                       placeholder="0">
                                @error('productQuantity')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="productImage" class="form-label">Product Image</label>
                                <input type="file" name="productImage" class="form-control" id="productImage">
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
                                          class="tinymce-editor"></textarea>

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
@section('scripts')
    <script>
        $(document).ready(function () {

            const addProductForm = $('#addProductForm')
            //todo add submit
            addProductForm.on('submit', function (e) {
                e.preventDefault()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    type: addProductForm.attr('method'),
                    url: addProductForm.attr('action'),
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        $('#error').addClass('d-none')
                        if (response.responseCode === "200") {
                            swal({
                                title: "Good job!",
                                text: response.responseMessage,
                                icon: "success",
                            });
                            $('#success').removeClass('d-none').text(response.responseMessage)
                            // console.log(response.responseMessage)
                            addProductForm.trigger('reset')
                            setTimeout(() => {
                                $('#success').addClass('d-none').text("")
                            }, 3000)
                        } else {
                            $('#error').removeClass('d-none').text(response.responseMessage)
                        }

                    },
                    error: (error) => {
                        $('#success').addClass('d-none').text("")
                        $('#error').removeClass('d-none')
                        swal({
                            title: "Good job!",
                            html: `${
                                $.each(error.responseJSON.errors, (key, value) => {
                                  return value
                                })
                            }`,
                            icon: "success",
                        });
                        // $.each(error.responseJSON.errors, (key, value) => {
                        //     $('#error').append(`
                        //         <p>${value}</p>
                        //     `)
                        // })
                        console.log("error")
                        console.log(JSON.stringify(error.responseJSON))
                    }

                })
            })
            //todo fetch category by id
            $('.edit').on('click', function (e) {
                e.preventDefault()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                const data = {
                    categoryId: $(this).val()
                }
                $('#updateCategory').modal('show')
                $.ajax({
                    type: 'POST',
                    url: '{{route('readByIdCategory')}}',
                    data: data,
                    success: (response) => {
                        if (response.responseCode === 200) {
                            console.log(response.data)
                            $('#categoryName').val(response.data.categoryName)
                            $('#categoryId').val(response.data.categoryId)
                        } else {
                            $('#error').val(response.responseMessage)
                        }
                    }
                })

                console.log(data)
            })
            //todo edit submit
            updateCategoryForm.on('submit', function (e) {
                e.preventDefault()
                console.log(updateCategoryForm.serialize())
                $.ajax({
                    type: updateCategoryForm.attr('method'),
                    url: updateCategoryForm.attr('action'),
                    data: updateCategoryForm.serialize(),
                    success: (response) => {
                        $('#error').addClass('d-none')
                        if (response.responseCode === "200") {
                            $('#success').removeClass('d-none').text(response.responseMessage)
                            $('#updateCategory').modal('hide')
                            updateCategoryForm.trigger('reset')
                            setTimeout(() => {
                                $('#success').addClass('d-none').text("")
                                location.reload()
                            }, 3000)
                        }

                    },
                    error: (error) => {
                        $('#success').addClass('d-block')
                        $('#error').removeClass('d-none').text(error.responseJSON.message)
                    }
                })
            })
            //todo delete category by id
            $('.delete').on('click', function (e) {
                e.preventDefault()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                const data = {
                    categoryId: $(this).val()
                }

                $.ajax({
                    type: 'POST',
                    url: '{{route('deleteCategory')}}',
                    data: data,
                    success: (response) => {
                        $('#error').addClass('d-none')
                        if (response.responseCode === "200") {
                            console.log(response.data)
                            $('#success').removeClass('d-none').text(response.responseMessage)
                            setTimeout(() => {
                                $('#success').addClass('d-none').text("")
                                location.reload()
                            }, 3000)
                        } else {
                            $('#error').val(response.responseMessage)
                        }
                    }
                })

                console.log(data)
            })
        })
    </script>
@endsection
