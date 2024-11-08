<?php
namespace App\Repositories\Auth\Recovery\Password;

interface PasswordRepositoryInterface{
    public function forgotPassword($request,$model);
    public function resetPassword($request);
}
