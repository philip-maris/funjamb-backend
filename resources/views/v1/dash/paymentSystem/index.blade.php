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
                            <h5 class="card-title">Payment System</h5>
                            <a  href="{{route("createPaymentSystem")}}"
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
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paymentSystems as $key => $paymentSystem)
                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <td>{{$paymentSystem['paymentSystemType']}}</td>
                                    <td>{{$paymentSystem['paymentSystemStatus']}}</td>
                                    <td>
                                        <a href="{{route("editPaymentSystem",["paymentSystemId"=>$paymentSystem['paymentSystemId']])}}"
                                           class="btn btn-primary btn-sm edit">
                                            Edit
                                        </a>
                                        <a href="{{route("deletePaymentSystem",["paymentSystemId"=>$paymentSystem['paymentSystemId']])}}"
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


