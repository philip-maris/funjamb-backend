<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Web\Staff\CreateStaffRequest;
use App\Service\V1\Web\StaffService;

class StaffController extends Controller
{
    public function __construct(protected StaffService $staffService){
        $this->middleware("auth");
    }


    public function index(){
        return $this->staffService->index();
    }

    public function show(){
        return $this->staffService->show();
    }

    public function create(CreateStaffRequest $createStaffRequest){
        return $this->staffService->create($createStaffRequest);
    }

    public function edit($staffId){
        return $this->staffService->edit($staffId);
    }

    public function delete($staffId){
        return $this->staffService->delete($staffId);
    }
}
