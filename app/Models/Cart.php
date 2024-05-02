<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table='carts';
    protected $fillable = [
        'order_id',
        'items',
        'quy',
        'total',
        'status',
        'created_at',
        'updated_at'
    ];
    protected $timestamp=true;

    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
