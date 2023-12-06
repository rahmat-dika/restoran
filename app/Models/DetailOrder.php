<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $table = 'trx_detail_order';
    protected $fillable = [
        'id_order',
        'id_food',
        'total',
        'flag',
        'created_by',
        'updated_by'
        
    ];
}