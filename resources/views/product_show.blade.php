@extends('include.app')
@section('titleApp', 'Details')
@section('content')
    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top" style="margin-bottom: 15px;">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="product-slider-single normal-slider" style="border: 1px solid black;">
                                    <img src="{{ asset('/storage/product_photo/'.$id->photo1) }}?{{ rand(1,999999) }}" alt="Product Image">
                                    @if($id->photo2)
                                        <img src="{{ asset('/storage/product_photo/'.$id->photo2) }}?{{ rand(1,999999) }}" alt="Product Image">
                                    @endif
                                    @if($id->photo3)
                                        <img src="{{ asset('/storage/product_photo/'.$id->photo3) }}?{{ rand(1,999999) }}" alt="Product Image">
                                    @endif
                                    <img src="{{ asset('/storage/product_photo/'.$id->photo1) }}?{{ rand(1,999999) }}" alt="Product Image">
                                    @if($id->photo2)
                                        <img src="{{ asset('/storage/product_photo/'.$id->photo2) }}?{{ rand(1,999999) }}" alt="Product Image">
                                    @endif
                                    @if($id->photo3)
                                        <img src="{{ asset('/storage/product_photo/'.$id->photo3) }}?{{ rand(1,999999) }}" alt="Product Image">
                                    @endif
                                </div>
                                <div class="product-slider-single-nav normal-slider">
                                    <div class="slider-nav-img"><img src="{{ asset('/storage/product_photo/'.$id->photo1) }}?{{ rand(1,999999) }}" alt="Product Image"></div>
                                    @if($id->photo2) <div class="slider-nav-img"><img src="{{ asset('/storage/product_photo/'.$id->photo2) }}?{{ rand(1,999999) }}" alt="Product Image"></div>@endif
                                    @if($id->photo3) <div class="slider-nav-img"><img src="{{ asset('/storage/product_photo/'.$id->photo3) }}?{{ rand(1,999999) }}" alt="Product Image"></div>@endif
                                    <div class="slider-nav-img"><img src="{{ asset('/storage/product_photo/'.$id->photo1) }}?{{ rand(1,999999) }}" alt="Product Image"></div>
                                    @if($id->photo2) <div class="slider-nav-img"><img src="{{ asset('/storage/product_photo/'.$id->photo2) }}?{{ rand(1,999999) }}" alt="Product Image"></div>@endif
                                    @if($id->photo3) <div class="slider-nav-img"><img src="{{ asset('/storage/product_photo/'.$id->photo3) }}?{{ rand(1,999999) }}" alt="Product Image"></div>@endif
                                </div>
                            </div>
                            <div class="col-md-7" style="top: -40px;">
                                <div class="product-content">
                                    <div class="title"><h2>{{ $id->name }}({{ $id->code }})</h2></div>
                                    <div class="ratting"></div>
                                    <div class="price">
                                        <h4>Price:</h4>
                                        <p>{{ $id->selling }} <span>{{ $id->asking }}</span></p>
                                    </div>
                                    <div class="quantity">
                                        <h4>Quantity:</h4>
                                        <div class="qty">
                                            @if($id->stock) Available @else Unavailable @endif
                                            <!--<button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>-->
                                        </div>
                                    </div>
                                    <div class="p-size">
                                        <h4>Size:</h4>
                                        <div class="btn-group btn-group-sm" style="font-weight: bold;color: #1000fe;font-size: 18px;">
                                            {{ $id->size }}
                                            <!--<button type="button" class="btn">S</button>
                                            <button type="button" class="btn">M</button>
                                            <button type="button" class="btn">L</button>
                                            <button type="button" class="btn">XL</button>-->
                                        </div>
                                    </div>
                                    <div class="p-color">
                                        <h4>Color:</h4>
                                        <div class="btn-group btn-group-sm" style="font-weight: bold;color: #bb22fa;font-size: 18px;">
                                            {{ $id->color }}
                                            <!--<button type="button" class="btn">White</button>
                                            <button type="button" class="btn">Black</button>
                                            <button type="button" class="btn">Blue</button>-->
                                        </div>
                                    </div>
                                    <!--<div class="action">
                                        <a class="btn" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                        <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#description">Product Description</a>
                                </li>
                            </ul>

                            <div class="tab-content" style="height: 468px;overflow-y: auto;">
                                <div id="description" class="container tab-pane active">
                                    <p>
                                    <pre style="text-align: left; overflow-x: auto; white-space: pre-wrap;white-space: -moz-pre-wrap;white-space: -pre-wrap;white-space: -o-pre-wrap;word-wrap: break-word;">{{ $id->description }}</pre>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget widget-slider" style="background: #1d1d1d">
                        <h2 style="text-align: center;color: darkgreen;">Related Product</h2>
                        <div class="sidebar-slider normal-slider">
                            @foreach($relates as $relate)
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="#">{{ $relate->name }}</a>
                                </div>
                                <div class="product-image">
                                    <a href="{{ route('product_show.details',$relate->id) }}">
                                        <img src="{{ asset('/storage/product_photo/'.$relate->photo1) }}?{{ rand(1,999999) }}" alt="Product Image">
                                    </a>
                                </div>
                                <div class="product-price">
                                    <h3><span></span>@if($relate->asking) {{ $relate->asking }} @else &nbsp; @endif</h3>
                                    <a class="btn">
                                        <!-- <i class="fa fa-shopping-cart"></i>-->
                                        @if($relate->selling) {{ $relate->selling }} @else &nbsp; @endif
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar-widget category" style="background: #1d1d1d">
                        <h2 class="title text-light">Category</h2>
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                @foreach($cates as $cate)
                                    @if($cate->sub_category)
                                    <li class="nav-item">
                                        <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ $cate->name }}<i class="fa fa-plus-square"></i></a>
                                            <div style="border: none; margin: unset;" class="dropdown-menu">
                                            @foreach($cate->sub_category as $sub)
                                                <a href="{{ route('product_show.sub_category',$sub->id) }}" class="dropdown-item">{{ $sub->name }}</a>
                                            @endforeach
                                            </div>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('product_show.category',$cate->id) }}">{{ $cate->name }}</a>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <!-- Product Detail End -->
@endsection
