<?php

namespace Modules\Movement\Entities\Traits;

use Modules\Wallet\Entities\Wallet;

trait MovementRelationsTrait
{
    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }
    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
