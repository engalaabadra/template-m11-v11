<?php
namespace App\Repositories\Modules\Profile;

interface ProfileRepositoryInterface
{
    public function show();
   
    public function update($request,$model);
   
    public function updatePassword($request,$model);
}

