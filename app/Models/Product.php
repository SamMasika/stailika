<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        'cate_id',
        'shop_id',
        'name',
        'slug',
        'small_desc',
        'description',
        'origin_price',
        'selling_price',
        'image',
        'user_id',
        'quantity',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_desc',
        'meta_key'
    ]; 

    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id','id');
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id','id');
    }
}
