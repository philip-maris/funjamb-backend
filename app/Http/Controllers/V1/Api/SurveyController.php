<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
//use App\Http\Requests\V1\Api\Survey\CreateSurveyRequest;
use App\Http\Requests\V1\Api\Survey\ReadBySurveyIdRequest;
use App\Http\Requests\V1\Api\Survey\ReadByUserIdRequest;
use App\Http\Requests\V1\Api\Survey\SubmitSurveyRequest;
use App\Service\V1\Api\SurveyService;
use App\Util\BaseUtil\ResponseUtil;
use Illuminate\Http\JsonResponse;

class SurveyController extends Controller
{
    use ResponseUtil;

    public function __construct(protected SurveyService $surevyService){
        //todo code here
    }

//
    public function create(SubmitSurveyRequest $request): JsonResponse
    {
      return  $this->surevyService->create($request);
    }

    public function read(): JsonResponse
    {
        return $this->surevyService->read();
    }

    public function readByUserId(ReadByUserIdRequest $request): JsonResponse
    {
       return $this->surevyService->readByUserId($request);
    }

    public function readById(ReadBySurveyIdRequest $request): JsonResponse
    {
       return $this->surevyService->readById($request);
    }
}
