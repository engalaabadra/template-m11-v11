<?php
namespace App\Services\Auth\Password;

interface PasswordRecoveryServiceInterface{
    public function processContactMethod($model, $infoUser, $code);
    public function prepareMessageData($model, $infoUser);

}
