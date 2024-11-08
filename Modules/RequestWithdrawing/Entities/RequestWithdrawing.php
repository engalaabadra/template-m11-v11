<?php

namespace Modules\RequestWithdrawing\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RequestWithdrawing\Entities\Traits\RequestWithdrawingAttributesTrait;
use Modules\RequestWithdrawing\Entities\Traits\RequestWithdrawingRelationsTrait;
 

class RequestWithdrawing extends Model
{
    use  RequestWithdrawingRelationsTrait, RequestWithdrawingAttributesTrait, SoftDeletes;

    protected $appends = ['original_active'];
    protected $table = 'requests_withdrawings';
    public $guarded = [];
    public $eagerLoading = ['wallet'];
    
}
