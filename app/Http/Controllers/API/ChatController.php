<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Modules\Chat\ChatRepository;
use App\Models\Chat;
use App\Http\Requests\File\UploadFilesRequest;
use 
App\Http\Requests\Chat\StoreChatRequest;
use App\Http\Requests\Chat\UpdateChatRequest;
use App\Resources\ChatResource;

class ChatController extends Controller
{
     
    /**
     * @var ChatRepository
     */
    protected $chatRepo;
    /**
     * @var Chat
     */
    protected $chat;


    public $eagerLoading = ['file','files','client','user'];
    
    /**
     * ChatController constructor.
     *
     * @param ChatRepository $chats
     */
    public function __construct( Chat $chat,ChatRepository $chatRepo)
    {
        $this->chat = $chat;
        $this->chatRepo = $chatRepo;
    }

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $chats=$this->chatRepo->getData($this->chat,$this->chat->eagerLoading);
        if (is_string($chats)) return clientError(0, $chats); // Return the error message if data is missing
        if (is_numeric($chats)) return clientError(4); // Return not found
        $data = ChatResource::collection($chats);
        if (page()) $data = getDataResponse($data);
        return successResponse(0,$data);
    }

    /**
     * store.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatRequest $request){
        $chat=$this->chatRepo->store($request,$this->chat,$this->chat->eagerLoading);
        if (is_string($chat)) return clientError(0, $chat); // Return the error message if data is missing
        if (is_numeric($chat)) return clientError(4); // Return not found
        return  successResponse(1,new ChatResource($chat));

    }
    
    public function storeFiles(UploadFilesRequest $request,$id){
        $chat=$this->uploadFiles($request,$this->reservation,'chats-files',$id);
        if(is_numeric($chat)) return clientError(4);
        return successResponse(1,$chat);
    }

  /**
     * Update the specified resource in storage.
     * @param Request $request 
     * @param int $id
     * @return Responsable
     */
    public function update(UpdateChatRequest $request,$id){
        $chat=$this->chatRepo->update($request,$id,$this->chat,$this->chat->eagerLoading);
        if(is_numeric($chat)) return clientError(4);
        if(is_string($chat)) return clientError(0,$chat);
        return successResponse(1,new ChatResource($chat));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chat= $this->chatRepo->destroy($id,$this->chat,$this->chat->eagerLoading);
        if(is_numeric($chat)) return clientError(4);
        if(is_string($chat)) return clientError(0,$chat);
        return successResponse(2,new ChatResource($chat));  
    }

    /**
     * Delete All the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAll()
    {
        $chats= $this->chatRepo->deleteAll($this->chat);
        if(is_numeric($chats)) return clientError(4);
        if(is_string($chats)) return clientError(0,$chats);
        return  successResponse(2,$chats);
    }

}
