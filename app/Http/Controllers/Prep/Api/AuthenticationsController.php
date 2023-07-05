<?php

namespace App\Http\Controllers\Prep\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Prep\Api\Authentication\ChangePasswordRequest;
use App\Http\Requests\Prep\Api\Authentication\CompleteEnrollmentRequest;
use App\Http\Requests\Prep\Api\Authentication\CompleteForgottenPasswordRequest;
use App\Http\Requests\Prep\Api\Authentication\InitiateEnrollmentRequest;
use App\Http\Requests\Prep\Api\Authentication\InitiateForgottenPasswordRequest;
use App\Http\Requests\Prep\Api\Authentication\LoginRequest;
use App\Http\Requests\Prep\Api\Authentication\ResendOtpRequest;
use App\Service\Prep\Api\AuthenticationService;
use App\Service\Prep\Api\UserService;
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
    public function prepLogin(LoginRequest $request): JsonResponse
    {
        return $this->authenticationService->prepLogin($request);
    }
    public function resendOtp(ResendOtpRequest $request): JsonResponse
    {
        return  $this->authenticationService->resendOtp($request);
    }
}
