<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Models\V1\User;

class OverviewsController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    public function index(){
//        dd(auth()->check());
        $users = User::limit(3)->orderBy('score', 'DESC')->get();
        return view("v1.dash.overview.index", ["users"=>$users]);
    }
}
