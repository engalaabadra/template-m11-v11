<?php

namespace Modules\Wallet\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Wallet\Entities\Traits\WalletRelationsTrait;

class Wallet extends Model
{
    use  WalletRelationsTrait, SoftDeletes;
    protected $appends = ['original_active'];
    public $guarded = [];
    public $eagerLoading = ['user','movements','requestWithdrawing'];

}
