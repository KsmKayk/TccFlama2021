<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function showNewProduct(Request $request)
    {
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }
    public function addNewProduct(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $path = $request->file('image')->store('products_images', 's3');

            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'image_url' => "https://tccflama2021.s3.us-east-2.amazonaws.com/" . $path,
                'price' => strval($request->price),
                'category_id' => $request->category_id,

            ]);

            return redirect('admin/products');
        }
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
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }
    public function editProduct(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = strval($request->price);
        $product->category_id = $request->category_id;
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
