<?php

namespace App\Service\V1\Api;

use App\Http\Requests\V1\Api\Authentication\ChangePasswordRequest;
use App\Http\Requests\V1\Api\Authentication\CompleteEnrollmentRequest;
use App\Http\Requests\V1\Api\Authentication\CompleteForgottenPasswordRequest;
use App\Http\Requests\V1\Api\Authentication\InitiateEnrollmentRequest;
use App\Http\Requests\V1\Api\Authentication\InitiateForgottenPasswordRequest;
use App\Http\Requests\V1\Api\Authentication\LoginRequest;
use App\Http\Requests\V1\Api\Authentication\ResendOtpRequest;
use App\Mail\OtpMail;
use App\Mail\WelcomeMail;
use App\Models\V1\PrepUser;
use App\Models\V1\User;
use App\Util\BaseUtil\DateTimeUtil;
use App\Util\BaseUtil\RandomUtil;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthenticationService
{
    use ResponseUtil;
    use RandomUtil;
    use DateTimeUtil;

    public function initiateEnrollment(InitiateEnrollmentRequest $request): JsonResponse
    {
        try {
            $otp = $this->OTP();
            //todo validate
            $request->validated();

            //todo action
//            $maleImages = [
//                'https://funjamb-repo.s3.amazonaws.com/bbboy2.jpg',
//                'https://funjamb-repo.s3.amazonaws.com/male1.png',
//                ];
//            $femaleImages = [
//                "https://funjamb-repo.s3.amazonaws.com/tirdfemail.png",
//                "https://funjamb-repo.s3.amazonaws.com/secfemail.png",
//                ];
            $image = "";
            $randomNumber = rand(1,30);
            if ($request['gender'] == "Male"){
                $image = "https://funjamb-repo.s3.amazonaws.com/male".$randomNumber.".PNG";
            }else{

                $image = "https://funjamb-repo.s3.amazonaws.com/female${$randomNumber}.PNG";
            }
//
//            $index = ($request['gender'] == "MALE") ?
//                array_rand($maleImages, 1) :  array_rand($femaleImages, 1);

            $user = User::create([
                'firstName'=>$request['firstName'],
                'lastName'=>$request['lastName'],
                'email'=>$request['email'],
                'phoneNo'=>$request['phoneNo'],
                'gender'=>$request['gender'],
                'averageScore'=>0,
                'bestScore'=>0,
                'totalPlayed'=>0,
                'avatar'=> $image,
                'password'=>Hash::make($request['password']),
                'userStatus'=>"ACTIVE",
                'doneMock'=>"TRUE",
                'doneSurvey'=>"TRUE",
            ]);

            //todo check its successful
            if (!$user) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);
            //todo send email
            $fullName ="{$user['userFirstName']} " . " {$user['userLastName']}";
//           $email =  Mail::to($request['email'])->send(new OtpMail($fullName,$otp));
//           //todo check if not email sent
//            if (!$email) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);

            return $this->SUCCESS_RESPONSE("REGISTRATION SUCCESSFUL");
        }catch (Exception $ex){
           return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function completeEnrollment(CompleteEnrollmentRequest $request): JsonResponse
    {
        try {
            //todo validate
            $request->validated();
            //todo action
            //todo check if the email exist
            $user = User::where('email', $request['email'])
                ->where('userStatus', 'Pending')->first();

            if (!$user) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            //todo update user

            //todo check otp
            if ($request['userOtp'] != $user['userOtp'])
                throw new ExceptionUtil(ExceptionCase::INVALID_OTP);

            //todo check if otp is expired
            if ( $user['userOtpExpired'] < $this->dataTime())
                throw new ExceptionUtil(ExceptionCase::OTP_EXPIRED);

            $response = $user->update([
                'userStatus'=>"Active",
            ]);

            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_UPDATE);
            $fullName ="{$user['userFirstName']} " . " {$user['userLastName']}";
            //todo send email
            $email =  Mail::to($request['email'])
                                ->send(new WelcomeMail($fullName));
            //todo check if not email sent
            if (!$email) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);

            return $this->SUCCESS_RESPONSE("CREATED  SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function initiateForgottenPassword(InitiateForgottenPasswordRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated();
            $otp = $this->OTP();
            //todo action
            $user = User::where('email', $request['email'])->first();
            if (!$user) throw  new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            //todo update otp and expiring date
           $update = $user->update([
                'userOtp'=>$otp,
                'userOtpExpired'=>$this->addTimestamp(min:"5")
            ]);
           //todo check if updated
           if (!$update) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);

            //todo send email
            $fullName ="{$user['firstName']} " . " {$user['lastName']}";
           $email =  Mail::to($request['email'])->send(new OtpMail($fullName,$otp));
            //todo check if not email sent
            if (!$email) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);

            return $this->SUCCESS_RESPONSE("OTP SENT SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function completeForgottenPassword(CompleteForgottenPasswordRequest $request): JsonResponse
    {
        try {
            //todo validate
            $request->validated();

            //todo action
            $user = User::where('userOtp', $request['userOtp'])
                                    ->where('email', $request['email'])->first();

            if ($user['userOtpExpired'] < $this->dataTime()) throw new ExceptionUtil(ExceptionCase::OTP_EXPIRED);

            $response = $user->update([
                'password'=>Hash::make($request['newPassword'])
            ]);
            if (!$response) throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->SUCCESS_RESPONSE("PASSWORD CHANGED SUCCESSFULLY");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        try {
            //todo validate
            $request->validated();
            $user = User::where('email', $request['email'])->first();
            $response = Hash::check($request['oldUserPassword'], $user['userPassword']);
            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "INVALID PASSWORD, PLS INPUT A VALID PASSWORD");

            return $this->SUCCESS_RESPONSE("CHANGE PASSWORD SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            //todo validate
            $request->validated();
            $user = User::where('email', $request['email'])->first();
            if (!$user) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "INVALID EMAIL");
            //todo check if password is same
            $response = Hash::check($request['password'], $user['password']);

            if (!$response) throw new ExceptionUtil(ExceptionCase::INCORRECT_PASSWORD);

            return $this->BASE_RESPONSE(array_merge($user->toArray(), ['token'=>$user->createToken("API FOR ". $user['email'])->plainTextToken]));
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function prepLogin(LoginRequest $request): JsonResponse
    {
        try {
            //todo validate
            $request->validated();
            $user = PrepUser::where('email', $request['email'])->first();
            if (!$user) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "INVALID EMAIL");
            //todo check if password is same
            $response = Hash::check($request['password'], $user['password']);

            if (!$response) throw new ExceptionUtil(ExceptionCase::INCORRECT_PASSWORD);

            return $this->BASE_RESPONSE(array_merge($user->toArray(), ['token'=>$user->createToken("API FOR ". $user['email'])->plainTextToken]));
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function resendOtp(ResendOtpRequest $request): JsonResponse
    {
        try {
            //todo validate
            $request->validated();

            $otp = $this->OTP();
            //todo actions
            $user = User::where('email', $request['email'])->first();

            if (!$user) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD, "INVALID EMAIL");

            //todo send email
            $user->update([
                'userOtp'=>$otp,
                'userOtpExpired'=>$this->addTimestamp(min:"5")
            ]);
            //todo send email
            $fullName ="{$user['firstName']} " . " {$user['lastName']}";
            $email =  Mail::to($request['email'])->send(new OtpMail($fullName,$otp));

            //todo check if not email sent
            if (!$email) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);

            return $this->SUCCESS_RESPONSE("OTP SENT SUCCESSFUL");
        }catch (Exception $ex){
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

}
