<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table='carts';
    protected $fillable = [
        'num',
        'items',
        'quy',
        'total',
        'name',
        'mobile',
        'address',
        'status',
        'created_at',
        'updated_at'
    ];
    protected $timestamp=true;
}
