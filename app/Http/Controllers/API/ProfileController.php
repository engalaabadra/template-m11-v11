<?php

namespace App\Http\Controllers\API;
 
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Profile;
use App\Http\Requests\Profile\UpdateProfileRequest;
use  App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Resources\ProfileResource;
use App\Repositories\Modules\Profile\ProfileRepository;

class ProfileController extends Controller
{
     

     /**
     * @var ProfileRepository
     */
    protected $profileRepo;
    /**
     * @var User
     */
    protected $user;
    /**
     * @var Profile
     */
    protected $profile;
    
    /**
     * ProfileController constructor.
     *
     * @param ProfileRepository $Profile
     */
    public function __construct(  ProfileRepository $profileRepo, User $user, Profile $profile)
    {
         
        $this->profileRepo = $profileRepo;
        $this->user = $user;
        $this->profile = $profile;
    }


    /**
     * Show the specified resource.
     * @return Responsable
     */
    public function show()
    {
        $user=  $this->profileRepo->show();
        dd(0);
        if(is_numeric($user)) return clientError(4);// Return 404 Not Found
        if(is_string($user)) return clientError(0,$user);// Return the error message if data is missing
        return successResponse(0, new ProfileResource($user));
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Responsable
     */
    public function update(UpdateProfileRequest $request)
    {   
        $userUpdated=  $this->profileRepo->update($request,$this->profile);
        if(is_numeric($userUpdated)) return clientError(4);// Return 404 Not Found
        if(is_string($userUpdated)) return clientError(0,$userUpdated);// Return the error message if data is missing
        return successResponse(2, new ProfileResource($userUpdated));    
    }
    /**
     * Update password.
     * @param UpdatePasswordRequest $request
     * @return Responsable
     */
    public function updatePassword(UpdatePasswordRequest $request){
        $userUpdatedPassword=  $this->profileRepo->updatePassword($request,$this->user);   
        if(is_numeric($userUpdatedPassword)) return clientError(4);// Return 404 Not Found
        if(is_string($userUpdatedPassword)) return clientError(0,$userUpdatedPassword);// Return the error message if data is missing
        return successResponse(2,new ProfileResource($userUpdatedPassword));
    }
}
