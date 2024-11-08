<?php

namespace App\Http\Controllers\API\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\Auth\Login\User\LoginRepository;
use App\Resources\ProfileResource;

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
        $user = $this->loginRepo->login($request);
        if(is_string($user)) return clientError(0,$user);// Return the error message if data is missing
        $roles= $user->roles->pluck('name')->toArray();
        if(!in_array('user',$roles)) return trans('messages.Invalid credentials');
        $data=[
            "token"=>$user->createToken('token')->accessToken,
            "user" => new ProfileResource($user),
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
        if(!hasRole('user')) return clientError(0,trans('messages.Invalid credentials'));// Return the error message if data is missing
        $request->user()->token()->revoke();
        return successResponse(4);
    }
}

