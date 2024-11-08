<?php
namespace App\Repositories\Modules\Chat;

interface ChatRepositoryInterface
{

    public function getData($model, $eagerLoading=null);
    public function store($request,$model,$eagerLoading=null);
    public function update($request, $id, $model, $eagerLoading = null);
    public function destroy($id, $model, $eagerLoading = null);
    public function deleteAll($model);
}

