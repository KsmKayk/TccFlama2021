<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_status;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        if(!Auth::check()) {
            return redirect()->route('signin');
        }
        $user_id = Auth::id();
        \Cart::session($user_id);
        $items = \Cart::getContent();
        return view('client.cart', compact('items'));
    }

    public function addProduct(Request $request) {
        if(!Auth::check()) {
            return redirect()->route('signin');
        }

        $id = $request->id;
        $uniq = uniqid();
        $product = Product::find($id);
        $size = $request->size;
        $user_id = Auth::id();
        \Cart::session($user_id);

        \Cart::add(array(
            'id' => $uniq,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                'product_id' => $id,
                'size' => $size,
                'image' => $product->image_url,
            ),
        ));

        return redirect()->route('cart');
    }

    public function removeProduct($id, Request $request) {
        if(!Auth::check()) {
            return redirect()->route('signin');
        }

        $user_id = Auth::id();
        \Cart::session($user_id);
;
        \Cart::remove($id);

        return redirect()->route('cart');
    }
}
