<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=['name','category_id','description','price','path','brand_id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    // public function stock(){
    //     return $this->hasOne(Stock::class);
    // }
    // public function order_detail(){
    //     return $this->hasMany(OrderDetail::class);
    // }
}
