<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;
    protected $table='subscribes';
    protected $fillable = [
        'name',
        'email',
        'code',
        'created_at',
        'updated_at'
    ];
    protected $timestamp=true;

}
