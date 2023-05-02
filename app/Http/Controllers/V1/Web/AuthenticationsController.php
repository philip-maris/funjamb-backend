<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Authentication\LoginRequest;
use App\Service\V1\Web\AuthenticationService;

class AuthenticationsController extends Controller
{
    public function __construct(public AuthenticationService $authenticationService){
        $this->middleware("guest");
    }
    public function view_login(){
        return $this->authenticationService->view_login();
    }

    public function login(LoginRequest $loginRequest)
    {
        return $this->authenticationService->login($loginRequest);
    }
}
