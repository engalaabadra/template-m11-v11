<?php

namespace Modules\Payment\Entities;

use Modules\Payment\Entities\Traits\GeneralPaymentTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModel;
 

class PaymentMethod extends BaseModel
{
    use  SoftDeletes;
    protected $appends = ['original_active'];
    protected $casts = [
        'options' => 'json'
    ];
    public $guarded = [];
    public $eagerLoading = ['file'];

    public function enable(){
        $this->update(['active'=>1]);
    }
    public function disable(){
        $this->update(['active'=>0]);
    }

    public function getEnanabledAttribute(){//return true || false
        return $this->active === 1 ;
    }
   

}
