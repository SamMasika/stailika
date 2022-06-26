<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table='categories';
    protected $fillable=[
        'name',
        'slug',
        'shop_id',
        'description',
        'status',
        'popular',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id','id');
    }
}
