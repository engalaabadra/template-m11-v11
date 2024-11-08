<?php
namespace App\Services\Auth\Register;

use App\Services\General\ProccessCodesService;
use App\Services\Auth\Register\RegisterServiceInterface;

class RegisterService implements RegisterServiceInterface {

    /**
    * Registration User In db .
    * @param RegisterRequest $request
    * @param RegisterCodeNum $model
    * @return object
    */
    public function actionRegister($request,$model){//model2:registerCodeNum
        $data=$request->validated();
        $data['code'] = getCode();
        if ($request->filled('phone_no')) {
            // Handle Phone Registration .
            app(ProccessCodesService::class)->processPhone($model, $request, $data['code'],trans('messages.pls, use this code :') . $data['code']);
        }
        if ($request->filled('email')) {
            // Handle Email Registration .
            app(ProccessCodesService::class)->processEmail($model, $request, $data['code']);
        }
        return $data;
    }

}
