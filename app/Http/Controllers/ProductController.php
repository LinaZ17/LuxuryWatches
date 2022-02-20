<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Product;
use http\Env\Request;
use function view;

class ProductController extends Controller
{
    public function show($catalog, $product_id)
    {

        $item= Product::where('id', $product_id)->first();

        return view('products.show', [
            'item' => $item
        ]);
    }

    public function showCatalog($catalog_alias)
    {
        $catalog = Catalog::where('alias', $catalog_alias)->first();

        return view('catalogs.index', [
            'catalog' => $catalog
        ]);
    }



}
