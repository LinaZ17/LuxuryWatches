@extends('auth.layouts.main')

@section('title', 'Заказы')

@section('content')
    <div class="col-md-12">
        <h1>Orders</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    №
                </th>
                <th>
                   Name
                </th>
                <th>
                   Phone
                </th>
                <th>
                    Departure date
                </th>
                <th>
                   Quantum
                </th>
                <th>
                    Actions
                </th>
            </tr>
            @foreach($orders as $order)
                <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
            <td>$ {{ $order->getFullPrice() }}</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-success" type="button">Открыть</a>
                </div>
            </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection

