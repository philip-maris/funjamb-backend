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
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">productName</th>
                                <th scope="col">productSlug</th>
                                <th scope="col">productImage</th>
                                <th scope="col">productSellingPrice</th>
                                <th scope="col">productOfferPrice</th>
                                <th scope="col">productDiscount</th>
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
                                    <td>{{$product['productDiscount']}}</td>
                                    <td>{{$product['productStatus']}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a
                                                href="{{route("editProduct",["id"=>$product['productId']])}}"
                                                class="btn btn-primary ">
                                                Edit
                                            </a>
                                            <a
                                                value="{{$product['categoryId']}}"
                                                class="btn btn-danger  delete">
                                                Delete
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
        @include('components.modal.CategoryModal')
    </section>
@endsection
@section('scripts')
    <script>

        $(document).ready(function () {

            const addCategoryForm = $('#addCategoryForm')
            const updateCategoryForm = $('#updateCategoryForm')
            //todo add submit
            addCategoryForm.on('submit', function (e) {
                e.preventDefault()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    type: addCategoryForm.attr('method'),
                    url: addCategoryForm.attr('action'),
                    data: addCategoryForm.serialize(),
                    success: (response) => {
                        $('#error').addClass('d-none')
                        if (response.responseCode === "200") {

                            $('#success').removeClass('d-none').text(response.responseMessage)
                            $('#addCategory').modal('hide')
                            addCategoryForm.trigger('reset')
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
