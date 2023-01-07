<?php

namespace App\Http\Controllers\V1\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Banner\CreateBannerRequest;
use App\Service\V1\Web\BannerService;

class BannerController extends Controller
{
    public function __construct(protected BannerService $bannerService){

    }

    public function index(){
        return $this->bannerService->index();
    }

    public function create(){
        return $this->bannerService->create();
    }

    public function store(CreateBannerRequest $createBannerRequest){
        return $this->bannerService->store($createBannerRequest);
    }

    public function edit($bannerId){
        return $this->bannerService->edit($bannerId);
    }
}
