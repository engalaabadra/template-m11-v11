<?php
namespace App\Repositories\Auth\Login\Admin;

interface LoginRepositoryInterface{
    public function login($request,$model);
    public function logout($request);
}