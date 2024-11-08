<?php

namespace Modules\Payment\Entities;

use Modules\Payment\Entities\Traits\GeneralPaymentTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModel;
 

class Payment extends BaseModel
{
    use  SoftDeletes;
    protected $appends = ['original_active'];
    protected $casts = [
        'payment_response' => 'json'
    ];
    public $guarded = [];
    public $eagerLoading = ['file'];

   

}
