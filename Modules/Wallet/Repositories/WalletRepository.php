<?php
namespace Modules\Wallet\Repositories;

use App\Repositories\Eloquent\EloquentRepository;
 
use Modules\Wallet\Repositories\WalletRepositoryInterface;
use Modules\Wallet\Services\WalletService;

class WalletRepository extends EloquentRepository implements WalletRepositoryInterface
{

     /**
     * WalletRepository constructor.
     *
     * @param WalletService $walletService
     */
    public function __construct( WalletService $walletService)
    {
        $this->walletService = $walletService;
    }
    ///get data//
    public function balance($model,$eagerLoading){
        $user=auth()->guard('api')->user();
        $wallet=$model->where(['user_id'=>$user->id])->first();
        if(!$wallet) return 404;
        return  $wallet->load($eagerLoading);
    }
    public function store($request,$model,$eagerLoading=null){
        $data = $request->validated();
        $user=auth()->guard('api')->user();
        $amount = $data['amount'];
        $wallet=$model->where(['user_id'=>$user->id])->first();
        if(!$wallet) $wallet = $model->create(['balance'=>$amount]);
        $url = $this->walletService->getUrl($wallet->id,$amount);
        dd($url);
        return  [
                    'url'=>$url,
                    'wallet'=>$wallet->load($eagerLoading),
                ];
    }

}
