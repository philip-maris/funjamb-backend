<?php

namespace App\Service\Vi\Api;

use App\Http\Requests\V1\Api\Brand\CreateBrandRequest;
use App\Http\Requests\V1\Api\Brand\ReadByBrandIdRequest;
use App\Http\Requests\V1\Api\Brand\UpdateBrandRequest;
use App\Models\V1\Brand;
use App\Util\BaseUtil\IdVerificationUtil;
use App\Util\BaseUtil\NotificationUtil;
use App\Util\BaseUtil\ResponseUtil;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;
use Exception;
use Illuminate\Http\JsonResponse;

class BrandService
{
    use ResponseUtil;

    public function create(CreateBrandRequest $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated($request);
            $response = Brand::create(array_merge($request->all(),
                ['brandStatus' => 'ACTIVE']));
            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);


            return $this->SUCCESS_RESPONSE("BRAND CREATED SUCCESSFUL");
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function update(UpdateBrandRequest $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated();


            $brand = Brand::find($request['brandId']);
            if (!$brand) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            $response = $brand->update(array_merge($request->except('brandId'),
                ['brandStatus' => 'ACTIVE']));


            if (!$response) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE);
            return $this->SUCCESS_RESPONSE("BRAND UPDATED SUCCESSFUL");
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function read(): JsonResponse
    {
        try {
            $brand = Brand::all();
            if (!$brand) throw new ExceptionUtil(ExceptionCase::NOT_SUCCESSFUL);
            return $this->BASE_RESPONSE($brand);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function readById(ReadByBrandIdRequest $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated($request->all());
            //todo action
            $brand = Brand::where('brandId', $request['brandId'])->first();
            if (!$brand) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            return $this->BASE_RESPONSE($brand);
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }

    public function delete(ReadByBrandIdRequest $request): JsonResponse
    {
        try {
            //TODO VALIDATION
            $request->validated($request->all());

            $brand = Brand::where('brandId', $request['brandId'])->first();
            if (!$brand) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_LOCATE_RECORD);
            if (!$brand->delete()) throw new ExceptionUtil(ExceptionCase::SOMETHING_WENT_WRONG);

            return $this->SUCCESS_RESPONSE("BRAND DELETED SUCCESSFUL");
        } catch (Exception $ex) {
            return $this->ERROR_RESPONSE($ex->getMessage());
        }
    }
}
