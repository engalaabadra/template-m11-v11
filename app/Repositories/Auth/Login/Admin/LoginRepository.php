<?php
namespace App\Repositories\Auth\Login\Admin;

use App\Repositories\Eloquent\EloquentRepository;
use App\Services\Auth\Login\LoginService;

class LoginRepository extends EloquentRepository implements LoginRepositoryInterface{
    
    /**
     * @var LoginService
    */
    protected $loginService;

    public function __construct( LoginService $loginService){
        $this->loginService = $loginService;
    }

     /** Login
     * @param LoginRequest $request
     * @param User $model
     * @return object
     */
    public function login($request,$model){
        $resultLogin = $request->checkLogin($request);
        if(is_string($resultLogin)) return $resultLogin;
        $roles= $resultLogin->roles->pluck('name')->toArray();
        if(!in_array('admin',$roles)) return trans('messages.Invalid credentials');
        return $resultLogin;
    }

    /** Logout
     * @param Request $request
     * @return object
     */
    public function logout($request){
        $roles= auth()->guard('api')->user()->roles->pluck('name')->toArray();
        if(!in_array('admin',$roles)) return trans('messages.Invalid credentials');
        $request->user()->token()->revoke();
        return true;
    }
}
