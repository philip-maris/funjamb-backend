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
                                <th scope="col">TotalPlayed</th>
                                <th scope="col">Score</th>
                                <th scope="col">Last Played at</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @foreach($users as $key => $user)
                                <tr>
                                    <td scope="row">{{$key + 1}}</td>
                                    <td>{{$user['firstName']}}</td>
                                    <td>{{$user['lastName']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{$user['totalPlayed'] }}</td>
                                    <td>{{$user['score'] }}</td>
                                    <td>{{date("m/d/y",strtotime($user['lastPlayedAt']))}}</td>
{{--                                    <td>{{$user['userState'] ?? "Null"}}</td>--}}
                                    <td>{{$user['userStatus']}}</td>
                                    <td>
                                        <a href="{{route("editUser", ['userId'=>$user['userId']])}}"
                                           class="btn btn-primary btn-sm edit">
                                            View
                                        </a>
                                        <a href="{{route("deleteUser", ["userId"=>$user['userId']])}}"
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
