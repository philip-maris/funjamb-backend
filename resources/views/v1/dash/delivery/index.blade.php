@extends('v1.layout.dash-layout')
@section('content')
    {{--todo breadcumb--}}
    {{--    <x-breadcumb.base-breadcumb :routeName="$routeName"></x-breadcumb.base-breadcumb>--}}
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-left justify-content-between">
                            <h5 class="card-title">Deliveries</h5>
                            <a  href="{{route("addDelivery")}}"
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
                                <th scope="col">State</th>
                                <th scope="col">Town</th>
                                <th scope="col">Fee</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deliveries as $key => $delivery)
                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <td>{{$delivery['deliveryState']}}</td>
                                    <td>{{$delivery['deliveryTown']}}</td>
                                    <td>{{$delivery['deliveryFee']}}</td>
                                    <td>{!! $delivery['deliveryDescription'] !!}</td>
                                    <td>{{$delivery['deliveryStatus']}}</td>
                                    <td>
                                        <a href="{{route("editDelivery",["deliveryId"=>$delivery['deliveryId']])}}"
                                           class="btn btn-primary btn-sm edit">
                                            Edit
                                        </a>
                                        <a href="{{route("deleteDelivery",["deliveryId"=>$delivery['deliveryId']])}}"
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


