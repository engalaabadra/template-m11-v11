<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CheckCodeRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\RegisterCodeNum;
use App\Services\General\ProccessCodesService;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Repositories\Auth\Register\User\RegisterRepository;
 
class RegisterController extends Controller
{
    /**
     * @var User
     */
    protected $user;
    /**
     * @var RegisterCodeNum
     */
    protected $registerCodeNum;
    /**
     * @var RegisterRepository
     */
    protected $regRepo;

    public function __construct( User $user,RegisterRepository $regRepo, RegisterCodeNum $registerCodeNum)
    {
        $this->user = $user;
        $this->registerCodeNum = $registerCodeNum;
        $this->regRepo = $regRepo;
    }

    /**
     * Register
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $resultReg = $this->regRepo->register($request,$this->registerCodeNum);
        if(is_string($resultReg)) return clientError(0,$resultReg);// Return the error message if data is missing
        session(['info_user'=>(object)$resultReg]);
        return  successResponse(0, $resultReg, trans('auth.Congrats...Registration completed successfully'));

    }

    /** check Code Register
     * @param CheckCodeRequest $request
     * @return JsonResponse
     */
    public function checkCodeRegister(CheckCodeRequest $request)
    {
        dd(0);
        $data = $request->validated();
        $resultCodeUser = app(ProccessCodesService::class)->checkCode($this->registerCodeNum, $data['code']);
        if(is_numeric($resultCodeUser)) return clientError(4);// Return 404 not found
        if(is_string($resultCodeUser)) return clientError(0,$resultCodeUser);// Return the error message if data is missing
        return successResponse(0, $resultCodeUser, trans('auth.Thanks,The code is valid'));

        }

    /** Resend Code Register
     * @return JsonResponse
     */
    public function resendCodeRegister(): JsonResponse
    {
        //get data info_user from session
        $info_user=session('info_user');
        $code = getCode();
        if (isset($info_user->phone_no)){
            $result = app(ProccessCodesService::class)->processPhone($this->registerCodeNum,$info_user,$code);
            if(is_numeric($result)) return clientError(4);// Return 404 not found
            if(is_string($result)) return clientError(0,$result);// Return the error message if data is missing
                
        }
        if (isset($info_user->email)){
            $result = app(ProccessCodesService::class)->processEmail($this->registerCodeNum,$info_user,$code);
            if(is_numeric($result)) return clientError(4);// Return 404 not found
            if(is_string($result)) return clientError(0,$result);// Return the error message if data is missing
        
        }
        return successResponse(0, $info_user);
    }
}

