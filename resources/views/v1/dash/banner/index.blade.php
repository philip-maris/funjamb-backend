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
                            <h5 class="card-title">Brands</h5>
                            <a  href="{{route("addBanner")}}"
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
                                <th scope="col">Image</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $key => $banner)
                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <td><img src="{{$banner['bannerImage']}}" style="width: 150px; height: 150px" ></td>
                                    <td>{{$banner['bannerType']}}</td>
                                    <td>{{$banner['brandStatus']}}</td>
                                    <td>
                                        <a href="{{route("editBanner",["bannerId"=>$banner['bannerId']])}}"
                                           class="btn btn-primary btn-sm edit">
                                            Edit
                                        </a>
                                        <a href="{{route("editBanner",["bannerId"=>$banner['bannerId']])}}"
                                           class="btn btn-danger btn-sm delete">
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


