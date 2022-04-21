<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    protected $table='staffs';
    public function store(){
        return $this->belongsTo(Store::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
}
