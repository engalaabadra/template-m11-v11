<?php
namespace App\Repositories\Eloquent;

interface EloquentRepositoryInterface
{
   public function getData($model, $eagerLoading = null);
   public function trash($model);
   public function find($id,$model, $colName);
   public function show($id,$model);
   public function store($request,$model);
   public function update($request,$id,$model);
   public function restore($id,$model);
   public function restoreAll($model);
   public function destroy($id,$model);
   public function forceDelete($id,$model);
}

