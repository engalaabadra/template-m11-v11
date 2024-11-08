<?php
namespace App\GeneralClasses;

class MethodsClass{
    public function checkUserOwnerItem($item){
        $user = auth()->guard('api')->user();
        // Check if authenticated user owns the item
        if ($user && $item->user_id !== $user->id)  return trans('messages.you cannt make any thing here');
        // Check if session user owns the item (if session_id exists)
        if (!$user && isset($item->session_id) && $item->session_id !== sessionUser())  return trans('messages.you cannt make any thing here');
        
    }
    
}
