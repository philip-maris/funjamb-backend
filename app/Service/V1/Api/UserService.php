<?php

namespace App\Service\V1\Api;

use App\Http\Requests\V1\Api\User\ReadByUserIdRequest;
use App\Http\Requests\V1\Api\User\UpdateUserRequest;
use App\Models\V1\User;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;


class UserService
{
    use ResponseUtil;

    public function update(UpdateUserRequest $request): JsonResponse
    {
        try {
            //todo validate
            $request->validated($request);
            //todo action
             $user = User::where('userId', $request['userId'])->first();
             if (!$user) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            $response =    $user->update([
                'firstName'=>$request['firstName']?: $user['firstName'],
                'lastName'=>$request['lastName']?: $user['lastName'],
                'gender'=>$request['gender'],
                'avatar'=>$request['avatar'],
//                'email'=>$request['email'],
//                'score'=>$request['score'],
//                'lexisScore'=>$request['lexisScore'],
//                'comprehensionScore'=>$request['comprehensionScore'],
//                'oralScore'=>$request['oralScore'],
                'userStatus'=>"Active",
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
            $user = User::all()->toArray();
            if (!$user)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);

            usort($user, function($a, $b) {
                if($a['score']==$b['score']) return 0;
                return $b['score'] - $a['score'];});
            return $this->BASE_RESPONSE($user);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function revalidate(): JsonResponse
    {
        try {
            $user = User::where('userId', auth('sanctum')->user()["userId"])->first();
//            dd($user);
            if (!$user)  throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($user);
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
            $user = User::where('userId', $request['userId'])->first();
            if (!$user) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return  $this->BASE_RESPONSE($user);
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }
}
