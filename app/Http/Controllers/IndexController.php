<?php

namespace App\Http\Controllers;

use App\Models\Product;

class IndexController
{
public function index()
{
//    проверили есть наши продукты
//    $products = Product::all();
//    foreach ($products as $product){
//      echo'Title: ' . $product->title;
//      echo '</br>';
//        echo'Price: ' . $product->price;
//        echo '</br>';
//    }

    $products = Product::orderBy('created_at')->take(4)->get();

    return view('main.index', [
        'products' => $products
    ]);
}
}
