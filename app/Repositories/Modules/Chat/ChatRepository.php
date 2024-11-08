<?php
namespace App\Repositories\Modules\Chat;

use App\Repositories\Eloquent\EloquentRepository;
use App\Events\MessageCreated;
use App\GeneralClasses\MethodsClass;
use App\GeneralClasses\MediaClass;
use App\Models\User;

class ChatRepository extends EloquentRepository implements ChatRepositoryInterface
{
     /**
     * @var ChatRepository
     */
    protected $chatRepo;
    /**
     * @var Chat
     */
    protected $chat;
     /**
     * @var MethodsClass
     */
    protected $methodsClass;
     /**
     * @var MediaClass
     */
    protected $mediaClass;

    public $eagerLoading = ['file','files','client','user'];
    
    /**
     * ChatRepository constructor.
     *
     * @param MethodsClass $methodsClass
     */
    public function __construct( MethodsClass $methodsClass, MediaClass $mediaClass)
    {

        $this->methodsClass = $methodsClass;
        $this->mediaClass = $mediaClass;
    }

    /**
     * Get data chat (all, pagination).
     * @param Chat $model
     * @param array $eagerLoading -> relation with model chat ['file','client','user']
     * @return array
     */
    public function getData($model, $eagerLoading = null)
    {
        // Validate if ID exists and is numeric, then find the model item
        if (!clientId() || !is_numeric(clientId())) return trans('messages.must enter a valid numeric id');
        $item = $model->find(clientId()) ?? 404;
        if(!$item) return 404;
        $query = $model->where(['client_id'=>clientId(),'user_id'=>auth()->guard('api')->user()->id]);
        if ($eagerLoading  && isEagerLoading()==1)  $query = $query->with($eagerLoading);
        return page() ?  $query->paginate(total()) : $query->get();
    }
    /** Store Chat
     * @param StoreChatRequest $request
     * @param Chat $model
     * @param array $eagerLoading -> ['file','client','user']
     * @return object
     */
    public function store($request,$model,$eagerLoading=null){
        $data = $request->validated();
        $enteredData = array_diff_key($data, array_flip(['file']));// Filter out 'file' key and either update or create the model item
        $user = auth()->guard('api')->user();
        $enteredData['user_id'] =  $user->id;
        $enteredData['sender_id']=$user->id;
        $enteredData['client_id']=  clientId();
        $enteredData['recipient_id']=  clientId(); 
        $item = $model->create($enteredData);
        broadcast(new MessageCreated($item))->toOthers();
        if (isset($data['file']))   $this->mediaClass->handleSingleFileUpload($data['file'], modelName($model) . '-files', modelName($model), $item);        
        return $eagerLoading ? $item->load($eagerLoading) : $item;

    }

    /** Destroy Chat
     * @param  int $id
     * @param Chat $model
     * @param  array $eagerLoading -> ['file','client','user']
     * @return object
     */
    //methods for deleting
    public function destroy($id, $model, $eagerLoading = null)
    {
        $item = $model->find($id) ?? 404;
        if (is_numeric($item) || $item->deleted_at !== null)  return 404;
        if($this->methodsClass->checkUserOwnerItem($item)) return $this->checkUserOwnerItem($item);
        $item->delete();
        if (isSoftDeletes($model))  return $eagerLoading ? $item->load($eagerLoading) : $item;
        else $this->mediaClass->handleFilesDeletion($item);
        return $item;
    }

    /** Delete All chats
     * @param Chat $model
     */
    public function deleteAll($model){
        $msgsUserClient = $model->where(['user_id'=>auth()->guard('api')->user()->id,'client_id'=>clientId()])->count();
        if($msgsUserClient == 0 ) return trans('messages.Not Found Any messages');
         //delete all
        $model->where(['user_id'=>auth()->guard('api')->user()->id,'client_id'=>clientId()])->truncate();
       
    }
}

