<?php
namespace App\Repositories\Auth\Login\User;

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
    public function login($request){
        $user = $this->loginService->checkLogin($request);
        if(is_string($user)) return $user;
        // if(!$user || !$user->roles->contains('name','user')) return trans('messages.Invalid credentials');
        if(!$user || !$user->hasRole('user')) return trans('messages.Invalid credentials');
        return $user;
    }
    /** Logout
     * @param Request $request
     * @return object
     */
    public function logout($request){
        if(!hasRole('user')) return trans('messages.Invalid credentials');
        $request->user()->token()->revoke();
        return true;
    }
}
