<?php

namespace App\Models;

use App\Models\Category as ModelsCategory;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'name',
        'slug',
        'parent_id'
    ];

    public function subcategory(){
        return $this->hasMany(Category::class,'parent_id');
    }
    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
