<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\General\SendingNotificationsService;
use Modules\Notification\Repositories\User\NotificationRepository;
use Modules\Notification\Entities\Notification;
use Modules\Notification\Resources\User\NotificationResource;
use Modules\Notification\Http\Requests\UpdateFcmRequest;
use Modules\Notification\Http\Requests\SendNotificationRequest;

class NotificationController extends Controller
{
    /**
     * @var NotificationRepository
     */
    protected $notificationRepo;
        /**
     * @var Notification
     */
    protected $notification;
    

    /**
     * NotificationController constructor.
     *
     * @param NotificationRepository $notifications
     */
    public function __construct( Notification $notification,NotificationRepository $notificationRepo)
    {
        $this->notification = $notification;
        $this->notificationRepo = $notificationRepo;
    }
    /**
     * Display a listing of the resource via (all , pagination).
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $notifications=$this->notificationRepo->getData($this->notification,$this->notification->eagerLoading);
        $data = NotificationResource::collection($notifications);
        if (page()) $data = getDataResponse($data);
        return successResponse(0,$data);
    }
    public function updateFcm(UpdateFcmRequest $request){
        $data = $request->validated();
        $user= auth()->guard('api')->user()->update(['fcm_token' => $data['fcm_token']]);// Directly update the FCM token for the authenticated user
        return successResponse(2,$user);
    }
    public function sendNotificationMethod(SendNotificationRequest $request,$userId){
        $data=$request->validated();
        $notification=app(SendingNotificationsService::class)->sendNotification($data,$userId,$type=null);
        if(is_numeric($notification)) return clientError(4);// Return 404 Not Found
        if(is_string($notification)) return clientError(0,$notification);// Return the error message if data is missing
        return successResponse(2,$notification->load($this->notification->eagerLoading));
    }
}

