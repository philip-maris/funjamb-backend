<?php

namespace App\Service\V1\Api;


use App\Http\Requests\V1\Api\Survey\CreateSurveyQuestionRequest;
use App\Http\Requests\V1\Api\Survey\SubmitSurveyRequest;
use App\Http\Requests\V1\Api\Test\ReadByTestIdRequest;
use App\Http\Requests\V1\Api\Test\ReadByUserIdRequest;
use App\Http\Requests\V1\Api\Test\SubmitTestRequest;
use App\Models\V1\MySurvey;
use App\Models\V1\SurveyQuestion;
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
use function Illuminate\Routing\Controllers\only;
use function Ramsey\Uuid\Generator\timestamp;


class SurveyService
{
    use ResponseUtil;


    public function create(SubmitSurveyRequest $request): JsonResponse
    {
        try {

            //todo validate
            $request->validated($request);

            $survey = MySurvey::create(array_merge($request->all()));
            //todo check its successful
            if (!$survey) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);
            $user = User::where('userId', $request['userId'])->first();
            if (!$user) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);

//

            $response =    $user->update([
                'firstName'=>$user['firstName'],
                'lastName'=> $user['lastName'],
                'gender'=> $user['gender'],
                'avatar'=> $user['avatar'],
                'score'=> $user['score'],
                'lexisScore'=>$user['lexisScore'],
                'comprehensionScore'=>$user['comprehensionScore'],
                'oralScore'=>$user['oralScore'],
                'totalPlayed'=>$user['totalPlayed'],
                'averageScore'=> $user['averageScore'],
                'bestScore'=>$user['bestScore'],
                'doneMock'=>  "TRUE",
                'doneSurvey'=>  "TRUE",
                'lastPlayedAt' => date("Y/m/d")
            ]);
            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_UPDATE);

            return $this->SUCCESS_RESPONSE("CREATED SUCCESSFUL");
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }


    public function createSurveyQuestions(CreateSurveyQuestionRequest $request): JsonResponse
    {
        try {
            //todo validate
//            $request->validated($request);
            foreach ($request -> questions as $key=>$item){
                $question = SurveyQuestion::create(array_merge($item));
                //todo check its successful
                if (!$question) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);
            }

            return $this->SUCCESS_RESPONSE("CREATED SUCCESSFUL");
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function read(): JsonResponse
    {
        try {
            $questions = SurveyQuestion::all();
            if (!$questions) throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($questions);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }
}
