<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
 public function __construct(){
     $this->middleware("auth");
 }
}
