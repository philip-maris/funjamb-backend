<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Models\V1\Customer;
use App\Models\V1\User;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    public function index(){
        $users = User::all();
        return view("v1.dash.user.index", ["users"=>$users]);
    }
}
