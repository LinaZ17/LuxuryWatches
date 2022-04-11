<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }
        return view('basket.basket', compact('order'));
    }

    public function basketAdd($product_id)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

// Колонка количество товара count. Добавление товара. В модели ордер дописываем ->withPivot('count')->withTimestamps();
        if ($order->products->contains($product_id)) {
            $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($product_id);
        }

        //надпись о добавлении товара
        $product = Product::find($product_id);
        session()->flash('success', 'Product added: ' . $product->title);

        return redirect()->route('basket');
    }


    public function basketRemove($product_id)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);

        //  Колонка количество товара count. Удаление товара.
        if ($order->products->contains($product_id)) {
            $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($product_id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        //Сообщение о удалении товара из корзины
        $product = Product::find($product_id);
        session()->flash('warning', 'Item removed from cart: ' . $product->title);
        return redirect()->route('basket');

    }

    public function basketOrder()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('indexController');
        }
        $order = Order::find($orderId);

        return view('basket.order', compact('order'));
    }


    public function basketConfirm(Request $request)
    {
        //ВАЛИДАЦИЯ
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('indexController');
        }
        $order = Order::find($orderId);

        $success = $order->saveOrder($request->name, $request->phone);

        //Сообщение о принятии товара на обработку

        if (!isset($success)) {
            session()->flash('success', 'Your order has been processed!');
        }

        return redirect()->route('indexController');
    }

}
