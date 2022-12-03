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
                            <h5 class="card-title">Add Payment System</h5>
                            <a href="{{route("paymentSystems")}}"
                               class="btn btn-secondary h-25 mt-2">
                                <i class="bi bi-arrow-left"></i>
                                <span>Back</span>
                            </a>
                        </div>

                        <form class="row g-3"

                              action="{{route('createPaymentSystem')}}"
                              method="post"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="col-md-8 m-auto">
                                <label for="brandName" class="form-label">Type</label>
                                <input type="text" name="brandName" class="form-control" id="brandName">
                                @error('brandName')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-8 m-auto">
                                <label for="brandName" class="form-label">Url (Optional)</label>
                                <input type="text" name="brandName" class="form-control" id="brandName">
                                @error('brandName')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-8 m-auto">
                                <label for="brandName" class="form-label">Key (Optional)</label>
                                <input type="text" name="brandName" class="form-control" id="brandName">
                                @error('brandName')
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
