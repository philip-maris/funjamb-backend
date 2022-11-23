<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;

class OverviewsController extends Controller
{
    public function index(){
        return view("v1.dash.overview.index");
    }
}
