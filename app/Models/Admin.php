<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table='admins';
    protected $fillable = [
        'name',
        'email',
        'photo',
        'password',
        'com_password',
        'created_at',
        'updated_at'
    ];


    protected $timestamp=true;


    public function scopeSelection($q)
    {
        return $q->select('id','name','email','photo');
    }

    public function getPhotoAttribute($val)
    {
        return ($val!=null)? asset('assets/'.$val):"";
    }
}
