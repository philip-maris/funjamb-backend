<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\User\ReadByUserIdRequest;
use App\Http\Requests\V1\Api\User\UpdateUserRequest;
use App\Service\V1\Api\UserService;
use App\Util\BaseUtil\ResponseUtil;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    use ResponseUtil;

    public function __construct(protected UserService $userService){

        //todo code here
    }


    public function update(UpdateUserRequest $request): JsonResponse
    {
      return  $this->userService->update($request);
    }

    public function read(): JsonResponse
    {

        return $this->userService->read();
    }

    public function revalidate(): JsonResponse
    {
        return $this->userService->revalidate();
    }



    public function readById(ReadByUserIdRequest $request): JsonResponse
    {
       return $this->userService->readById($request);
    }
}
