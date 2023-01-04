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
                            <h5 class="card-title">Add Delivery</h5>
                            <a href="{{route("deliveries")}}"
                               class="btn btn-secondary h-25 mt-2">
                                <i class="bi bi-arrow-left"></i>
                                <span>Back</span>
                            </a>
                        </div>

                        <form
                            class="row g-3"
                              action="{{route('addDelivery')}}"
                              method="post"
                              enctype="multipart/form-data"
                         >
                            @csrf
                            <div class="col-md-8 m-auto">
                                <label for="brandName" class="form-label">State</label>
                                <input type="text" value="{{old("deliveryState")}}" placeholder="Lagos" name="deliveryState" class="form-control" id="brandName">
                                @error('deliveryState')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-8 m-auto">
                                <label for="brandName" class="form-label">Fee</label>
                                <input type="number" value="{{old("deliveryFee")}}" name="deliveryFee" placeholder="0.00" class="form-control" id="brandName">
                                @error('deliveryFee')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-8 m-auto">
                                <label for="brandName" class="form-label">Fee</label>
                                <input type="number" value="{{old("deliveryTown")}}" name="deliveryTown" placeholder="0.00" class="form-control" id="brandName">
                                @error('deliveryTown')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-8 m-auto">
                                <label for="deliveryDescription" class="form-label">Description</label>
                                <textarea name="deliveryDescription" id="productDescription"
                                          class="tinymce-editor">
                                    {{old("deliveryDescription")}}
                                </textarea>
                                @error('deliveryDescription')
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
