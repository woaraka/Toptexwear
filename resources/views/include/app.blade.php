<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('titleApp')</title>
    <link rel="shortcut icon" href="{{ asset('frontend/image/logo3.png') }}" type="image/x-icon" >
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="A fashion product's website" name="keywords">
    <meta content="A fashion product's website" name="description">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/lib/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/slick/slick-theme.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}?key=<?php echo time(); ?>" rel="stylesheet">
</head>

<body>
<!-- Top bar Start -->
<div class="top-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <i class="fa fa-envelope"></i>
                toptexwear@gmail.com
            </div>
            <div class="col-sm-6">
                <i class="fa fa-phone-alt"></i>
                +880 1979 788790-2
            </div>
        </div>
    </div>
</div>
<!-- Top bar End -->

<!-- Nav Bar Start -->
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="{{ URL::to('/') }}">
                <img src="{{ asset('frontend/image/logo2.png') }}?101" width="230px" height="37px" alt="Logo">
            </a>&nbsp;&nbsp;&nbsp;&nbsp;
            <!--<a href="#" class="navbar-brand">MENU</a>-->
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <br>
                    <a href="{{ URL('/') }}" class="nav-item nav-link">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Products</a>
                        <div class="dropdown-menu">
                            @foreach($cates as $cate)
                                @if($cate->id != 1)
                                    <a href="{{ route('product_show.category',$cate->id) }}" style="background: black" class="dropdown-item text-light">{{ $cate->name }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="{{ route('product_show.category',1) }}" class="nav-link dropdown-toggle" data-toggle="dropdown">Top-Level</a>
                        <div class="dropdown-menu">
                            @foreach($tops as $top)
                                <a href="{{ route('product_show.sub_category',$top->id) }}" style="background: black" class="dropdown-item text-light">{{ $top->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ URL('/contact-us') }}" class="nav-item nav-link">Contact Us</a>
                    <!--<a href="cart.html" class="nav-item nav-link">Cart</a>
                    <a href="checkout.html" class="nav-item nav-link">Checkout</a>
                    <a href="my-account.html" class="nav-item nav-link">My Account</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                        <div class="dropdown-menu">
                            <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                            <a href="login.html" class="dropdown-item">Login & Register</a>
                            <a href="contact.html" class="dropdown-item">Contact Us</a>
                        </div>
                    </div>-->
                </div>
                <!--
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <i class="fa fa-envelope"></i>
                        support@toptexwear.com
                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-phone-alt"></i>
                        +88-01923-456789
                    </div>
                </div>-->
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->
@yield('content')

<!-- Footer Start -->
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget">
                    <h2>Get in Touch</h2>
                    <div class="contact-info">
                        <p><i class="fa fa-map-marker"></i>&nbsp;Dhaka-Chittagong Highway 5/5<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rayerbag, Dhaka-1362</p>
                        <p><i class="fa fa-envelope"></i>toptexwear@gmail.com</p>
                        <p><i class="fa fa-phone"></i>+880 1979 788790-2</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="footer-widget">
                    <h2>Follow Us</h2>
                    <div class="contact-info">
                        <div class="social">
{{--                            <a href=""><i class="fab fa-twitter"></i></a>--}}
                            <a href=""><i class="fab fa-facebook-f"></i></a>
{{--                            <a href=""><i class="fab fa-linkedin-in"></i></a>--}}
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="footer-widget">
                    <h2>Company Info</h2>
                    <ul>
                        <li><a href="{{ URL('/about-us') }}">About Us</a></li>
                        <li><a href="{{ URL('/about-us') }}">Privacy Policy</a></li>
                        <li><a href="{{ URL('/about-us') }}">Terms & Condition</a></li>
                    </ul>
                </div>
            </div>
            <!--
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h2>Purchase Info</h2>
                    <ul>
                        <li><a href="#">Pyament Policy</a></li>
                        <li><a href="#">Shipping Policy</a></li>
                        <li><a href="#">Return Policy</a></li>
                    </ul>
                </div>
            </div>-->
        </div>
        <!--
        <div class="row payment align-items-center">
            <div class="col-md-6">
                <div class="payment-method">
                    <h2>We Accept:</h2>
                    <img src="img/payment-method.png" alt="Payment Method" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="payment-security">
                    <h2>Secured By:</h2>
                    <img src="img/godaddy.svg" alt="Payment Security" />
                    <img src="img/norton.svg" alt="Payment Security" />
                    <img src="img/ssl.svg" alt="Payment Security" />
                </div>
            </div>
        </div>-->
    </div>
</div>
<!-- Footer End -->

<!-- Footer Bottom Start -->
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 copyright">
                <p>Copyright &copy; <a href="https://toptexwear.com">Toptexwear</a>. All Rights Reserved</p>
            </div>

            <div class="col-md-6 template-by">
                <p>Developed By <a href="https://www.facebook.com/Woaraka">Woaraka</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom End -->

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('frontend/lib/slick/slick.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('frontend/js/main.js') }}?key=<?php echo time(); ?>"></script>
</body>
</html>
