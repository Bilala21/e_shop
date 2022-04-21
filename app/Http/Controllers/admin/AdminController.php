<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryList;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function check(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Required',
            'password.required' => 'Email Required',
        ]);
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function logout()
    {
        if (Auth::guard('admin')) {
            Auth::logout();
            return redirect()->route('admin.login');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    public function parentCategory(Request $request){
        $parentcategory = Category::all();
        if ($parentcategory) {
            return response()->json(['code' => 200, "parentcategory" => $parentcategory]);
        }
    }
    public function addCategory(Request $request){
        $validation = Validator::make($request->all(), [
            'cname' => ['required', 'string'],
            'pname' => ['required', 'string']
        ]);
        if ($validation->fails()) {
            return response()->json(['code' => 400, 'message' => $validation->errors()->first()]);
        } else {
            $arrResponse = [];
            try {
                $category = new Category();
                $category->name = $request->cname;
                $category->slug = $request->sname;
                $category->parent_id = $request->pname;
                if ($category->save()) {
                    return response()->json(['code' => 200]);
                }
            } catch (\Exception $ex) {
                $arrResponse = [
                    'result' => 0,
                    'reason' => $ex->getMessage(),
                    'data' => array(),
                    'code' => 404
                ];
            } finally {

                return response()->json($arrResponse);
            }
        }
    }
    public function addBrand(Request $request){
        $validation = Validator::make($request->all(), [
            'bname' => ['required', 'string']
        ]);
        if ($validation->fails()) {
            return response()->json(['code' => 400, 'mes' => $validation->errors()->first()]);
        } else {
            $arrResponse = [];
            try {

                $brand = new Brand();
                $brand->name = $request->bname;
                $brand->slug = $request->bname;
                $brand->save();
                return response()->json(['code' => 200]);
            } catch (\Exception $ex) {
                $arrResponse = [
                    'result' => 0,
                    'reason' => $ex->getMessage(),
                    'data' => array(),
                    'code' => 404
                ];
            } finally {

                return response()->json($arrResponse);
            }
        }
    }
    public function addProduct(Request $request){
        
        $validation = Validator::make($request->all(), [
            'pname' => 'required',
            'price' => 'required|numeric',
            'brand_id' => 'required',
            'category_id' => 'required',
        ], [
            'name.required' => 'Please Enter Name',
            'price.required' => 'Please Enter Price',
            'category_id.required' => 'Please Select Category',
            'brand_id.required' => 'Please Select Category',
        ]);
        if ($validation->fails()) {
            return response()->json(['code' => 400, 'mes' => $validation->errors()->getMessages()]);
        }

        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
        } else {
            return response()->json(["mes"=>$request->file('file')]);
            return response()->json(['mes' => "Something wrong"]);
        }
        $product = new Product();
        $product->name = $request->pname;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->path = '/storage/' . $path;

        if ($product->save()) {
            return response()->json(['code' => 200, 'mes' => $request->pname]);
        } else {
            return response()->json(['code' => 400, 'mes' => "Something Wrong Product is not added"]);
        }
    }

    public function selectCategory(){
        $category = CategoryList::all();
        $brand = Brand::all();
        return response()->json(["category" => $category, "brands" => $brand]);
    }

    public function brand_id(){
        $brand_id = Brand::all();
        return response()->json(["code"=>1,"brand_id" => $brand_id]);
    }
    public function edit(Request $request){
        $product = Product::find($request->id);
        if ($product) {
            return response()->json(['code' => 200, 'price' => $product->price, "id" => $product->id]);
        }
    }

    public function update(Request $request){

        $product = Product::find($request->id);
        $product->price = $request->price;
        $product->update();
        return response()->json(['code' => 200, 'res' => 'Product price is successfylly updated']);
    }

    public function destory(Request $request){
        // return response()->json($request->id);
        $product = Product::find($request->id)->delete();
        return response()->json(['code' => 200, 'data' => $product]);
    }

    public function showProd(){
        $products = Product::all();
        if ($products) {
            return response()->json(["code" => 200, "products" => $products]);
        } else {
            return response()->json(["code" => 200, "products" => "Error"]);
        }
    }
    public function singlePost(){
        $userData = User::all();
        return response()->json(['data' => $userData]);
    }

    public function getAllUser(){
        $users = User::all();
        return response()->json(['message' => $users]);
    }
}
