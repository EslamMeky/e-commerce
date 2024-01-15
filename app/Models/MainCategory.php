<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;
    protected $table='main_categories';
    protected $fillable = [
        'name_ar',
        'name_en',
        'photo',
        'created_at',
        'updated_at'
    ];

    protected $timestamp=true;

    public function scopeSelection($q)
    {
        return $q->select('id','name_ar','name_en','photo','created_at','updated_at');
    }

    public function getPhotoAttribute($val)
    {
        return ($val!=null)? asset('assets/'.$val):"";
    }


    public function subCategory()
    {
        return $this->hasMany(SubCategory::class ,'category_id','id');
    }



}
