<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Basket;
use http\Env\Request;

class BasketController
{
    public function basket()
    {

        return view('basket.basket');
    }

    public function basketOrder(Request $request )
    {

    }

    public function basketAdd( )
    {

    }

    public function basketRemove()
    {

    }

}
