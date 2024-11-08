<?php
namespace App\Services\Auth\Login;

interface LoginServiceInterface{
    public function checkLogin($request);
}