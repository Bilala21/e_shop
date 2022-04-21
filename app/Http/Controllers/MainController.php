<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryList;
use App\Models\Product;
use App\Models\Whishlist;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index($id=null){
        dd("dsfsddsf");

        // $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $categories = Category::where('parent_id',"null")->get();
        $brands =Brand::all();
        $products =Product::all();
        $getProductById=Category::find($id);
        if($getProductById){
            $cate_id=$getProductById->parent_id;
            $productById=Product::where('category_id',$cate_id)->get();
            return view('index',['parentCategories' => $categories,'brands'=>$brands,'products' =>$products,"productById"=>$productById]); 
        }
        
        return view('index',['parentCategories' => $categories,'brands'=>$brands,'products' =>$products]);       
    }
    public function prodyctById($id){
        $getProductById=Category::find($id);
        $cate_id=$getProductById->parent_id;
        $productById=Product::find($cate_id);
        return view('index',['productById' => $productById]);    
        // dd($productById->name);
    }
    public function login(){
        return view('auth.login');
    }
    // blog page
    public function blog(){
        return view('post.post');
    }
    public function singleBlog(){
        return view('post.single-post');
    }
    // product detail
    public function productDetail(){
        return view('pages.product-details');
    }
    public function shop(){
        return view('pages.shop');
    }
    // contact us page
    public function contactus(){
        return view('pages.contact-us');
    }
    public function cart(){
        return view('cart.cart');
    }
    public function checkout(){
        return view('cart.checkout');
    }
    // not found message
    public function not_found(){
        return view('ermessage');
    }

    public function whishlist($id){
        $product=Product::find($id);
        $whishlist = new Whishlist();
        $whishlist->name=$product->name;
        $whishlist->price=$product->price;
        $whishlist->description=$product->description;
        if($whishlist->save()){
            return redirect()->route('index');
        }
        else{
            return redirect()->route('index');
        }

    }
}
