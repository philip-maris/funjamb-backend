<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Service\V1\Api\AdminService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminsController extends Controller
{

    public function view_policy(){
        return view("v1.auth.policy");
    }
    public function view_delete(){
        return view("v1.auth.complaint");
    }
    //todo view brands


}
