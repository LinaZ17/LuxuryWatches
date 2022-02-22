@extends('layouts.main')

@section('title', 'basket.place_order')

@section('content')

    <div class="container">
        {{-- вывод ошибок --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif
    </div>

    <div class="container">
        <div class="row d-flex ">

            <div class="col col-lg-12 order">
                <div>
                    <h2><b>Подтвердите заказ:</b></h2>
                    <h4>Общая стоимость заказа: <b> $ {{ $order->getFullPrice() }}</b></h4>

                    <form action="{{ route('basketConfirm') }}" method="POST">

                        <p>Укажите свое имя и номер телефона, чтобы наш менеджер мог с Вами связаться:</p>

                        <div class="input-group mb-3">

                            <label for="name" class="form-label">Имя:
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                            </label>
                        </div>

                        <div class="input-group mb-3">
                            <label for="phone" class="form-label">Номер телефона:
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                       class="form-control">
                            </label>
                        </div>


                        <div class="input-group">
                            <input type="submit" class="btn btn-success" value="Подтвердите заказ">
                        </div>

                        @csrf
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
