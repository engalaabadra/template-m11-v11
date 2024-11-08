<?php
namespace App\Repositories\Modules\Review;

use App\Repositories\Eloquent\EloquentRepository;
use App\GeneralClasses\MethodsClass;

class ReviewRepository extends EloquentRepository implements ReviewRepositoryInterface
{
    /**
     * @var MethodsClass
     */
    protected $methodsClass;
    
    /**
     * ReviewController constructor.
     *
     * @param MethodsClass $methodsClass
     */
    public function __construct( MethodsClass $methodsClass)
    {
        $this->methodsClass = $methodsClass;
    }

     /**
     * Get data Review (all, pagination).
     * @param Review $model
     * @param array $eagerLoading -> relation with model Review ['user']
     * @return array
     */
    public function getData($model, $eagerLoading = null)
    {
        $query = $model->where('user_id',auth()->guard('api')->user()->id);
        if($eagerLoading && isEagerLoading()==1) $query = $model->with($eagerLoading);
        return page() ?  $query->paginate(total()) : $query->get();
    }
    /** Store Review
     * @param StoreReviewRequest $request
     * @param Review $model
     * @param array $eagerLoading -> ['user']
     * @return object
     */
    public function store($request, $model, $eagerLoading = null)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->guard('api')->user()->id;
        //check if this user add fav on this post before it -> will delete this fav on this post
        // $favUserPost = $model->where(['user_id'=>$data['user_id'],'post_id'=>$data['post_id']])->first();
        // if($favUserPost){
        //     $favUserPost->delete();
        //     return $favUserPost;
        // }else{
        //     $item = $model->create($data);
        //     return $item->load($eagerLoading);
        // }
    }   

    /** Destroy
     * @param $id
     * @param $model
     * @param $eagerLoading -> relations in model such as in model comment -> post() this relation will use it in (load)
     * @return object
     */
    public function destroy($id, $model, $eagerLoading = null)
    {
        $item = $model->find($id);
        if(!$item) return 404;
        $this->methodsClass->checkUserOwnerItem($item);
        $item->delete();
        if (isSoftDeletes($model))  return $eagerLoading ? $item->load($eagerLoading) : $item;
        else $this->mediaClass->handleFileDeletion($item);
        return $item;
    }


}
