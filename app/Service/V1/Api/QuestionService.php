<?php

namespace App\Service\V1\Api;


use App\Http\Requests\V1\Api\Question\CreateQuestionRequest;
use App\Http\Requests\V1\Api\Question\ReadQuestionByTypeRequest;
use App\Http\Requests\V1\Api\Question\ReadByQuestionIdRequest;
use App\Http\Requests\V1\Api\Question\UpdateQuestionRequest;
use App\Models\V1\Comprehension;
use App\Models\V1\ComprehensionQuestion;
use App\Models\V1\Question;
use App\Util\BaseUtil\IdVerificationUtil;
use App\Util\BaseUtil\NotificationUtil;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;


class QuestionResponse{
    public $passage;
    public $questions;

    public function __construct($passage,$questions){
        $this->passage = $passage;
        $this->questions = $questions;
    }
}

class QuestionService
{
    use ResponseUtil;




    public function create(CreateQuestionRequest $request): JsonResponse
    {
        try {
            //todo validate
//            $request->validated($request);
            foreach ($request -> questions as $key=>$item){
                $question = Question::create(array_merge($item));
                //todo check its successful
                if (!$question) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);
            }

            return $this->SUCCESS_RESPONSE("CREATED SUCCESSFUL");
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }


    public function createComprehension(CreateQuestionRequest $request): JsonResponse
    {
        try {
            //todo validate
//            $request->validated($request);
            foreach ($request -> comp as $key=>$item){
                $comprehension = Comprehension::create(['passage' =>$item['passage']]);

                foreach ($item['questions'] as $q=>$qes) {

                    $question = ComprehensionQuestion::create(array_merge($qes,
                    ['comprehensionId' => $comprehension['comprehensionId'],
                        'questionType' => "COMPREHENSION"
                        ]));
                    //todo check its successful
                    if (!$question) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);
                }
            }

            return $this->SUCCESS_RESPONSE("CREATED SUCCESSFUL");
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }


    public function read(): JsonResponse
    {
        try {

            $comprehension = Comprehension::select()->inRandomOrder()->first();

            $comprehensionQuestions = $comprehension->questions->toArray();
            $lexis = Question::where('questionType', 'LEXIS')-> inRandomOrder()->limit(2)->get()->toArray();
            $oral = Question::where('questionType', 'ORAL')-> inRandomOrder()->limit(2)->get()->toArray();

            $questions = array_merge($comprehensionQuestions, $lexis, $oral);

            $response = new QuestionResponse($comprehension['passage'],$questions);


            if (!$response) throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($response);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }


    public function readQuestionByType(ReadQuestionByTypeRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated();

            //todo action
            $question = Question::where('questionType', $request['questionType'])-> inRandomOrder()->limit(2)->get();
            if (!$question) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return $this->BASE_RESPONSE($question);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

}
