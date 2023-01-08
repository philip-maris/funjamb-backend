@extends('v1.layout.dash-layout')
@section('content')
    {{--    todo breadcumb--}}
    {{--    <x-breadcumb.base-breadcumb :routeName="$routeName"></x-breadcumb.base-breadcumb>--}}
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success d-none" id="success"></div>
                <div class="alert alert-danger d-none" id="error"></div>
                <div class="card">
                    <div class="alert alert-success d-none" id="success"></div>
                    <div class="card-body">
                        <div class="d-flex align-left justify-content-between">
                            <h5 class="card-title">Add Banner</h5>
                            <a href="{{route("banners")}}"
                               class="btn btn-secondary h-25 mt-2">
                                <i class="bi bi-arrow-left"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <form class="row g-3"
                              action="{{route('updateBanner')}}"
                              method="post"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            <input type="hidden" value="{{$banner->bannerId}}" name="bannerId" class="form-control" id="bannerId">

                            <div class="col-6">
                                <label for="bannerType" class="form-label">Banner Type</label>
                                <select id="bannerType" name="bannerType"  class="form-select">
                                    <option value="">select an option</option>
                                    <option @selected($banner->bannerType == "hero") value="hero">hero</option>
                                    <option @selected($banner->bannerType == "select1") value="select1">select1</option>
                                    <option @selected($banner->bannerType == "select2") value="select2">select2</option>
                                </select>
                                @error('bannerType')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="bannerImage" class="form-label">Banner Image</label>
                                <input type="file" value="{{old("bannerImage")}}" name="bannerImage" class="form-control" id="bannerImage">
                                @error('bannerImage')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                                <div style="width: 50px; height: 150px; display: inline-block">
                                    <img style="width: 100%; height: 100%" src="{{$banner->bannerImage}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="bannerSubTitle" class="form-label" id="productDescription">Banner SubTitle (optional)</label>
                                @error('bannerSubTitle')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                                <textarea name="bannerSubTitle" id="bannerSubTitle"
                                          class="tinymce-editor">
                                    {{old("bannerSubTitle")}}
                                </textarea>
                            </div>

                            <div class="col-12">
                                <label for="inputCity" class="form-label" id="bannerTitle">Banner Title (optional)</label>
                                @error('bannerTitle')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                                <textarea name="bannerTitle" id="bannerTitle"
                                          class="tinymce-editor">
                                    {{old("bannerTitle")}}
                                </textarea>
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
