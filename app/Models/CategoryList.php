<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryList extends Model
{
    use HasFactory;
    protected $table='category_lists';
    protected $fillable=[
        'name',
        'slug',
        'parent_id'
    ];

    public function subcategory(){
        return $this->hasMany(CategoryList::class,'parent_id');
    }

    public function parent(){
        return $this->belongsTo(CategoryList::class,'parent_id');
    }
}
