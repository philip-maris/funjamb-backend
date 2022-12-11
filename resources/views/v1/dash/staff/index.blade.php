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
                            <a href="{{route("createStaff")}}"
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
                                    <th scope="col">FirstName</th>
                                    <th scope="col">LastName</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Admin</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody class="tbody">
                                @foreach($staffs as $key => $staff)
                                    <tr>
                                        <td scope="row">{{$key + 1}}</td>
                                        <td>{{$staff['customerFirstName']}}</td>
                                        <td>{{$staff['customerLastName']}}</td>
                                        <td>{{$staff['customerEmail']}}</td>
                                        <td>{{$staff['customerPhoneNo']}}</td>
                                        <td>{{$staff['isAdmin'] ? "yes" : "no" }}</td>
                                        <td>{{$staff['customerStatus']}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a
                                                    href="{{route("editStaff",["staffId"=>$staff['customerId']])}}"
                                                    class="btn btn-primary ">
                                                    Edit
                                                </a>
                                                <a
                                                    href="{{route("deleteStaff", ["staffId"=>$staff['customerId']])}}"
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
