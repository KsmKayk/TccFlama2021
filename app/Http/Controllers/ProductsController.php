<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $path = $request->file('image')->store('products_images', 's3');

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => "https://tccflama2021.s3.us-east-2.amazonaws.com/" . $path,
            'price' => strval($request->price),

        ]);

        return redirect('admin/products');
    }
}
