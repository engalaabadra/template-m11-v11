<?php

namespace Modules\Wallet\Http\Controllers\API;
use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;
use Modules\Wallet\Repositories\WalletRepository;
use Modules\Wallet\Entities\Wallet;
use Modules\Wallet\Resources\User\WalletResource;
use Modules\Wallet\Http\Requests\AddIntoWalletRequest;

class WalletController extends Controller
{
    /**
     * @var WalletRepository
     */
    protected $walletRepo;
        /**
     * @var Wallet
     */
    protected $wallet;
    
    public $eagerLoading = ['user'];
    /**
     * WalletResourceController constructor.
     *
     * @param WalletRepository $wallets
     */
    public function __construct( Wallet $wallet,WalletRepository $walletRepo)
    {
        $this->wallet = $wallet;
        $this->walletRepo = $walletRepo;
    }
    /**
     * Display a listing of the resource via (all , pagination).
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $wallet=$this->walletRepo->balance($this->wallet,$this->wallet->eagerLoading);
        if(is_numeric($wallet)) return clientError(4);
        $data = new WalletResource($wallet);
        return successResponse(0,$data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddIntoWalletRequest $request)
    {
        $result=  $this->walletRepo->store($request,$this->wallet,$this->wallet->eagerLoading);
        if(is_numeric($result)) return clientError(4);// Return 404 not found
        if(is_string($result)) return clientError(0,$result);// Return the error message if data is missing
        return  successResponse(0,$result);
    }

    public function withdraw(DeleteFromWalletRequest $request)
    {
        $wallet= $this->walletRepo->withdraw($this->wallet,$this->requestWithdrawing,$request);
        if(is_numeric($wallet)) return clientError(4);// Return 404 not found
        if(is_string($wallet)) return clientError(0,$wallet);// Return the error message if data is missing
        return  successResponse(2,new WalletResource($wallet));  
    }

    
    // public function payToReservation(payToReservationRequest $request,$reservationId){
    //     $wallet=$this->walletRepo->payToReservation($request,$this->wallet,$reservationId);
    //     if(is_string($wallet)) return clientError(0,$wallet);
    //     return successResponse(1,new WalletResource($wallet));
    // }
}
