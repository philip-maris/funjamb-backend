@extends("v1.layout.dash-layout")
@section("content")
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Sales</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>0</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Revenue</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-save"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>₦0</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Customers</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>0</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->


                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

{{--                            <div class="filter">--}}
{{--                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
{{--                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
{{--                                    <li class="dropdown-header text-start">--}}
{{--                                        <h6>Filter</h6>--}}
{{--                                    </li>--}}

{{--                                    <li><a class="dropdown-item" href="#">Today</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">This Month</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">This Year</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}

                            <div class="card-body">
                                <h5 class="card-title">Recent Sales {{--<span>| Today</span>--}}</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row"><a href="#">#2457</a></th>
                                        <td>Brandon Jacob</td>
                                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                        <td>₦64</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

{{--                    <!-- Top Selling -->--}}
{{--                    <div class="col-8">--}}
{{--                        <div class="card top-selling overflow-auto">--}}

{{--                            <div class="filter">--}}
{{--                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
{{--                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
{{--                                    <li class="dropdown-header text-start">--}}
{{--                                        <h6>Filter</h6>--}}
{{--                                    </li>--}}

{{--                                    <li><a class="dropdown-item" href="#">Today</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">This Month</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">This Year</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}

{{--                            <div class="card-body pb-0">--}}
{{--                                <h5 class="card-title">Top Selling <span>| Today</span></h5>--}}

{{--                                <table class="table table-borderless">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">Preview</th>--}}
{{--                                        <th scope="col">Product</th>--}}
{{--                                        <th scope="col">Price</th>--}}
{{--                                        <th scope="col">Sold</th>--}}
{{--                                        <th scope="col">Revenue</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>--}}
{{--                                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas--}}
{{--                                                nulla</a></td>--}}
{{--                                        <td>$64</td>--}}
{{--                                        <td class="fw-bold">124</td>--}}
{{--                                        <td>$5,828</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>--}}
{{--                                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique--}}
{{--                                                doloremque</a></td>--}}
{{--                                        <td>$46</td>--}}
{{--                                        <td class="fw-bold">98</td>--}}
{{--                                        <td>$4,508</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>--}}
{{--                                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a>--}}
{{--                                        </td>--}}
{{--                                        <td>$59</td>--}}
{{--                                        <td class="fw-bold">74</td>--}}
{{--                                        <td>$4,366</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>--}}
{{--                                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum--}}
{{--                                                error</a></td>--}}
{{--                                        <td>$32</td>--}}
{{--                                        <td class="fw-bold">63</td>--}}
{{--                                        <td>$2,016</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>--}}
{{--                                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus--}}
{{--                                                repellendus</a></td>--}}
{{--                                        <td>$79</td>--}}
{{--                                        <td class="fw-bold">41</td>--}}
{{--                                        <td>$3,239</td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}

{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div><!-- End Top Selling -->--}}

                </div>
            </div><!-- End Left side columns -->

{{--            <!-- Right side columns -->--}}
{{--            <div class="col-lg-4">--}}

{{--                <!-- Recent Activity -->--}}
{{--                <div class="card">--}}
{{--                    <div class="filter">--}}
{{--                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
{{--                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
{{--                            <li class="dropdown-header text-start">--}}
{{--                                <h6>Filter</h6>--}}
{{--                            </li>--}}

{{--                            <li><a class="dropdown-item" href="#">Today</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">This Month</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">This Year</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title">Recent Activity <span>| Today</span></h5>--}}

{{--                        <div class="activity">--}}

{{--                            <div class="activity-item d-flex">--}}
{{--                                <div class="activite-label">32 min</div>--}}
{{--                                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>--}}
{{--                                <div class="activity-content">--}}
{{--                                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae--}}
{{--                                </div>--}}
{{--                            </div><!-- End activity item-->--}}

{{--                            <div class="activity-item d-flex">--}}
{{--                                <div class="activite-label">56 min</div>--}}
{{--                                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>--}}
{{--                                <div class="activity-content">--}}
{{--                                    Voluptatem blanditiis blanditiis eveniet--}}
{{--                                </div>--}}
{{--                            </div><!-- End activity item-->--}}

{{--                            <div class="activity-item d-flex">--}}
{{--                                <div class="activite-label">2 hrs</div>--}}
{{--                                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>--}}
{{--                                <div class="activity-content">--}}
{{--                                    Voluptates corrupti molestias voluptatem--}}
{{--                                </div>--}}
{{--                            </div><!-- End activity item-->--}}

{{--                            <div class="activity-item d-flex">--}}
{{--                                <div class="activite-label">1 day</div>--}}
{{--                                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>--}}
{{--                                <div class="activity-content">--}}
{{--                                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a>--}}
{{--                                    tempore--}}
{{--                                </div>--}}
{{--                            </div><!-- End activity item-->--}}

{{--                            <div class="activity-item d-flex">--}}
{{--                                <div class="activite-label">2 days</div>--}}
{{--                                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>--}}
{{--                                <div class="activity-content">--}}
{{--                                    Est sit eum reiciendis exercitationem--}}
{{--                                </div>--}}
{{--                            </div><!-- End activity item-->--}}

{{--                            <div class="activity-item d-flex">--}}
{{--                                <div class="activite-label">4 weeks</div>--}}
{{--                                <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>--}}
{{--                                <div class="activity-content">--}}
{{--                                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas--}}
{{--                                </div>--}}
{{--                            </div><!-- End activity item-->--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div><!-- End Recent Activity -->--}}
{{--            </div><!-- End Right side columns -->--}}

        </div>
    </section>
@endsection
