<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Web\Comprehension\CreateComprehensionRequest;
use App\Http\Requests\V1\Api\Comprehension\UpdateComprehensionRequest;
use App\Service\V1\Web\ComprehensionService;

class ComprehensionsController extends Controller
{
    public function __construct(public ComprehensionService $comprehensionService){
        $this->middleware("auth");
    }

    public function index(){
        return $this->comprehensionService->index();
    }

    public function show(){
        return $this->comprehensionService->show();
    }

    public function create(CreateComprehensionRequest $request){
//        dd("jkjjk");
        return $this->comprehensionService->create($request);
    }

    public function edit($comprehensionId){
        return $this->comprehensionService->edit($comprehensionId);
    }

    public function update(UpdateComprehensionRequest $comprehensionRequest){
        return $this->comprehensionService->update($comprehensionRequest);
    }

    public function delete($comprehensionId){
        return $this->comprehensionService->delete($comprehensionId);
    }
}
