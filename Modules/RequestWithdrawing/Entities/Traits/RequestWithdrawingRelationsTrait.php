<?php

namespace Modules\RequestWithdrawing\Entities\Traits;

use Modules\Wallet\Entities\Traits\Wallet;

trait RequestWithdrawingRelationsTrait
{

    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }
}
