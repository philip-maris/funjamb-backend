<?php

namespace App\Service\V1\Web;

use App\Http\Requests\V1\Api\Authentication\LoginRequest;
use App\Models\V1\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
    public function view_login(){
        return view("v1.auth.login");
    }

    public function login(LoginRequest $loginRequest){
        $validated = $loginRequest->validated();
        $user = Customer::where("customerEmail", "{$loginRequest->customerEmail}")->first();
//        dd($user);
        if (!$user){
            alert("error", "invalid credential", "error");
            return back();
        }
        $auth = Auth::attempt([
            "customerEmail"=>$loginRequest->customerEmail,
            "password"=>$loginRequest->customerPassword
        ]);

        if ($auth){
            if ($user->isAdmin == 1 || $user->isSuperAdmin == 1){
                alert("success", "Welcome {$user->customerFirstName} {$user->customerLastName}", "success");
                return redirect()->route("overview");
            }else{
                alert("error", "You are not authorize to login", "error");
                return back();
            }
        }

        alert("error", "something went wrong", "error");
        return back();
    }
}

