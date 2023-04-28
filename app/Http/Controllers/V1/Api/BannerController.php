<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Banner\CreateBannerRequest;
use App\Http\Requests\V1\Api\Banner\ReadBannerByTypeRequest;
use App\Http\Requests\V1\Api\Banner\ReadByBannerIdRequest;
use App\Http\Requests\V1\Api\Banner\UpdateBannerRequest;
use App\Http\Requests\V1\Api\Test\SubmitTestRequest;
use App\Service\V1\Api\BannerService;
use App\Util\BaseUtil\ResponseUtil;
use Illuminate\Http\JsonResponse;

class BannerController extends Controller
{
    use ResponseUtil;

    public function __construct(protected BannerService $bannerService){
        //todo code here
    }

//
    public function creatre(SubmitTestRequest $request): JsonResponse
    {
      return  $this->bannerService->resultUpl($request);
    }
//
//
//
//    public function update(UpdateBannerRequest $request): JsonResponse
//    {
//      return  $this->bannerService->update($request);
//    }

    public function read(): JsonResponse
    {

        return $this->bannerService->read();
    }

    public function readById(ReadByBannerIdRequest $request): JsonResponse
    {
       return $this->bannerService->readById($request);
    }

    public function readBannerByType(ReadBannerByTypeRequest $request): JsonResponse
    {
       return $this->bannerService->readBannerByType($request);
    }
}
