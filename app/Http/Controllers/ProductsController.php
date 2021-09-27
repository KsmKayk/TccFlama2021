<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function showNewProduct(Request $request)
    {
        return view('admin.products.add');
    }
    public function addNewProduct(Request $request)
    {
    }
}
