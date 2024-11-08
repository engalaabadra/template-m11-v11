<?php

namespace App\Services\General;

use App\Models\PasswordReset;
use App\Models\RegisterCodeNum;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Services\General\SendingMessagesService;

class ProccessCodesService{

    // Process phone validation, store code in the database, and send a code as an SMS message
    public function processPhone($model, $request, $code, $msg=null)
    {
        //check phone no , country_id -> validaty , and store code in db ,send  a code as msg
        $user = null;
        if ($model instanceof PasswordReset) {
            $user = User::where([
                'phone_no' => $request->phone_no,
                'country_id' => $request->country_id
            ])->first();
            if (!$user)  return trans('messages.your country is wrong, please enter your correct country or wrong phone number.');
        }
        $model->updateOrCreate(
            ['phone_no' => $request->phone_no],
            [
                'phone_no' => $request->phone_no,
                'country_id' => $request->country_id,
                'code' => $code,
            ]
        );

        // Send the SMS message with the code
        // app(SendingMessagesService::class)->sendingMessage(['phone_no' => $request->phone_no, 'message' => $msg]);
    }

    // Process email validation, store code in the database, and send a code via email
    public function processEmail($model, $request, $code)
    {
        $model->updateOrCreate(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'code' => $code,
            ]
        );
        $dataEmail = [
            'code' => $code,
            'email' => $request->email,
            'type' => 'check-code',
        ];
        // Send the email with the code
        // app(SendingMessagesService::class)->sendingMessage($dataEmail);
    }

    // Check the code, validate expiration, create or retrieve user, and generate a token
    public function checkCode($model, $code)
    {
        $infoUser = session('info_user');
        $resultCodeUser = $this->findCodeUser($model, $code, $infoUser);
        if (!$resultCodeUser) return trans('messages.code is invalid, try again');
        // Check if the code is expired (more than an hour old)
        if ($resultCodeUser->created_at->lt(now()->subHour())) {
            $resultCodeUser->delete();
            return trans('messages.code has expired');
        }
        // Create or retrieve user and generate a token
        if($model instanceof RegisterCodeNum){
            //check if this email || phone exist in users table db            
            isset($infoUser->email) 
                ? $user = User::create(['email'=>$infoUser->email,'password'=>$infoUser->password,'code'=>$infoUser->code])
                : $user = User::create(['phone_no'=>$infoUser->phone_no,'country_id'=>$infoUser->country_id,'password'=>$infoUser->password,'code'=>$infoUser->code]);
            $user->roles()->attach([3]); // Assign role to new user
            return [
                'user' => $user,
                'token' => $user->createToken('token')->accessToken,
                'code' => $code
            ];
        }else{
            $user = isset($infoUser->email)
                        ? User::where('email', $infoUser->email)->first()
                        : User::where(['phone_no' => $infoUser->phone_no, 'country_id' => $infoUser->country_id])->first();
            return [
                'user' => $user,
                'code' => $code
            ];
        }
    }

    // Private method to find a user by code, phone, or email
    private function findCodeUser($model, $code, $infoUser)
    {
        $queryConditions = ['code' => $code];
        if (isset($infoUser->phone_no)) {
            $queryConditions['phone_no'] = $infoUser->phone_no;
            $queryConditions['country_id'] = $infoUser->country_id;
        } elseif (isset($infoUser->email)) $queryConditions['email'] = $infoUser->email;
        return $model->where($queryConditions)->first();
    }
}
