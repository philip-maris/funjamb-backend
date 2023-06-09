<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Question\CreateQuestionRequest;
use App\Http\Requests\V1\Api\Question\ReadQuestionByTypeRequest;
use App\Http\Requests\V1\Api\Question\UploadQuestionRequest;
use App\Service\V1\Api\QuestionService;
use App\Util\BaseUtil\ResponseUtil;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    use ResponseUtil;

    public function __construct(protected QuestionService $questionService){
        //todo code here
    }

    public function create(CreateQuestionRequest $request): JsonResponse
    {
        return $this->questionService->create($request);
    }

    public function upload(UploadQuestionRequest $request): JsonResponse
    {
        return $this->questionService->upload($request);
    }

    public function createComprehension(CreateQuestionRequest $request): JsonResponse
    {
        return $this->questionService->createComprehension($request);
    }

    public function read(): JsonResponse
    {
        return $this->questionService->read();
    }

    public function readQuestionByType(ReadQuestionByTypeRequest $request): JsonResponse
    {
       return $this->questionService->readQuestionByType($request);
    }
}
