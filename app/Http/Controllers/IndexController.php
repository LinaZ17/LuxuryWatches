<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;

class IndexController
{
public function index()
{
    $products = Product::orderBy('created_at')->take(4)->get();

    return view('main.index', [
        'products' => $products,

    ]);
}
}
