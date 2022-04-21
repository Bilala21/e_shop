<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Category,Product};
class ProductController extends Controller
{
    public function getCategory(){
        $category = Product::all();
        dd($category->categories());
    }
}
