<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'trx_order';
    protected $fillable = [
        'id_order',
        'order_name',
        'status_order',
        'table',
        'pict_foo ',
        'category',
        'flag',
        'created_by',
        'updated_by'
        
    ];
}