<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table='sub_categories';
    protected $fillable = [
        'name_ar',
        'name_en',
        'photo',
        'category_id',
        'active',
        'price',
        'description_ar',
        'description_en',
        'created_at',
        'updated_at'
    ];

    protected $timestamp=true;

    public function scopeSelection($q)
    {
        return $q->select('id','name_ar','name_en','photo','active','category_id','price','description_ar','description_en','created_at','updated_at');
    }

    public function scopeActive($q)
    {
        return $q->where('active',1);
    }

    public function getPhotoAttribute($val)
    {
        return ($val!=null)? asset('assets/'.$val):"";
    }

    public function getActive()
    {
        return $this->active==1? 'ON':'OFF';
    }



    public function mainCategory(){
        return $this->belongsTo(MainCategory::class ,'category_id','id');
    }
}
