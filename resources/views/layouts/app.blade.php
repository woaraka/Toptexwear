<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('titleApp')</title>
    <link rel="shortcut icon" href="{{ asset('frontend/image/logo3.png') }}" type="image/x-icon" >
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="A fashion product's website" name="keywords">
    <meta content="A fashion product's website" name="description">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

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

@yield('modal')

<!-- Nav Bar Start -->
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="{{ URL::to('/') }}">
                <img src="{{ asset('frontend/image/logo2.png') }}" width="230px" height="37px" alt="Logo">
            </a>&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <!--<a href="#" class="navbar-brand">MENU</a>-->
                    <a href="{{ route('home') }}" class="nav-item nav-link @if(URL::current() == route('home')) active @endif">Dashboard</a>
                    <a href="{{ route('category') }}" class="nav-item nav-link @if(URL::current() == route('category')) active @endif">Category</a>
                    <a href="{{ route('sub_category') }}" class="nav-item nav-link @if(URL::current() == route('sub_category')) active @endif">Sub-category</a>
                    <a href="{{ route('product') }}" class="nav-item nav-link @if(URL::current() == route('product')) active @endif">Product</a>
                    <a href="{{ route('client') }}" class="nav-item nav-link @if(URL::current() == route('client')) active @endif">Client</a>
                    <a href="{{ route('slider') }}" class="nav-item nav-link @if(URL::current() == route('slider')) active @endif">Slider</a>
                    <a href="{{ URL('/') }}" target="_blank" class="nav-item nav-link">Main Page</a>
                </div>
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->

<!-- My Account Start -->
<div class="my-account">
    <div class="container-fluid">
        <div class="row">
            <!--
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link @if(URL::current() == route('home')) active @endif" href="{{ route('home') }}"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
                    <a class="nav-link @if(URL::current() == route('category')) active @endif" href="{{ route('category') }}"><i class="fas fa-clipboard-list"></i> Category</a>
                    <a class="nav-link @if(URL::current() == route('sub_category')) active @endif" href="{{ route('sub_category') }}"><i class="fas fa-stream"></i> Sub-category</a>
                    <a class="nav-link @if(URL::current() == route('product')) active @endif" href="{{ route('product') }}"><i class="fas fa-shopping-bag"></i> Product</a>
                    <a class="nav-link @if(URL::current() == route('client')) active @endif" href="{{ route('client') }}"><i class="fas fa-users"></i> Client</a>
                    <a class="nav-link @if(URL::current() == route('slider')) active @endif" href="{{ route('slider') }}"><i class="fas fa-images"></i> Image Slider</a>
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>-->
            @yield('content')
        </div>
    </div>
</div>
<!-- My Account End -->

<!-- Footer Start -->
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget">
                    <h2>Get in Touch</h2>
                    <div class="contact-info">
                        <p><i class="fa fa-map-marker"></i>123 E Store, Los Angeles, USA</p>
                        <p><i class="fa fa-envelope"></i>email@example.com</p>
                        <p><i class="fa fa-phone"></i>+123-456-7890</p>
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
                <p>Developed By <a href="https://htmlcodex.com">Woaraka</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom End -->

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
{{--<script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>--}}

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('frontend/lib/slick/slick.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('frontend/js/main.js') }}"></script>

<script>
    function checkDelete(){
        return confirm('Are you sure to Delete this?');
    }
</script>
@yield('script')
</body>
</html>
