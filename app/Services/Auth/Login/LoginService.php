<?php
namespace App\Services\Auth\Login;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\Auth\Login\LoginServiceInterface;

class LoginService implements LoginServiceInterface{
    
    /**
     * Check if the user have the correct Credentials.
     * @param $request
     * @return object
     */
    public function checkLogin($request)
    {
        $emailOrPhone = $request->get('email') ?: $request->get('phone_no');
        $user = User::with('roles:name')
                ->where(function ($query) use ($emailOrPhone, $request) {
                    $query->where('email', $emailOrPhone)
                        ->orWhere(function ($query) use ($emailOrPhone, $request) {
                            $query->where('phone_no', $emailOrPhone)
                                    ->where('country_id', $request->get('country_id'));
                        });
                })
                ->first();
        if (!$user || $request->get('password') !== $user->password) return trans('messages.Invalid credentials');
        if ($request->has('fcm_token')) $user->update(['fcm_token' => $request->fcm_token]);
        return $user;
    }

}
