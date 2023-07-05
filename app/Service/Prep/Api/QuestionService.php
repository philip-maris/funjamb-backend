<?php

namespace App\Service\Prep\Api;


use App\Http\Requests\Prep\Api\Question\CreateQuestionRequest;
use App\Http\Requests\Prep\Api\Question\ReadQuestionByCourseCodeRequest;
//use App\Http\Requests\Prep\Api\Question\ReadByQuestionIdRequest;
use App\Http\Requests\Prep\Api\Question\UpdateQuestionRequest;
use App\Models\Prep\Question;
use App\Util\BaseUtil\IdVerificationUtil;
use App\Util\BaseUtil\NotificationUtil;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;




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



    public function read(): JsonResponse
    {
        try {

            $comprehension = Comprehension::select()->inRandomOrder()->first();

//            $comprehensionQuestions = $comprehension->questions->toArray();
//
//            $comprehension2 = Comprehension::select()->inRandomOrder()->first();

            $comprehensionQuestions = $comprehension->questions->toArray();
//            $anthonyms = Question::where('courseCode', 'LEXIS')-> inRandomOrder()->limit(15)->get()->toArray();
//            $anthonyms = Question::where('courseCode', 'LEXIS')-> inRandomOrder()->limit(15)->get()->toArray();
            $lexis = Question::where('courseCode', 'LEXIS')-> inRandomOrder()->limit(50)->get()->toArray();
            $oral = Question::where('courseCode', 'ORAL')-> inRandomOrder()->limit(6)->get()->toArray();

            $questions = array_merge($comprehensionQuestions, $lexis, $oral);

            $response = new QuestionResponse($comprehension['passage'],$questions);


            if (!$response) throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($response);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }


    public function readQuestionByCourseCode(ReadQuestionByCourseCodeRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated();


            //todo action
            $questions = Question::where('courseCode', $request['courseCode'])->get();
            if (!$questions) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
//            $response = new QuestionResponse(" ",$question);
            return $this->BASE_RESPONSE($questions);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

}
