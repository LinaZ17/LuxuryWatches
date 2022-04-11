@extends('layouts.main')

@section('title', 'basket')

@section('content')

<div class="container">
    <h2 class="basket_text">Basket</h2>
    <p class="basket_text">Checkout</p>
    <div class="panel">
        <table class="table table-striped">
            <thead>
            <tr scope="row">
{{--                <th>№</th>--}}
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total amount</th>
            </tr>
            </thead>
            <tbody>

            @foreach($order->products as $product)
                <tr>
{{--                    <td> {{ $product->id }}</td>--}}
                    <td >
                        {{--вставляем ммылку на товар по которой мы можем просмотреть товар--}}
                        <a href="{{ route('showProduct', ['catalog', $product->id]) }}">
                            <img height="56px" src="">
                            {{ $product->title }}
                        </a>
                    </td>

                    <td><span class="badge"> {{ $product->pivot->count }} </span>
                        <div class="btn-group form-inline">
                            {{--  добавление в корзину--}}
                            <form action="{{ route('basketRemove', $product) }}" method="POST">
                                <button type="submit" class="btn btn-danger"><span
                                        class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                                                    @csrf
                                                                </form>
                            {{--  удаление из корзины--}}
                            <form action="{{ route('basketAdd', $product) }}" method="POST">
                                <button type="submit" class="btn btn-dark"><span
                                                class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                                    @csrf
                                                </form>
                                            </div>
                                        </td>
                                        <td class="col-lg-2">$ {{ $product->price }}</td>
                                        <td>$ {{ $product->getPrice() }}</td>
                                        {{--  считает сумму одного продукта  --}}
                </tr>
            @endforeach
            <tr>
                <td colspan="3">Total cost: </td>
                {{--  считает общую сумму всей корзины  --}}
                <td>$ {{ $order->getFullPrice() }} </td>
            </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="form-inline pull-right">
                <form method="POST" action="">
                    <a href="{{ route('basketOrder') }}" type="submit" class="btn btn-success">Checkout</a>
                </form>
            </div>
        </div>
    </div>



@endsection
