@extends("v1.layout.auth-layout")
@section("content")
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="" class=" d-flex align-items-center">
                            <img src="{{asset("x-assets-x/img/Funjamb.svg")}}" style="width: 120px; height: 110px" alt="">
                            {{--                                                        <span class="d-none d-lg-block">{{str_replace('_', ' ', env("APP_NAME"))}}</span>--}}
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-2 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Sign In</h5>
                                {{--                                <p class="text-center small">Enter your username & password to login</p>--}}
                            </div>
                            <form action="" method="" class="row g-3">
                                @csrf
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{old('email')}}" id="yourPassword" >
                                    @error('email')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror

                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Details You Want to Delete</label>
                                    <input type="text" name="password" class="form-control" id="yourPassword" value="{{old('password')}}">
                                    @error('password')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="">Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
