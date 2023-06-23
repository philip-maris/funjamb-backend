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
                            <h5 class="card-title">Add Question</h5>
                            <a href="{{route("questions")}}"
                               class="btn btn-secondary h-25 mt-2">
                                <i class="bi bi-arrow-left"></i>
                                <span>Back</span>
                            </a>
                        </div>

                        <form class="row g-3"
                              action="{{route('createQuestion')}}"
                              method="post"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="col-md-8 m-auto pb-3">
                                <label for="question" class="form-label"> <b>Question</b></label>
                                <input type="text" name="question" class="form-control" id="question">
                                @error('question')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 m-auto pb-3">
                                <label for="questionType" class="form-label">Question Type</label>
                                <select id="questionType" name="questionType" class="form-select">
                                    <option value="">type</option>
                                    <option value="LEXIS">LEXIS</option>
                                    <option value="ORAL">ORAL</option>
                                </select>
                                @error('questionType')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div> <br>

                            <div class="col-md-12 m-auto pb-3">
                                <label for="instruction" class="form-label"><b>Question Instruction</b></label>
                                <input type="text" name="instruction" class="form-control" id="questionName">
                                @error('instruction')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 m-auto pb-3 ">
                                <label for="optionA" class="form-label"><b>Option A</b></label>
                                <input type="text" name="optionA" class="form-control" id="optionA">
                                @error('optionA')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 m-auto pb-3">
                                <label for="optionB" class="form-label"><b>Option B</b></label>
                                <input type="text" name="optionB"  class="form-control" id="optionB">
                                @error('optionB')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 m-auto pb-3">
                                <label for="optionC" class="form-label"><b>Option C</b></label>
                                <input type="text" name="optionC"  class="form-control" id="optionC">
                                @error('optionC')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 m-auto pb-3">
                                <label for="optionD" class="form-label"><b>Option D</b></label>
                                <input type="text" name="optionD" class="form-control" id="optionD">
                                @error('optionD')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-8 m-auto pb-3">
                                <label for="answer" class="form-label"><b>Answer</b></label>
                                <select id="answer" name="answer" class="form-select">
                                    <option value="">Choose</option>
                                    <option value="optionA">Option A</option>
                                    <option value="optionB">Option B</option>
                                    <option value="optionC">Option C</option>
                                    <option value="optionD">Option D</option>
                                </select>
                                @error('answer')
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
