<?php

namespace App\Service\V1\Api;

use App\Http\Requests\V1\Api\PrepUser\ReadByUserIdRequest;
use App\Http\Requests\V1\Api\PrepUser\UpdateUserRequest;
use App\Models\V1\PrepUser;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;


class PrepUserService
{
    use ResponseUtil;

    public function update(UpdateUserRequest $request): JsonResponse
    {
        try {
            //todo validate
            $request->validated($request);
            //todo action
             $prepUser = PrepUser::where('prepUserId', $request['prepUserId'])->first();
             if (!$prepUser) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            $response =    $prepUser->update([
                'firstName'=>$request['firstName']?: $prepUser['firstName'],
                'lastName'=>$request['lastName']?: $prepUser['lastName'],
                'gender'=>$request['gender'],
                'avatar'=>$request['avatar'],
                'prepUserStatus'=>"Active",
//                'lastPlayedAt' =>
            ]);
            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_UPDATE);

            return $this->SUCCESS_RESPONSE("UPDATE SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function read(): JsonResponse
    {
        try {
            $prepUser = PrepUser::all()->toArray();
            if (!$prepUser)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);

//            usort($prepUser, function($a, $b) {
//                if($a['score']==$b['score']) return 0;
//                return $b['score'] - $a['score'];});
            return $this->BASE_RESPONSE($prepUser);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function revalidate(): JsonResponse
    {
        try {
            $prepUser = PrepUser::where('prepUserId', auth('sanctum')->user()["prepUserId"])->first();
//            dd($prepUser);
            if (!$prepUser)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($prepUser);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function readById(ReadByUserIdRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated($request->all());

            //todo action
            $prepUser = PrepUser::where('prepUserId', $request['prepUserId'])->first();
            if (!$prepUser) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return  $this->BASE_RESPONSE($prepUser);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }
}
