@extends('include.app')
@section('titleApp', 'Products')
@section('content')
    <!-- Product List Start -->
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-view-top" style="padding: unset;margin-bottom: 15px;background: unset;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="product-short">
                                            <div class="dropdown">
                                                <div class="dropdown-toggle" data-toggle="dropdown">{{ $catess->name }}</div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @foreach($catess->sub_category as $sub)
                                                        <a href="{{ route('product_show.sub_category',$sub->id) }}" class="dropdown-item @if($sub->id == $id) active @endif">{{ $sub->name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($products as $product)
                        <div class="col-md-4">
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
                        @endforeach
                    </div>

                    <!-- Pagination Start -->
                    <div class="col-md-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {!! $products->links() !!}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="{{ $products->previousPageUrl() }}" tabindex="-1">Previous</a>--}}
{{--                                </li>--}}

{{--                                <li class="page-item active"><a class="page-link" href="#">{{ $products->currentPage() }}</a></li>--}}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a>--}}
{{--                                </li>--}}
                            </ul>
                        </nav>
                    </div>
                    <!-- Pagination Start -->
                </div>

                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <br><br>
                    <div class="sidebar-widget category" style="top: unset;">
                        <h2 class="title">Category</h2>
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

                    <div class="sidebar-widget widget-slider" style="top: 25px;background: black;">
                        <div class="sidebar-slider normal-slider">
                            @foreach($fetchers as $fet)
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="#">{{ $fet->name }}</a>
                                </div>
                                <div class="product-image">
                                    <a href="{{ route('product_show.sub_category',$fet->id) }}">
                                        <img src="{{ asset('/storage/product_photo/'.$fet->photo1) }}?{{ rand(1,999999) }}" alt="Product Image">
                                    </a>
                                </div>
                                <div class="product-price">
                                    <h3><span></span>@if($fet->asking) {{ $fet->asking }} @else &nbsp; @endif</h3>
                                    <a class="btn">
                                        <!-- <i class="fa fa-shopping-cart"></i>-->
                                        @if($fet->selling) {{ $fet->selling }} @else &nbsp; @endif
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <!-- Product List End -->


@endsection
