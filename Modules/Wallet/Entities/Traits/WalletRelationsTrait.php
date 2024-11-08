<?php
namespace Modules\Wallet\Entities\Traits;
use App\Models\User;
use Modules\Movement\Entities\Movement;
use Modules\RequestWithdrawing\Entities\RequestWithdrawing;

trait WalletRelationsTrait{
    public function requestWithdrawing(){
        return $this->belongsTo(RequestWithdrawing::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function movements(){
        return $this->hasMany(Movement::class);
    }
}
