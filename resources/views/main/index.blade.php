@extends('layouts.main')

@section('title', 'Luxury Watches')


@section('content')
    <!--banner-starts-->
    <div class="bnr" id="home">
        <div id="top" class="callbacks_container">
            <ul class="rslides" id="slider4">
                <li>
                    <img src="assets/images/bnr-1.jpg" alt=""/>
                </li>
                <li>
                    <img src="assets/images/bnr-2.jpg" alt=""/>
                </li>
                <li>
                    <img src="assets/images/bnr-3.jpg" alt=""/>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <!--banner-ends-->
    <!--Slider-Starts-Here-->
    <script src="assets/js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!--End-slider-script-->
    <!--about-starts-->
    <div class="about">
        <div class="container">
            <div class="about-top grid-1">
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                        <img class="img-responsive" src="assets/images/abt-1.jpg" alt=""/>
                        <figcaption>
                            <h2>Nulla maximus nunc</h2>
                            <p>In sit amet sapien eros Integer dolore magna aliqua</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                        <img class="img-responsive" src="assets/images/abt-2.jpg" alt=""/>
                        <figcaption>
                            <h4>Mauris erat augue</h4>
                            <p>In sit amet sapien eros Integer dolore magna aliqua</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                        <img class="img-responsive" src="assets/images/abt-3.jpg" alt=""/>
                        <figcaption>
                            <h4>Cras elit mauris</h4>
                            <p>In sit amet sapien eros Integer dolore magna aliqua</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--about-end-->
    <!--product-starts-->
    <div class="product">
        <div class="container">
            <div class="row product-top">
                <div class=" product-one">

                    @foreach($products as $product)
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
                                    <form action="" method="POST">
                                    <h4>
                                        <a class="item_add" href=""><i></i></a>
                                        <span class=" item_price">$ {{ $product->price }}</span>
                                    </h4>

                                    </form>
                                </div>
                                <div class="srch">
                                    <span>-50%</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>
    <!--product-end-->


@endsection

