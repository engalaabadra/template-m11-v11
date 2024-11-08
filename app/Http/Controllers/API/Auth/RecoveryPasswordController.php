<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\PasswordReset;
use App\Models\User;
use App\Http\Requests\Auth\CheckCodeRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Services\General\ProccessCodesService;
use App\Repositories\Auth\Recovery\Password\PasswordRepository;
use App\Services\Auth\Password\PasswordRecoveryService;

class RecoveryPasswordController extends Controller
{
     
    /**
     * @var User
     */
    protected $user;
    /**
     * @var PasswordReset
     */
    protected $passwordReset;

    /**
     * @var PasswordRecoveryService
     */
    protected $passwordRecoveryService;
    
    public function __construct(User $user,PasswordReset $passwordReset, PasswordRepository $passwordRepo, PasswordRecoveryService $passwordRecoveryService){
        $this->user = $user;
        $this->passwordReset = $passwordReset;
        $this->passwordRepo = $passwordRepo;
        $this->passwordRecoveryService = $passwordRecoveryService;

    }

    /** Forgot Password 
     * @param ForgotPasswordRequest $request
     * @return JsonResponse
     */
    public function forgotPassword(ForgotPasswordRequest $request){
        $result =  $this->passwordRepo->forgotPassword($request,$this->passwordReset);
        if(is_string($result)) return clientError(0,$result);// Return the error message if data is missing
        return successResponse(0,$result);
    }

         /**
    * Check Code .
    * @param CheckCodeRequest $request
    * @param User $model
    * @return object
    */
    public function checkCode(checkCodeRequest $request){
        $data= $request->validated();
        $objectCode= app(ProccessCodesService::class)->checkCode($this->passwordReset,$data['code']);
        if(is_string($objectCode)) return  $objectCode;
        $infoUser = session('info_user');
        $data = $this->passwordRecoveryService->prepareMessageData($this->passwordReset, $infoUser);
        // app(SendingMessagesService::class)->sendingMessage($data);
        return successResponse(0,$objectCode);
    }

    /** Resend Code
    * @param PasswordReset $model
    * @return object
    */
    public function resendCode(){
        $result = $this->passwordRepo->resendCode($this->passwordReset);
        if(is_string($result)) return clientError(0,$result);
        return successResponse(0,$result);
    }

    /** Reset Password
     * @param ResetPasswordRequest $request
     * @return JsonResponse
     */
    public function resetPassword(ResetPasswordRequest $request){
        $data = $request->validated();
        // Fetch the user based on email or phone number
        $result = $this->passwordRepo->resetPassword($request);
        if (!$result)  return clientError(0,$result);
        return successResponse(0,$result);
    }

}
