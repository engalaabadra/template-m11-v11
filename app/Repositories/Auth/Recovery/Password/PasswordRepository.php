<?php
namespace App\Repositories\Auth\Recovery\Password;

use App\Services\General\MsegatSmsService;
use App\Services\General\ProccessCodesService;
 
use App\Models\User;
use App\Services\General\SendingMessagesService;
use App\Services\Auth\Password\PasswordRecoveryService;

class PasswordRepository  implements PasswordRepositoryInterface{
     
    /**
     * @var PasswordRecoveryService
     */
    protected $passwordRecoveryService;
    public function __construct(PasswordRecoveryService $passwordRecoveryService){
        $this->passwordRecoveryService = $passwordRecoveryService;

    }
    /**
    * Forgot Password .
    * @param ForgotPasswordRequest $request
    * @param User $model
    * @param string $code
    * @return object
    */
    public function forgotPassword($request,$model){//model: password_resets , model1: user
        $data=$request->validated();
        $data['code'] = getCode();
        if ($request->has('phone_no')) {
            $msg ="رمز تغيير كلمة المرور:" . $data['code']." يرجى استخدامه فورًا.";
            $result = app(ProccessCodesService::class)->processPhone($model,$request,$data['code'],$msg);
            if(is_string($result)) return $result;
        } if ($request->has('email')) {
            $result = app(ProccessCodesService::class)->processEmail($model,$request,$data['code']);
            if(is_string($result)) return $result;
        }
        session(['info_user'=>(object)$data]);
        return $data;
    }

    /** Resend Code
    * @param PasswordReset $model
    * @return object
    */
    public function resendCode($model){
        //get data info_user from session
        $infoUser=session('info_user');
        if(!$infoUser) return trans('messages.You must make forgot password before this');
        // Generate a new password reset code
        $code = getCode();
        // Process based on available phone number or email
        $result = $this->passwordRecoveryService->processContactMethod($model, $infoUser, $code);
        if(is_string($result)) return $result;
        $infoUser->code = $code;
        return [
            'email'=>isset($infoUser->email) ? $infoUser->email : null,
            'phone_no'=>isset($infoUser->phone_no) ? $infoUser->phone_no : null,
            'code'=>$infoUser->code
        ];
    }

    
    public function resetPassword($request)
    {
        $data = $request->validated();
        // Fetch the user based on email or phone number
        // Check if the email is provided and find the user by email
        if (isset($request->email))  $resultUser = User::where('email', 'like', $request->email)->first();
        // Check if phone is provided and find the user by phone
        elseif(isset($request->phone_no)) $resultUser = User::where(['phone_no'=> $request->phone_no , 'country_id'=> $request->country_id])->first();
        if (!$resultUser)  return trans('messages.User not found');
        $resultUser->update(['password'=>$data['password']]);
        return $resultUser;
    }

}
