<?php
namespace App\Repositories\Auth\Register\User;

interface RegisterRepositoryInterface{
    public function register($request,$model);
}
