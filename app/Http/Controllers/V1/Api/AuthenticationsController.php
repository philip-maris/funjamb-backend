<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Authentication\ChangePasswordRequest;
use App\Http\Requests\V1\Api\Authentication\CompleteEnrollmentRequest;
use App\Http\Requests\V1\Api\Authentication\CompleteForgottenPasswordRequest;
use App\Http\Requests\V1\Api\Authentication\InitiateEnrollmentRequest;
use App\Http\Requests\V1\Api\Authentication\InitiateForgottenPasswordRequest;
use App\Http\Requests\V1\Api\Authentication\LoginRequest;
use App\Http\Requests\V1\Api\Authentication\ResendOtpRequest;
use App\Service\V1\Api\AuthenticationService;
use App\Service\V1\Api\UserService;
use Illuminate\Http\JsonResponse;

class AuthenticationsController extends Controller
{

    public function __construct(protected UserService $userService,protected AuthenticationService $authenticationService){
        //todo code here
    }

    public function initiateEnrollment(InitiateEnrollmentRequest $request): JsonResponse
    {
       return $this->authenticationService->initiateEnrollment($request);
    }
    public function completeEnrollment(CompleteEnrollmentRequest $request): JsonResponse
    {
        return $this->authenticationService->completeEnrollment($request);
    }
    public function initiateForgottenPassword(InitiateForgottenPasswordRequest $request): JsonResponse
    {
        return $this->authenticationService->initiateForgottenPassword($request);
    }
    public function completeForgottenPassword(CompleteForgottenPasswordRequest $request): JsonResponse
    {
        return $this->authenticationService->completeForgottenPassword($request);
    }
    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        return $this->authenticationService->changePassword($request);
    }
    public function login(LoginRequest $request): JsonResponse
    {
        return $this->authenticationService->login($request);
    }
    public function resendOtp(ResendOtpRequest $request): JsonResponse
    {
        return  $this->authenticationService->resendOtp($request);
    }
}
