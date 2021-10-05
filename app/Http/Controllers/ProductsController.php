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

    public function removeProduct(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        $product_url = $product->image_url;
        $product_url = explode(".com/", $product_url);
        Storage::disk('s3')->delete($product_url[1]);
        $product->delete();
        return redirect('admin/products');
    }
    public function showEditProduct(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }
    public function editProduct(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = strval($request->price);
        if ($request->hasFile('image')) {
            $product_url = $product->image_url;
            $product_url = explode(".com/", $product_url);
            Storage::disk('s3')->delete($product_url[1]);
            $path = $request->file('image')->store('products_images', 's3');
            $product->image_url = "https://tccflama2021.s3.us-east-2.amazonaws.com/" . $path;
        }
        $product->save();
        return redirect('admin/products');
    }
}
