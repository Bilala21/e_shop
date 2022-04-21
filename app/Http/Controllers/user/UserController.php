<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        if ($newUser->save()) {
            return redirect()->route('user.login');
        } else {
            return redirect()->route('user.login');
        }
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::attempt($creds)) {
            return redirect()->route('user.cart');
        } else {
            return redirect()->route('user.login');
        }
    }
    public function addToCart(Request $request)
    {
      
       
        $product = Product::find(intval($request->item_id));
       
        $id=$request->item_id;
        if (!$product) {
            return response()->json(['mes'=>0]);
        } else {
            $cart = session()->get('cart');
            if (!$cart) {
                $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "path" => $product->path
                    ]
                ];
                session()->put('cart', $cart);
                return response()->json(['mes' => session('cart')]);
            } 
            else {
                //  check if product of this id is exist then increament quantity by 1
                if (isset($cart[$id])) {
                    $cart[$id]['quantity']++;
                    session()->put('cart', $cart);
                    return $cart[$id]['quantity'];
                } else {
                    // if item not exist in cart then add to cart with quantity = 1
                    $cart[$id] = [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "path" => $product->path
                    ];
                    session()->put('cart', $cart);
                }
            }
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
}
