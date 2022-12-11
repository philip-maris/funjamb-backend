@extends('v1.layout.dash-layout')
@section('content')
    {{--todo breadcumb--}}
{{--    <x-breadcumb.base-breadcumb :routeName="$routeName"></x-breadcumb.base-breadcumb>--}}
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success d-none" id="success"></div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-left justify-content-between">
                            <h5 class="card-title">Categories</h5>
                            <a href="{{route("addCategory")}}"
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
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @foreach($categories as $key => $category)
                                <tr>
                                    <td scope="row">{{$key + 1}}</td>
                                    <td>{{$category['categoryName']}}</td>
                                    <td>{{$category['categoryStatus']}}</td>
                                    <td>
                                        <a href="{{route("editCategory", ['categoryId'=>$category['categoryId']])}}"
                                                 class="btn btn-primary btn-sm edit">
                                            Edit
                                        </a>
                                        <a href="{{route("deleteCategory", ["categoryId"=>$category['categoryId']])}}"
                                                class="btn btn-danger btn-sm">
                                            Delete
                                        </a>
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
    </section>
@endsection
