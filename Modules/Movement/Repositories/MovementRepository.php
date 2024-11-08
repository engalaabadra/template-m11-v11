<?php
namespace Modules\Movement\Repositories;

use App\Repositories\Eloquent\EloquentRepository;
 
class MovementRepository extends EloquentRepository
{
    /** Get Data (all , pagination) -> Taking into consideration lang
     * @param $model
     * @param $eagerLoading -> relations in model such as in model profile -> user() this relation will use it in (with)
     * @return array -> paginate if in param use word page || all if not use page in param
     */
    public function getData($model, $eagerLoading = null)
    {
        $query = $model;
        if ($eagerLoading  && isEagerLoading()==1)  $query = $query->where('user_id',auth()->guard('api')->user()->id)->with($eagerLoading);
        return page() ?  $query->paginate(total()) : $query->get();
    }
}
