<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'ms_menu';
    protected $fillable = [
        'food_name',
        'price',
        'description',
        'pict_food',
        'category',
        'flag',
        'created_by',
        'updated_by'
        
    ];
}