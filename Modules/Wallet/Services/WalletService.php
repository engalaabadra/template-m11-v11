<?php
namespace Modules\Wallet\Services;

use Modules\Movement\Services\MovementService;

class WalletService implements WalletServiceInterface{

    /**
     * @var MovementService
     */
    protected $movementService;
    
    /**
     * MovementServiceController constructor.
     *
     * @param MovementService $movementService
     */
    public function __construct( MovementService $movementService)
    {
        $this->movementService = $movementService;
    }

    public function getUrl($walletId,$amount){
        $data['redirect']['url']= url(route("api.payments.callback-wallet",[$walletId,$amount]));
        $url = $this->setDataPayment($id,$data,$amount);
        return $url->errors[0]->description ?? $url;
    }

    public function addIntoWallet($model,$price,$userId,$itemId){
        //will add price into wallet user
        $priceShareTemplate = calShareTemplate($price);
        $wallet=$model->where(['user_id'=>$userId])->first();
        $priceShareUser=$price - $priceShareTemplate;
        $wallet->balance = $wallet->balance + ($priceShareUser);
        $wallet->save();

        //add a movement
        $nameMovement = trans('messages.adding into wallet');
        $typeMovement = '1';//Deposition
        $this->movementService->createMovement($model,$priceShareUser,$userId,$nameMovement,$typeMovement,$itemId);

        return $wallet;
    }
    public function addIntoWalletCallback($model,$price,$walletId){
        //will add price into wallet user
        $wallet=$model->where(['id'=>$walletId])->first();
        $wallet->balance = $wallet->balance + ($price);
        $wallet->save();
        //add a movement
        $nameMovement = trans('messages.adding into wallet');
        $typeMovement = '1';//Deposition
        $this->movementService->createMovement($model,$price,$wallet->user_id,$nameMovement,$typeMovement);
        return $wallet;
    }
}

