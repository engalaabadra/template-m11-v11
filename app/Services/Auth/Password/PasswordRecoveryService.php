<?php
namespace App\Services\Auth\Password;

use App\Services\General\ProccessCodesService;

class PasswordRecoveryService implements PasswordRecoveryServiceInterface {
     /** Process Contact Method 
    * Resend Code .
    * @param PasswordReset $model
    */
    public function processContactMethod($model, $infoUser, $code)
    {
        // Process phone number if it exists
        if (isset($infoUser->phone_no)) {
            $msg = "رمز تغيير كلمة المرور: " . $code . " يرجى استخدامه فورًا.";
            return app(ProccessCodesService::class)->processPhone($model, $infoUser, $code, $msg);
        }
        // Process email if it exists
        if (isset($infoUser->email)) {
            return app(ProccessCodesService::class)->processEmail($model, $infoUser, $code);
        }
        return trans('messages.No valid contact information found.');
    }


     /**
    * Prepare Message Data .
    * @param RegisterCodeNum $model
    * @param RegisterRequest $request
    * @param string $code
    * @return int OR string
    */
    public function prepareMessageData($model, $infoUser)
    {
        $commonData = [
            'code' => $infoUser->code,
        ];
    
        if ($model instanceof \App\Models\RegisterCodeNum) {
            return array_merge($commonData, [
                'data-user' => $infoUser->email ?? $infoUser->phone_no,
                'type' => 'welcome',
            ]);
        } elseif ($model instanceof \App\Models\PasswordReset) {
            return array_merge($commonData, [
                'email' => $infoUser->email ?? null,
                'phone_no' => $infoUser->phone_no ?? null,
                'type' => 'check-code',
            ]);
        }
        return $commonData;
    }

}
