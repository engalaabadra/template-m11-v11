<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesRecord extends Model
{
    protected $fillable = [
                    'sale_date',
                    'total_amount',
                    'user_id'
                ];
    
}
