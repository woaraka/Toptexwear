@extends('include.app')
@section('titleApp', 'Toptexwear')
@section('content')
    <br>
<!-- Bottom Bar Start -->
<!--
<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="index.html">
                        <img src="img/logo.png" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="user">
                    <a href="wishlist.html" class="btn wishlist">
                        <i class="fa fa-heart"></i>
                        <span>(0)</span>
                    </a>
                    <a href="cart.html" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span>(0)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- Bottom Bar End -->

<!-- Main Slider Start -->
<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="header-slider normal-slider">
                    @foreach($sliders as $slider)
                    <div class="header-slider-item">
                        <img class="img_custom" src="{{ asset('/storage/slider_photo/'.$slider->photo) }}?{{ rand(1,999999) }}" alt="Slider Image" />
                        <!--<div class="header-slider-caption">
                            <p>Some text goes here that describes the image</p>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                        </div>-->
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6" id="popup">
                <div class="header-img">
                    <div class="img-item">
                        <img src="{{ asset('frontend/image/category-1.jpg') }}" />
                            <a style="background: unset;" class="img-text" href="{{ route('product_show.category',1) }}"></a>
                    </div>
{{--                    <div class="img-item">--}}
{{--                        <img src="{{ asset('frontend/image/category-2.jpg') }}" />--}}
{{--                        <!--                                <a class="img-text" href="">-->--}}
{{--                        <!--                                    <p>Some text goes here that describes the image</p>-->--}}
{{--                        <!--                                </a>-->--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Slider End -->

<!-- Category alter Start -->
<div class="brand category" style="background: #151414;bottom: 15px;">
    <div class="container-fluid">
        <div class="brand-slider">
            @foreach($cates as $cate)
                @if($cate->id != 1)
                    <div class="brand-item category-item ch-150" style="border: 2px solid #212120">
                        <img src="{{ asset('/storage/category_photo/'.$cate->photo) }}?{{ rand(1,999999) }}" />
                        <a class="category-name" style="opacity: unset;background: none;" href="{{ route('product_show.category',$cate->id) }}">
                            <p style="margin: 0 0 -123px 0;color: #212120;font-weight: bold;background: white;padding: 0px">{{ $cate->name }}</p>
                        </a>
                    </div>
                @endif
            @endforeach
                @foreach($cates as $cate)
                    @if($cate->id != 1)
                        <div class="brand-item category-item ch-150" style="border: 2px solid #212120">
                            <img src="{{ asset('/storage/category_photo/'.$cate->photo) }}?{{ rand(1,999999) }}" />
                            <a class="category-name" style="opacity: unset;background: none;" href="{{ route('product_show.category',$cate->id) }}">
                                <p style="margin: 0 0 -123px 0;color: #212120;font-weight: bold;background: white;padding: 0px">{{ $cate->name }}</p>
                            </a>
                        </div>
                    @endif
                @endforeach
        </div>
    </div>
</div>
<!-- Category alter End -->


<!-- Call to Action Start -->
<!--
<div class="call-to-action">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>call us for any queries</h1>
            </div>
            <div class="col-md-6">
                <a href="tel:0123456789">+012-345-6789</a>
            </div>
        </div>
    </div>
</div>-->
<!-- Call to Action End -->
    <!-- Recent Product Start -->
    <div class="recent-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Recent Product</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                @foreach($products as $product)
                @if($product->latest)
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="#">{{ $product->name }}</a>
                        </div>
                        <div class="product-image">
                            <a href="{{ route('product_show.details',$product->id) }}">
                                <img src="{{ asset('/storage/product_photo/'.$product->photo1) }}?{{ rand(1,999999) }}" alt="Product Image">
                            </a>
                        </div>
                        <div class="product-price">
                            <h3><span></span>@if($product->asking) {{ $product->asking }} @else &nbsp; @endif</h3>
                            <a class="btn">
                                <!-- <i class="fa fa-shopping-cart"></i>-->
                                @if($product->selling) {{ $product->selling }} @else &nbsp; @endif
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @foreach($products as $product)
                @if($product->latest)
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="#">{{ $product->name }}</a>
                        </div>
                        <div class="product-image">
                            <a href="{{ route('product_show.details',$product->id) }}">
                                <img src="{{ asset('/storage/product_photo/'.$product->photo1) }}?{{ rand(1,999999) }}" alt="Product Image">
                            </a>
                        </div>
                        <div class="product-price">
                            <h3><span></span>@if($product->asking) {{ $product->asking }} @else &nbsp; @endif</h3>
                            <a class="btn">
                                <!-- <i class="fa fa-shopping-cart"></i>-->
                                @if($product->selling) {{ $product->selling }} @else &nbsp; @endif
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Recent Product End -->

<!-- Brand Start -->
<div class="brand">
    <div class="container-fluid">
        <div class="brand-slider">
            @foreach($clients as $client)
                <div class="brand-item"><img src="{{ asset('/storage/client_photo/'.$client->photo) }}" alt=""></div>
            @endforeach
        </div>
    </div>
</div>
<!-- Brand End -->
    <!-- Featured Product Start -->
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Featured Product</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                @foreach($products as $product)
                    @if($product->fetcher)
                        <div class="col-lg-3">
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="#">{{ $product->name }}</a>
                                </div>
                                <div class="product-image">
                                    <a href="{{ route('product_show.details',$product->id) }}">
                                        <img src="{{ asset('/storage/product_photo/'.$product->photo1) }}?{{ rand(1,999999) }}" alt="Product Image">
                                    </a>
                                </div>
                                <div class="product-price">
                                    <h3><span></span>@if($product->asking) {{ $product->asking }} @else &nbsp; @endif</h3>
                                    <a class="btn">
                                        <!-- <i class="fa fa-shopping-cart"></i>-->
                                        @if($product->selling) {{ $product->selling }} @else &nbsp; @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach($products as $product)
                    @if($product->fetcher)
                        <div class="col-lg-3">
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="#">{{ $product->name }}</a>
                                </div>
                                <div class="product-image">
                                    <a href="{{ route('product_show.details',$product->id) }}">
                                        <img src="{{ asset('/storage/product_photo/'.$product->photo1) }}?{{ rand(1,999999) }}" alt="Product Image">
                                    </a>
                                </div>
                                <div class="product-price">
                                    <h3><span></span>@if($product->asking) {{ $product->asking }} @else &nbsp; @endif</h3>
                                    <a class="btn">
                                        <!-- <i class="fa fa-shopping-cart"></i>-->
                                        @if($product->selling) {{ $product->selling }} @else &nbsp; @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Featured Product End -->
<!-- Newsletter Start -->
<!--
<div class="newsletter">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>Subscribe Our Newsletter</h1>
            </div>
            <div class="col-md-6">
                <div class="form">
                    <input type="email" value="Your email here">
                    <button>Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- Newsletter End -->

    <!-- Feature Start-->
    <div class="feature">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fab fas fa-money-bill-alt"></i>
                        <h2>Secure Payment</h2>
{{--                        <p>--}}
{{--                            Lorem ipsum dolor sit amet consectetur elit--}}
{{--                        </p>--}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-truck"></i>
                        <h2>Worldwide Delivery</h2>
{{--                        <p>--}}
{{--                            Lorem ipsum dolor sit amet consectetur elit--}}
{{--                        </p>--}}
                    </div>
                </div>
                {{--            <div class="col-lg-3 col-md-6 feature-col">--}}
                {{--                <div class="feature-content">--}}
                {{--                    <i class="fa fa-sync-alt"></i>--}}
                {{--                    <h2>90 Days Return</h2>--}}
                {{--                    <p>--}}
                {{--                        Lorem ipsum dolor sit amet consectetur elit--}}
                {{--                    </p>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                <div class="col-lg-4 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-comments"></i>
                        <h2>24/7 Support</h2>
{{--                        <p>--}}
{{--                            Lorem ipsum dolor sit amet consectetur elit--}}
{{--                        </p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End-->
@endsection
