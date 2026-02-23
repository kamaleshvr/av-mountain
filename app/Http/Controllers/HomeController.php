<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;

class HomeController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::where('status', true)->get();
        return view('home', compact('categories'));
    }
}
