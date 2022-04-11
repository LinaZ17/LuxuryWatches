@extends('layouts.main')

@section('title', 'basket.place_order')

@section('content')

    <div class="container">
        {{-- для вывода ошибок --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
    </div>

    <div class="container">
    <div class="row d-flex ">

        <div class="col col-lg-12 order">
            <div>
                <h2><b>Confirm order:</b></h2>
                <h4>Total Order Value: <b> $ {{ $order->getFullPrice() }}</b></h4>

                <form  action="{{ route('basketConfirm') }}" method="POST">

                    <p>Enter your name and phone number so that our manager can contact you:</p>

                    <div class="input-group mb-3">

                        <label for="name" class="form-label">Name:
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                        </label>
                    </div>

                    <div class="input-group mb-3">
                        <label for="phone" class="form-label">Phone number:
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-control">
                        </label>
                    </div>


                    <div class="input-group">
                        <input type="submit" class="btn btn-success" value="Confirm order">
                    </div>

                    @csrf
                </form>
            </div>

        </div>

    </div>
</div>
@endsection
