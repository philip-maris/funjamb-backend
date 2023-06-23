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
                              action="{{route('updateQuestion')}}"
                              method="post"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="col-md-8 m-auto pb-3">
                                <label for="question" class="form-label"> <b>Question</b></label>
                                <input type="hidden" name="questionId" value="{{$question->questionId}}" class="form-control" id="questionName">
                                <input type="text" name="question" value="{{$question->question}}" class="form-control" id="questionName">
                                @error('question')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 m-auto pb-3">
                                <label for="questionType" class="form-label"><b>Question Type</b></label>
                                <select id="questionType" name="questionType" class="form-select">
                                    <option @if($question->questionType == "LEXIS") selected="selected" @endif value="LEXIS">LEXIS</option>
                                    <option @if($question->questionType == "ORAL") selected="selected" @endif value="ORAL">ORAL</option>
                                </select>
{{--                                <input type="text" name="questionType" value="{{$question->questionType}}" class="form-control" id="questionName">--}}
                                @error('questionType')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 m-auto pb-3">
                                <label for="instruction" class="form-label"><b>Question Instruction</b></label>
                                <input type="text" name="instruction" value="{{$question->instruction}}" class="form-control" id="questionName">
                                @error('instruction')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 m-auto pb-3 ">
                                <label for="optionA" class="form-label"><b>Option A</b></label>
                                <input type="text" name="optionA" value="{{$question->optionA}}" class="form-control" id="optionA">
                                @error('optionA')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 m-auto pb-3">
                                <label for="optionB" class="form-label"><b>Option B</b></label>
                                <input type="text" name="optionB" value="{{$question->optionB}}" class="form-control" id="optionB">
                                @error('optionB')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 m-auto pb-3">
                                <label for="optionC" class="form-label"><b>Option C</b></label>
                                <input type="text" name="optionC" value="{{$question->optionC}}" class="form-control" id="optionC">
                                @error('optionC')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 m-auto pb-3">
                                <label for="optionD" class="form-label"><b>Option D</b></label>
                                <input type="text" name="optionD" value="{{$question->optionD}}" class="form-control" id="optionD">
                                @error('optionD')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-8 m-auto pb-3">
                                <label for="answer" class="form-label"><b>Answer</b></label>
                                <select id="answer" name="answer" class="form-select">
                                    <option @if($question->answer == "optionA") selected="selected" @endif value="optionA">optionA</option>
                                    <option @if($question->answer == "optionB") selected="selected" @endif value="optionB">optionB</option>
                                    <option @if($question->answer == "optionC") selected="selected" @endif value="optionC">optionC</option>
                                    <option @if($question->answer == "optionD") selected="selected" @endif value="optionD">optionD</option>
                                </select>
{{--                                <input type="text" name="answer" value="{{$question->answer}}" class="form-control" id="answer">--}}
                                @error('answer')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 m-auto pb-3">
                                <label for="questionStatus" class="form-label"><b>Question Status</b></label>

                                <select id="questionStatus" name="questionStatus" class="form-select">
                                    <option @if($question->questionStatus == "ACTIVE") selected="selected" @endif value="ACTIVE">ACTIVE</option>
                                    <option @if($question->questionStatus == "DISABLED") selected="selected" @endif value="DISABLED">DISABLED</option>
                                </select>

                                @error('questionStatus')
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
