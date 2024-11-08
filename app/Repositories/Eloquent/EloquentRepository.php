<?php

namespace App\Repositories\Eloquent;

use App\GeneralClasses\MediaClass;
use App\Scopes\ActiveScope;
use PHPUnit\Framework\isEmpty;
use App\Repositories\Eloquent\EloquentRepositoryInterface;

class EloquentRepository  implements EloquentRepositoryInterface
{
      /**
     * @var MediaClass
     */
    protected $mediaClass;
    
    /**
     * EloquentRepository constructor.
     *
     * @param MediaClass $mediaClass
     */
    public function __construct( MediaClass $mediaClass)
    {
        $this->mediaClass = $mediaClass;
    }

    public function find($model, $data, $colName = 'id')
    {
        // Build query and return the first match or abort, Use either the model string or instance to build the query
        $query = is_string($model) ? $model::withoutGlobalScope(ActiveScope::class) : $model->withoutGlobalScope(ActiveScope::class);
        // Include soft-deleted records if necessary
        // if ($isSoftDeletes) $query = $query->withTrashed();        
        return $query->where($colName, $data)->first() ?: 404;
    }
  
    
    /** Get Data (all , pagination) -> Taking into consideration lang
     * @param $model
     * @param $eagerLoading -> relations in model such as in model profile -> user() this relation will use it in (with)
     * @return array -> paginate if in param use word page || all if not use page in param
     */
    public function getData($model, $eagerLoading = null)
    {
        $query = $model->where('main_lang', lang());
        if ($eagerLoading  && isEagerLoading()==1)  $query = $query->with($eagerLoading);
        return page() ?  $query->paginate(total()) : $query->get();
    }
    /** search (all, pagination)
     * @param $model
     * @param $word
     * @return array
     */
    public function search($model, $words, $col = 'name')
    {
        return $model->where($col, 'like', '%' . $words . '%')->paginate();
    }

    /** trash (pagination)
     * @param $model
     * @return array
     */
    public function trash($model)
    {
        $trashedItems = $model->onlyTrashed()->get(); 
        if(isEmpty($trashedItems)) return 404;
        return $trashedItems->paginate();
    }
    /** store
     * @param $request
     * @param $model
     * @param $eagerLoading -> relations in model such as in model comment -> post() this relation will use it in (load)
     * @return object
     */
    public function store($request, $model, $eagerLoading = null)
    {
        $data = $request->validated();
        $enteredData = array_diff_key($data, array_flip(['file']));// Filter out 'file' key and either update or create the model item
        $item = $model->create($enteredData);
        if (isset($data['file']))   $this->mediaClass->handleSingleFileUpload($data['file'], modelName($model) . '-files', modelName($model), $item);        
        return $eagerLoading ? $item->load($eagerLoading) : $item;
    }
    /** store translation (via language)
     * @param $data
     * @param $model
     * @param $id
     * @return object
     */
    public function storeTrans($data, $model, $id)
    {
        // Use array_merge to cleanly assign translations
        $data = array_merge($data, [
            'translate_id' => $id,
            'main_lang' => getallheaders()['lang'] ?? config('app.locale')
        ]);
        return $model->create($data);
    }
    /** Show
     * @param $id
     * @param $model
     * @param $eagerLoading -> relations in model such as in model comment -> post() this relation will use it in (load)
     * @return object
     */
    public function show($id, $model, $eagerLoading = null)
    {
        $item = $model->find($id) ?? 404;
        return $eagerLoading ? $item->load($eagerLoading) : $item;
    }
    /** Update
     * @param $request
     * @param $id
     * @param $model
     * @param $eagerLoading -> relations in model such as in model comment -> post() this relation will use it in (load)
     * @return object
     */
    public function update($request, $id, $model, $eagerLoading = null)
    {
        $data = $request->validated();
        $item = $model->find($id) ?? 404;
        $enteredData = array_diff_key($data, array_flip(['file']));// Filter out 'file' key and either update or create the model item
        $item->update($enteredData);
        if (isset($data['file']))   $this->mediaClass->handleSingleFileUpload($data['file'], modelName($model) . '-files', modelName($model), $item);
        return $eagerLoading ? $item->load($eagerLoading) : $item;
    }
    /** Restore
     * @param $id
     * @param $model
     * @return object
     */
    public function restore($id, $model)
    {
        $item = $model->onlyTrashed()->findOrFail($id);
        if(!$item) return 404;
        $item->restore();
        return $item;
    }
    /** Restore All
     * @param $model
     * @return array
     */
    public function restoreAll($model)
    {
        $items =  $model->onlyTrashed()->get();
        if(isEmpty($items)) return 404;
        $items->restore();
        return $items;
    }
    /** Destroy
     * @param $id
     * @param $model
     * @param $eagerLoading -> relations in model such as in model comment -> post() this relation will use it in (load)
     * @return object
     */
    public function destroy($id, $model, $eagerLoading = null)
    {
        $item = $model->find($id) ?? 404;
        if ($item->deleted_at !== null)  return 404;
        $item->delete();
        if (isSoftDeletes($model))  return $eagerLoading ? $item->load($eagerLoading) : $item;
        else $this->mediaClass->handleFileDeletion($item);
        return $item;
    }

    /** Force Delete
     * @param $id
     * @param $model
     * @param $eagerLoading -> relations in model such as in model comment -> post() this relation will use it in (load)
     */
    public function forceDelete($id, $model, $eagerLoading = null)
    {
        $itemInTable = $model->find($id);
        if(!$itemInTable) return 404;
        $itemInTrash = $model->onlyTrashed()->findOrFail($id);
        if(!$itemInTrash) return 404;
        $itemInTrash->forceDelete();
        if(in_array('file',$eagerLoading) && isset($itemInTrash->file)) $this->mediaClass->handleFileDeletion($itemInTrash);
        if(in_array('files',$eagerLoading) && isset($itemInTrash->files)) $this->mediaClass->handleFilesDeletion($itemInTrash->files);
    }
    /** Change Activate
     * @param $id
     * @param $model
     * @return object
     */
    public function changeActivate($id, $model)
    {
        $item = $model->find($id) ?? 404;
        $item->update(['active' => $item->active == 1 ? 0 : 1]);
        return $item;
    }
}

