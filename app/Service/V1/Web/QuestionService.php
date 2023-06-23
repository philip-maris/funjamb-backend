<?php

namespace App\Service\V1\Web;

use App\Http\Requests\V1\Web\Question\CreateQuestionRequest;
use App\Http\Requests\V1\Api\Question\UpdateQuestionRequest;
use App\Models\V1\Question;

class QuestionService
{
    public function index(){
        $questions = Question::latest()->get();

        return view("v1.dash.question.index", ["questions"=>$questions]);
    }

    public function show(){
        return view("v1.dash.question.add");
    }

    public function create(CreateQuestionRequest $createQuestionRequest){

//        dd("yess");
        $createQuestionRequest->validated();
        $response = Question::create($createQuestionRequest->all());
        if (!$response) {
            alert("error", "Unable to create question", "error");
            return back();
        }
        alert("success", "created successful", "success");
        return back();
    }

    public function edit($questionId){
       $question = Question::where("questionId", $questionId)->first();
       if (!$question){
           alert("error", "question doesnt exist", "error");

           return back();
       }
        return view("v1.dash.question.edit", compact("question"));
    }

    public function update(UpdateQuestionRequest $updateQuestionRequest){
       $validated = $updateQuestionRequest->validated();
        $question = Question::where("questionId", $validated["questionId"])->first();
        if (!$question){
            alert("error", "question doesnt exist", "error");
            return back();
        };

        $response = $question->update($updateQuestionRequest->all());
        if (!$response){
            alert("error", "Unable to update question", "error");
            return back();
        }

        alert("success", "Question updated successful", "success");
        return redirect()->route("questions");
    }

    public function delete($questionId){
        $question = Question::where("questionId", $questionId)->first();
        if (!$question){
            alert("error", "question not found", "error");
            return back();
        }

        if (!$question->delete()){
            alert("error", "question cannot be deleted", "error");
            return back();
        }

        alert("success", "question deleted successful", "success");
        return back();
    }
}
