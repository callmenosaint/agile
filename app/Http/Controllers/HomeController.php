<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', true)->take(3)->get();
        $featuredProducts = Product::where('status', true)
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        return view('home', compact('categories', 'featuredProducts'));
    }
}