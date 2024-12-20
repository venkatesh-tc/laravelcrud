<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import the Product model

class HomeController extends Controller
{
    /**
     * Show the application dashboard with products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Pass the products to the view 'product.index'
        return view('product.index', compact('products'));
    }
}
