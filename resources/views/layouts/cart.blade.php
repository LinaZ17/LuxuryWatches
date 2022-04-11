
    {{-- для появления картинок--}}
    @php
        //dd($product->images); //images() метод из Модели
      $image = '';
      if (count($product->images) > 0){
           $image = $product->images[0]['img'];
      }else{
          $image = 'no_image.png';
     }
    @endphp

    <div class="col-md-3 product-left">
        <div class="product-main simpleCart_shelfItem">
            <a href="{{ route('showProduct', ['catalog', $product->id]) }}" class="mask"><img class="img-responsive zoom-img" src="assets/images/{{ $image }}"
                                                                                              alt="{{ $product->title }}"/></a>
            <div class="product-bottom">
                <h3><a href="{{ route('showProduct', ['catalog', $product->id]) }}">{{ $product->title }}</a></h3>
                <p><a href="{{ route('showCatalog', $product->catalog['alias']) }}">{{ $product->catalog->title }}</a></p>

                {{--корзина--}}
                <form action="{{ route('basketAdd', $product) }}" method="POST">
                    <h4>
                        <button type="submit" class="item_add"><i></i></button>
                        <span class=" item_price">$ {{ $product->price }}</span>
                    </h4>
                    @csrf
                </form>
            </div>
            <div class="srch">
                <span>-50%</span>
            </div>
        </div>
    </div>


