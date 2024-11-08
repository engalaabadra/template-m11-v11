<?php
namespace App\Repositories\Modules\Profile;

use App\Models\User;
 
use App\Repositories\Modules\Profile\ProfileRepositoryInterface;
use Illuminate\Support\Arr;

class ProfileRepository implements ProfileRepositoryInterface
{

    /**
     * show user profile.
     * @param User $model
     * @return object || @return int
     */
    public function show(){
        dd(2);
        $user = $model->find(auth()->guard('api')->user()->id) ?? 404;
        return $user->load(['profile.file']);
    }
    /**
     * update profile.
     * @param UpdateProfileRequest $request
     * @param Profile $model
     * @return object
     */
    public function update($request,$model){
        $user = $model->find(auth()->guard('api')->user()->id) ?? 404;
        $data= $request->validated();
        $dataFillable = $model->fillable;
        //update info. in user table
        $enteredData= Arr::except($data,$dataFillable);
        $user->update($enteredData);
        // Check if any of the fields are present in the $data
        $profile = $model->where('user_id',$user->id)->first();
        // Convert birth_date to Y-m-d format before saving
        $data['birth_date'] = Carbon::createFromFormat('d-m-Y', $data['birth_date'])->format('Y-m-d');
        // If profile is not found, create a new one and send welcome email
        if (!$profile) {
            $data['user_id'] = $user->id;
            $model->create($data);
            $dataEmail = [
                'email' => $user->email,
                'user' => $user->full_name,
                'type' => 'welcome',
                'to' => 'user'
            ];
            //  app(SendingMessagesService::class)->sendingMessage($dataEmail);
        } else {
            // Update existing profile
            $profile->update($data);
        }
        if(!empty($data['file'])) $this->handleSingleFileUpload($data['file'], 'profiles-files', 'App\Models\User', $user->profile);
        return $user->load(['profile.file']);
    }
    /**
     * update password.
     * @param UpdatePasswordRequest $request
     * @param User $model
     * @return object
     */
    public function updatePassword($request,$model){
        $user = $model->find(auth()->guard('api')->user()->id) ?? 404;
        $data=$request->validated();
        //check data for updating password && after check will update password
        $resultCheckPass = $this->checkDataPass($request,$user);
        if($resultCheckPass) return $resultCheckPass ;
        // Update password
        $user->password = $data['new_password'];//hashed default in model profile by motator
        $user->save();
        return $user;
    }
}

