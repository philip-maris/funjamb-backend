<?php

namespace App\Service\V1\Api;


use App\Http\Requests\V1\Api\Test\ReadByTestIdRequest;
use App\Http\Requests\V1\Api\Test\ReadByUserIdRequest;
use App\Http\Requests\V1\Api\Test\SubmitTestRequest;
use App\Models\V1\Test;
use App\Models\V1\User;
use App\Util\BaseUtil\IdVerificationUtil;
use App\Util\BaseUtil\NotificationUtil;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use function App\Util\BaseUtil\addTimestamp;
use function Ramsey\Uuid\Generator\timestamp;


class TestService
{
    use ResponseUtil;


    public function create(SubmitTestRequest $request): JsonResponse
    {
        try {

            //todo validate
            $request->validated($request);

            $test = Test::create(array_merge($request->all()));
            //todo check its successful
            if (!$test) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);
            $user = User::where('userId', $request['userId'])->first();
            if (!$user) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);

//            get average scores
            $totalPlayed = $user['totalPlayed'] + 1;
            $averageScore = ($user['score'] + $request['score']) / $totalPlayed;
            $bestScore = $user['bestScore'];
            if($request['score'] > $user['bestScore']){
                $bestScore = $request['score'];
            }
            $lexisScore = ($user['lexisScore'] + $request['lexisScore']) / $totalPlayed;
            $comprehensionScore = ($user['comprehensionScore'] + $request['comprehensionScore']) / $totalPlayed;
            $oralScore = ($user['oralScore'] + $request['oralScore']) / $totalPlayed;

            $response =    $user->update([
                'firstName'=>$request['firstName']?: $user['firstName'],
                'lastName'=>$request['lastName']?: $user['lastName'],
                'gender'=>$request['gender']?: $user['gender'],
                'avatar'=>$request['avatar']?: $user['avatar'],
                'score'=>$request['score'],
                'lexisScore'=>$lexisScore,
                'comprehensionScore'=>$comprehensionScore,
                'oralScore'=>$oralScore,
                'totalPlayed'=> $totalPlayed,
                'averageScore'=> $averageScore,
                'bestScore'=> $bestScore,
                'lastPlayedAt' => Carbon::now()->toDateTimeString()
            ]);
            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_UPDATE);

            return $this->SUCCESS_RESPONSE("CREATED SUCCESSFUL");
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function read(): JsonResponse
    {
        try {
            $test = Test::all();
            if (!$test) throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($test);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function readById(ReadByTestIdRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated();

            //todo action
            $test = Test::where('testId', $request['testId'])->first();
            if (!$test) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return $this->BASE_RESPONSE($test);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function readByUserId(ReadByUserIdRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated();

            //todo action
            $test = Test::where('userId', $request['userId'])->get();
            if (!$test) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return $this->BASE_RESPONSE($test);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function readTestByType(ReadTestByTypeRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated();

            //todo action
            $test = Test::where('testType', $request['testType'])->get();
            if (!$test) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return $this->BASE_RESPONSE($test);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

}
