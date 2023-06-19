<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\PrepUser\ReadByUserIdRequest;
use App\Http\Requests\V1\Api\PrepUser\UpdateUserRequest;
use App\Service\V1\Api\UserService;
use App\Util\BaseUtil\ResponseUtil;
use Illuminate\Http\JsonResponse;

class PrepUsersController extends Controller
{
    use ResponseUtil;

    public function __construct(protected UserService $prepUserService){

        //todo code here
    }


    public function update(UpdateUserRequest $request): JsonResponse
    {
      return  $this->prepUserService->update($request);
    }

    public function read(): JsonResponse
    {

        return $this->prepUserService->read();
    }

    public function revalidate(): JsonResponse
    {
        return $this->prepUserService->revalidate();
    }



    public function readById(ReadByUserIdRequest $request): JsonResponse
    {
       return $this->prepUserService->readById($request);
    }
}
