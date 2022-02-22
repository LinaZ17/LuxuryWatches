@extends('layouts.main')

@section('title', 'Luxury Watches')

@section('custom_js')
    <script type="text/javascript">
        $(function () {

            var menu_ul = $('.menu_drop > li > ul'),
                menu_a = $('.menu_drop > li > a');

            menu_ul.hide();

            menu_a.click(function (e) {
                e.preventDefault();
                if (!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true, true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true, true).slideUp('normal');
                }
            });

        });
    </script>
@endsection

@section('content')

    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Single</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <!--start-single-->
    <div class="single contact">
        <div class="container">
            <div class="single-main">
                <div class="col-md-9 single-main-left">
                    <div class="sngl-top">
                        <div class="col-md-5 single-top-left">
                            <div class="flexslider">
                                {{-- для появления картинок--}}
                                @php
                                    $image = '';
                                    if (count($item->images) > 0){
                                         $image = $item->images[0]['img'];
                                    }else{
                                        $image = 'no_image.png';
                                   }
                                @endphp

                                <ul class="slides">
                                    @if($image == 'no_image.png')

                                    @else
                                        @foreach($item->images as $img)
                                            @if($loop->first)
                                                <li data-thumb="/assets/images/{{$img['img']}}">
                                                    <div class="thumb-image"><img src="/assets/images/{{$img['img']}}"
                                                                                  data-imagezoom="true"
                                                                                  class="img-responsive"
                                                                                  alt="{{ $item->title }}"/></div>
                                                </li>
                                            @else
                                                <li data-thumb="/assets/images/{{$img['img']}}">
                                                    <div class="thumb-image"><img src="/assets/images/{{$img['img']}}"
                                                                                  data-imagezoom="true"
                                                                                  class="img-responsive"
                                                                                  alt="{{ $item->title }}"/></div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <!-- FlexSlider -->
                            <script src="/assets/js/imagezoom.js"></script>
                            <script defer src="/assets/js/jquery.flexslider.js"></script>
                            <link rel="stylesheet" href="/assets/css/flexslider.css" type="text/css" media="screen"/>

                            <script>
                                // Can also be used with $(document).ready()
                                $(window).load(function () {
                                    $('.flexslider').flexslider({
                                        animation: "slide",
                                        controlNav: "thumbnails"
                                    });
                                });
                            </script>
                        </div>
                        <div class="col-md-7 single-top-right">
                            <div class="single-para simpleCart_shelfItem">
                                <h2>{{ $item->title }}</h2>
                                <div class="star-on">
                                    <ul class="star-footer">
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                    </ul>
                                    <div class="review">
                                        <a href="#"> 1 customer review </a>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <h5 class="item_price">$ {{ $item->price }}</h5>
                                <p>{{ $item->description }}</p>

                                <ul class="tag-men">
                                    <!-- In Stock -->
                                    <li class="in_stock_container">
                                        <div class="availability">Availability:</div>
                                        {{--  если товар имеется в наличии--}}
                                        @if($item->in_stock)
                                            <span style="color: #44a038">In Stock</span>
                                        @else
                                            {{-- если товара нет в наличии--}}
                                            <span style="color: #bd4147">Not available</span>
                                        @endif
                                    </li>

                                    {{--  выводит надпись из Каталога женской либо мужской модели часов--}}
                                    <li>
                                        <a href="{{route('showCatalog', ['catalog', $item->id])}}">{{ $item->catalog->title }}</a>
                                    </li>


                                </ul>
                                <form action="{{ route('basketAdd', $item) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="add-cart item_add btn btn-dark">ADD TO CART</button>
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="tabs">
                        <ul class="menu_drop">
                            <li class="item1"><a href="#"><img src="images/arrow.png" alt="">Description</a>
                                <ul>
                                    <li class="subitem1"><a href="#">{{$item->description}}</a></li>

                                </ul>
                            </li>
                            <li class="item2"><a href="#"><img src="images/arrow.png" alt="">Additional information</a>
                                <ul>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                            vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                            facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                                            praesent luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                            putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                            quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur
                                            parum clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                            <li class="item3"><a href="#"><img src="images/arrow.png" alt="">Reviews (10)</a>
                                <ul>
                                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                            elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                                            aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                            tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                            consequat.</a></li>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                            vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                            facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                                            praesent luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                            putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                            quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur
                                            parum clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                            <li class="item4"><a href="#"><img src="images/arrow.png" alt="">Helpful Links</a>
                                <ul>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                            vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                            facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                                            praesent luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                            putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                            quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur
                                            parum clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                            <li class="item5"><a href="#"><img src="images/arrow.png" alt="">Make A Gift</a>
                                <ul>
                                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                            elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                                            aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                            tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                            consequat.</a></li>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                            vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                            facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                                            praesent luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                            putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                            quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur
                                            parum clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="latestproducts">
                        <div class="product-one">

                            @foreach($products as $product)
                                @include('layouts.cart')
                            @endforeach

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 single-right">
                    <div class="w_sidebar">
                        <section class="sky-form">
                            <h4>Catogories</h4>
                            <div class="row1 scroll-pane">
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All
                                        Accessories</label>
                                </div>
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women Watches</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids
                                        Watches</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men
                                        Watches</label>
                                </div>
                            </div>
                        </section>
                        <section class="sky-form">
                            <h4>Brand</h4>
                            <div class="row1 row2 scroll-pane">
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
                                </div>
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sonata</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Titan</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casio</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Omax</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>shree</label>
                                    <label class="checkbox"><input type="checkbox"
                                                                   name="checkbox"><i></i>Fastrack</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sports</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fossil</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Maxima</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yepme</label>
                                    <label class="checkbox"><input type="checkbox"
                                                                   name="checkbox"><i></i>Citizen</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diesel</label>
                                </div>
                            </div>
                        </section>
                        <section class="sky-form">
                            <h4>Colour</h4>
                            <ul class="w_nav2">
                                <li><a class="color1" href="#"></a></li>
                                <li><a class="color2" href="#"></a></li>
                                <li><a class="color3" href="#"></a></li>
                                <li><a class="color4" href="#"></a></li>
                                <li><a class="color5" href="#"></a></li>
                                <li><a class="color6" href="#"></a></li>
                                <li><a class="color7" href="#"></a></li>
                                <li><a class="color8" href="#"></a></li>
                                <li><a class="color9" href="#"></a></li>
                                <li><a class="color10" href="#"></a></li>
                                <li><a class="color12" href="#"></a></li>
                                <li><a class="color13" href="#"></a></li>
                                <li><a class="color14" href="#"></a></li>
                                <li><a class="color15" href="#"></a></li>
                                <li><a class="color5" href="#"></a></li>
                                <li><a class="color6" href="#"></a></li>
                                <li><a class="color7" href="#"></a></li>
                                <li><a class="color8" href="#"></a></li>
                                <li><a class="color9" href="#"></a></li>
                                <li><a class="color10" href="#"></a></li>
                            </ul>
                        </section>
                        <section class="sky-form">
                            <h4>discount</h4>
                            <div class="row1 row2 scroll-pane">
                                <div class="col col-4">
                                    <label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and
                                        above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
                                </div>
                                <div class="col col-4">
                                    <label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--end-single-->
@endsection
