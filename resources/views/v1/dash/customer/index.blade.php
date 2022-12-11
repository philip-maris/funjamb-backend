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

                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">FirstName</th>
                                <th scope="col">LastName</th>
                                <th scope="col">Email</th>
                                <th scope="col">PhoneNo</th>
                                <th scope="col">State</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @foreach($customers as $key => $customer)
                                <tr>
                                    <td scope="row">{{$key + 1}}</td>
                                    <td>{{$customer['customerFirstName']}}</td>
                                    <td>{{$customer['customerLastName']}}</td>
                                    <td>{{$customer['customerEmail']}}</td>
                                    <td>{{$customer['customerPhoneNo'] }}</td>
                                    <td>{{$customer['customerState'] ?? "Null"}}</td>
                                    <td>{{$customer['customerStatus']}}</td>
                                    <td>
                                        <a href="{{route("editCustomer", ['customerId'=>$customer['customerId']])}}"
                                           class="btn btn-primary btn-sm edit">
                                            View
                                        </a>
                                        <a href="{{route("deleteCustomer", ["customerId"=>$customer['customerId']])}}"
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
