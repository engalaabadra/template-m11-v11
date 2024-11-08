<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function () {
    return true;
    return (int) $user->id === (int) $id;
});

Broadcast::channel('Message.User.{userId}.Doctor.{doctorId}', function () {
    return true;
});
//     Broadcast::channel('Message.User.{id}', function ($user, $id) {
//     dd($user);
//     if($user->id == $id){
//         return $user;
//     }
// });


Broadcast::channel('chat.{roomId}', function ($user, $roomId) {
    return ['id' => $user->id, 'name' => $user->full_name];
});