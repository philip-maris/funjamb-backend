<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;

class OverviewsController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    public function index(){
//        dd(auth()->check());
        return view("v1.dash.overview.index");
    }
}
