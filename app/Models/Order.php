<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['status'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order_detail(){
        return $this->hasOne(OrderDetail::class);
    }
    
    public function store(){
        return $this->belongsTo(Store::class);
    }
    public function staff(){
        return $this->belongsTo(Staff::class);
    }
}
