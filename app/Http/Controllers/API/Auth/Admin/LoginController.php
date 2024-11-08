<?php

namespace App\Http\Controllers\API\Auth\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\Auth\Login\Admin\LoginRepository;
use Illuminate\Http\Request;
use App\Models\User;
use Modules\Profile\Resources\AdminResource;

class LoginController extends Controller
{
    /**
     * @var User
    */
    protected $user;
    /**
     * @var LoginRepository
    */
    protected $loginRepo;

    public function __construct(User $user , LoginRepository $loginRepo){
        $this->user = $user;
        $this->loginRepo = $loginRepo;
    }  

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request){
         $user = $this->loginRepo->checkLogin($request);
        if(is_string($user)) return clientError(0,$user);// Return the error message if data is missing
        $roles= $user->roles->pluck('name')->toArray();
        if(!in_array('admin',$roles)) return trans('messages.Invalid credentials');
        $data=[
            "token"=>$user->createToken('token')->accessToken,
            // "admin" => new AdminResource($result),
        ];
        return successResponse(0, $data,trans('auth.Logged in successfully'));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
   public function destroy(Request $request)
    {
        if(!hasRole('admin')) return clientError(0,trans('messages.Invalid credentials'));// Return the error message if data is missing
        $request->user()->token()->revoke();
        return successResponse(4);
    }
}

