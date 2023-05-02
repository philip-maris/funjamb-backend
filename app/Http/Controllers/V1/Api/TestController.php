<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
//use App\Http\Requests\V1\Api\Test\CreateTestRequest;
use App\Http\Requests\V1\Api\Test\ReadByTestIdRequest;
use App\Http\Requests\V1\Api\Test\ReadByUserIdRequest;
use App\Http\Requests\V1\Api\Test\SubmitTestRequest;
use App\Service\V1\Api\TestService;
use App\Util\BaseUtil\ResponseUtil;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    use ResponseUtil;

    public function __construct(protected TestService $testService){
        //todo code here
    }

//
    public function create(SubmitTestRequest $request): JsonResponse
    {
      return  $this->testService->create($request);
    }

    public function read(): JsonResponse
    {
        return $this->testService->read();
    }

    public function readByUserId(ReadByUserIdRequest $request): JsonResponse
    {
       return $this->testService->readByUserId($request);
    }

    public function readById(ReadByTestIdRequest $request): JsonResponse
    {
       return $this->testService->readById($request);
    }
}
