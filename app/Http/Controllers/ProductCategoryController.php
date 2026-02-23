<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::where('status', true)->get();
        return view('products', compact('categories'));
    }

    public function show($slug)
    {
        $category = ProductCategory::where('slug', $slug)->where('status', true)->firstOrFail();

        return view('products.show', compact('category'));
    }
}
