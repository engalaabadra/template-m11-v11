<?php

namespace Modules\Payment\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModel;
 

class PaymentLog extends BaseModel
{
    use  SoftDeletes;
    protected $appends = ['original_active'];
    public $guarded = [];

}
