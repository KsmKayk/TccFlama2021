<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_status;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class PagesController extends Controller
{
    public function home(Request $request)
    {

        $releases = Product::all()->sortByDesc('id')->take(4);
        $products = Product::all();
        return view('client.home', compact('releases', 'products'));
    }

    public function shirts(Request $request)
    {
        $category = Category::where('name', 'CAMISAS')->first();
        $products = Product::where('category_id', $category->id)->get();
        return view('client.shirts', compact('products'));
    }
    public function hoodies(Request $request)
    {
        $category = Category::where('name', 'MOLETONS')->first();
        $products = Product::where('category_id', $category->id)->get();
        return view('client.hoodies', compact('products'));
    }
    public function accessories(Request $request)
    {
        $category = Category::where('name', 'ACESSORIOS')->first();
        $products = Product::where('category_id', $category->id)->get();
        return view('client.accessories', compact('products'));
    }
    public function mugs(Request $request)
    {
        $category = Category::where('name', 'CANECAS')->first();
        $products = Product::where('category_id', $category->id)->get();
        return view('client.mugs', compact('products'));
    }

    public function product($id,Request $request)
    {
        $product = Product::find($id);
        return view('client.product', compact('product'));
    }


    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->search . '%')->get();
        return view('client.search', compact('products'));
    }

}
