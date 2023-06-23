<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Web\Question\CreateQuestionRequest;
use App\Http\Requests\V1\Api\Question\UpdateQuestionRequest;
use App\Service\V1\Web\QuestionService;

class QuestionsController extends Controller
{
    public function __construct(public QuestionService $questionService){
        $this->middleware("auth");
    }

    public function index(){
        return $this->questionService->index();
    }

    public function show(){
        return $this->questionService->show();
    }

    public function create(CreateQuestionRequest $request){
//        dd("jkjjk");
        return $this->questionService->create($request);
    }

    public function edit($questionId){
        return $this->questionService->edit($questionId);
    }

    public function update(UpdateQuestionRequest $questionRequest){
        return $this->questionService->update($questionRequest);
    }

    public function delete($questionId){
        return $this->questionService->delete($questionId);
    }
}
