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
                            <h5 class="card-title">Questions</h5>
                            <a  href="{{route("addQuestion")}}"
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
                                <th scope="col">Question</th>
                                <th scope="col">optionA</th>
                                <th scope="col">optionB</th>
                                <th scope="col">optionC</th>
                                <th scope="col">optionD</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Question Type</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $key => $question)
                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <td>{{$question['question']}}</td>
                                    <td>{{$question['optionA']}}</td>
                                    <td>{{$question['optionB']}}</td>
                                    <td>{{$question['optionC']}}</td>
                                    <td>{{$question['optionD']}}</td>
                                    <td>{{$question['answer']}}</td>
                                    <td>{{$question['questionType']}}</td>
                                    <td>
                                        <a href="{{route("editQuestion",["questionId"=>$question['questionId']])}}"
                                                 class="btn btn-primary btn-sm edit">
                                            Edit
                                        </a>
                                        <a href="{{route("deleteQuestion",["questionId"=>$question['questionId']])}}"
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


