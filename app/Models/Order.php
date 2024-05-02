<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable = [
        'user_id',
        'created_at',
        'updated_at'
    ];
    protected $timestamp=true;

    public function users()
    {
    return $this->belongsTo(User::class,'user_id','id');
    }


}
