<?php
namespace App\Repositories\Auth\Register\User;

use App\Models\Traits\User\GeneralUserTrait;
use App\Services\Auth\Register\RegisterService;

class RegisterRepository implements RegisterRepositoryInterface{

    /**
     * @var RegisterService
    */
    protected $registerService;

    public function __construct(RegisterService $registerService){
        $this->registerService = $registerService;
    }
    /** Register
     * @param RegitserRequest $request
     * @return object
     */
    public function register($request,$model){//model2:registerCodeNum
        $resultReg = $this->registerService->actionRegister($request,$model);
        if(is_string($resultReg)) return $resultReg;
        session(['info_user'=>(object)$resultReg]);
        return $resultReg;
    }
}
