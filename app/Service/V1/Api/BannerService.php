<?php

namespace App\Service\V1\Api;

use App\Http\Requests\V1\Api\Banner\CreateBannerRequest;
use App\Http\Requests\V1\Api\Banner\ReadBannerByTypeRequest;
use App\Http\Requests\V1\Api\Banner\ReadByBannerIdRequest;
use App\Http\Requests\V1\Api\Banner\UpdateBannerRequest;
use App\Http\Requests\V1\Api\Test\SubmitTestRequest;
use App\Models\V1\Banner;
use App\Models\V1\Test;
use App\Util\BaseUtil\IdVerificationUtil;
use App\Util\BaseUtil\NotificationUtil;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;


class BannerService
{
    use ResponseUtil;

//
    public function resultUpl(SubmitTestRequest $request): JsonResponse
    {
        try {

            //todo validate
            $request->validated($request);

            $banner = Test::create(array_merge($request->all(),
                ['testStatus' => 'ACTIVE']));
            //todo check its successful
            if (!$banner) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);

            return $this->SUCCESS_RESPONSE("CREATED SUCCESSFUL");
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function read(): JsonResponse
    {
        try {
            $banner = Banner::all();
            if (!$banner) throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($banner);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function readById(ReadByBannerIdRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated();

            //todo action
            $banner = Banner::where('bannerId', $request['bannerId'])->first();
            if (!$banner) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return $this->BASE_RESPONSE($banner);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

    public function readBannerByType(ReadBannerByTypeRequest $request): JsonResponse
    {
        try {
            //todo validation
            $request->validated();

            //todo action
            $banner = Banner::where('bannerType', $request['bannerType'])->get();
            if (!$banner) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return $this->BASE_RESPONSE($banner);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }

    }

}
