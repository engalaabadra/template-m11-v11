<?php
namespace App\Repositories\Auth\Login\User;

interface LoginRepositoryInterface{
    public function login($request);
    public function logout($request);
}