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
                            <h5 class="card-title">Add Staff</h5>
                            <a href="{{route("staffs")}}"
                               class="btn btn-secondary h-25 mt-2">
                                <i class="bi bi-arrow-left"></i>
                                <span>Back</span>
                            </a>
                        </div>

                        <form class="row g-3"

                              action="{{route('createStaff')}}"
                              method="post"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="col-md-6 m-auto">
                                <label for="customerFirstName" class="form-label">First Name</label>
                                <input type="text" name="staffFirstName" class="form-control" id="brandName">
                                @error('staffFirstName')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 m-auto">
                                <label for="brandName" class="form-label">Last Name</label>
                                <input type="text" name="staffLastName" class="form-control" id="brandName">
                                @error('staffLastName')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 m-auto">
                                <label for="staffPhoneNo" class="form-label">Phone No</label>
                                <input type="tel" name="staffPhoneNo" class="form-control" id="staffPhoneNo">
                                @error('staffPhoneNo')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 m-auto">
                                <label for="brandName" class="form-label">Email</label>
                                <input type="email" name="staffEmail" class="form-control" id="brandName">
                                @error('staffEmail')
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
