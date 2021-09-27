<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }
    public function showEditCategory(Request $request)
    {
        $category = Category::findOrFail($request->id);
        return view('admin.categories.edit', compact('category'));
    }

    public function editCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = strtoupper($request->name);
        $category->save();

        return redirect('admin/categories');
    }

    public function showNewCategory(Request $request)
    {
        return view('admin.categories.add');
    }
    public function addNewCategory(Request $request)
    {
        Category::create([
            'name' => strtoupper($request->name)
        ]);
        return redirect('admin/categories');
    }

    public function delCategory(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->delete();
        return redirect('admin/categories');
    }
}
