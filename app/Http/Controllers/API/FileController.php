<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\UploadFilesRequest;
use App\GeneralClasses\MediaClass;

class FileController extends Controller
{
    /**
     * @var MediaClass
     */
    protected $mediaClass;

    
    /**
     * FileController constructor.
     *
     * @param MediaClass $mediaClasss
     */
    public function __construct( MediaClass $mediaClass)
    {
        $this->mediaClass = $mediaClass;
    }   
    /**
     * Upload File.
     * @param UploadFilesRequest $request 
     * @return array
     * */
    public function storeFiles(UploadFilesRequest $request,$modelName,$id){
        $authUser = auth()->guard('api')->user();
        $data = $request->validated();
        $modelClass = getModelClass($modelName);
        if(!$modelClass) return clientError(4);
        $model = resolve($modelClass);
        //check if this model is exist in models project
        $item = $model->find($id);
        if(!$item) return clientError(4);
        //check if this user owner this item to upload file
        // 1. Check if authenticated user owns the item
        if ($authUser && $item->user_id !== $authUser->id)  return clientError(0, trans('messages.you cannt make any thing here'));
        // 2. Check if session user owns the item (if session_id exists)
        if (!$authUser && isset($item->session_id) && $item->session_id !== Storage::get('session_id'))  return clientError(0, trans('messages.you cannt make any thing here'));
        $files = $this->mediaClass->handleMultipleFilesUpload($data['files'], $modelName . '-files', $modelName,  $item);
        return successResponse(0, $files);
    }
}
