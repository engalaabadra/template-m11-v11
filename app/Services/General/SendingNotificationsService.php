<?php

namespace App\Services\General;

use App\Models\User;
use Modules\Notification\Entities\Notification;

class SendingNotificationsService{
    public function sendNotification($data, $user_id, $type = null)
    {
        // Find the user and check if exists
        $user = User::find($user_id);
        if (!$user || !$user->fcm_token) return 404;
        $fcmToken = $user->fcm_token;
        $data['user_id'] = $user_id;
        $typeNotification = $type ?? $data['type'];
        // If type is provided, create a notification
        if ($type) {
            $notification = Notification::create($data);
            $notification->type = $typeNotification;
        }
        // Firebase FCM configuration
        $serverKey = config('services.firebase.server_key');
        $url = 'https://fcm.googleapis.com/fcm/send';
        // Build the notification payload
        $notificationData = [
            "to" => $fcmToken,
            "data" => [
                "title" => $data['title'],
                "body" => $data['body'],
                "type" => $typeNotification,
                "sound" => "default",
                "click_action" => "Message"
            ],
            'notification' => [
                "title" => $data['title'],
                "body" => $data['body'],
                "sound" => "default"
            ]
        ];
        $encodedData = json_encode($notificationData);
        // Set up cURL options
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: key=' . $serverKey,
                'Content-Type: application/json'
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,  // Disable SSL verification
            CURLOPT_POSTFIELDS => $encodedData
        ]);
        // Execute the cURL request
        $result = curl_exec($ch);
        if ($result === false) {
            return 'Error occurred while sending via Firebase';
        }
        curl_close($ch);  // Close the cURL connection
        // Handle notification creation if type is not provided
        if (!$type) {
            $notification = Notification::create([
                'title' => $data['title'],
                'body' => $data['body'],
                'user_id' => $user_id,
                'type' => $typeNotification
            ]);
        }
        return json_decode($result);
    }
}
