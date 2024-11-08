<?php
namespace Modules\Movement\Services;

use Modules\Movement\Entities\Movement;
use Modules\Movement\Services\UserServiceInterface;

class MovementService  implements MovementServiceInterface
{
    public function createMovement($model,$price,$id,$nameMovement,$type,$role,$reservation_id=null,$payment_log_id=null){
        $movement=new Movement();
        if($reservation_id) $reservation = Reservation::where('id',$reservation_id)->first();  
        if(is_string($model)){//not wallet , from payment method
            $movement->name=$nameMovement;
            $movement->original_value=$price;
            if($reservation_id){
               $movement->reservation_id=$reservation->id; 
            }

        }else{
            $wallet = $this->find($model,$id,'user_id');
            $movement->wallet_id=$wallet->id; 
            $movement->name=$nameMovement;
            $movement->original_value=$price;
            if($type=='1'){//Deposition
                $movement->balance_before=$wallet->balance-$price;
                $movement->balance_after=$wallet->balance;
                if($reservation_id) $movement->reservation_id=$reservation->id;
            }elseif($type=='-1'){//withdrawing
                $movement->balance_before=$wallet->balance+$price;
                $movement->balance_after=$wallet->balance;
                if($reservation_id) $movement->reservation_id=$reservation->id;

            } 
        }
        $movement->payment_log_id=$payment_log_id;
        $movement->type=$type;
        $movement->role=$role;
        $movement->save();  
    }
}
