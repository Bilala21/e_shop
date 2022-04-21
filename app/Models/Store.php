<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Store extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
    ];

    public function staff(){
        return $this->hasMany(Staff::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
    public function stock(){
        return $this->hasMany(Stock::class);
    }
}
