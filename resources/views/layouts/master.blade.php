<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>
<!-- .header -->
<header class="header">
    <!-- .wrapper -->
    <div class="wrapper">
        <!-- .header-wrapper -->
        <div class="header-wrapper">
            <!-- .header-logo -->
            <div class="heaeder-logo">
                <h1>logo</h1>
            </div>
            <!-- end .headr-logo -->
            <!-- .headr-nav -->
            <nav class="header-nav" id="nav">
                <ul class="header-list">
                    <li class="header-item">
                        <a href="#" class="header-link">Home</a>
                    </li>
                    <li class="header-item">
                        <a href="#" class="header-link">Categories</a>
                    </li>
                    <li class="header-item">
                        <a href="#" class="header-link">About us</a>
                    </li>
                    <li class="header-item">
                        <a href="#" class="header-link">Contact</a>
                    </li>
                </ul>
            </nav>
            <!--end .header-nav -->
            <button class="burger" type="button" id="navToggle">
                <img src="img/burger.svg" alt="" class="burger__icon">
            </button>
            <!-- .header-cart -->
            <div class="header-cart">
                <a class="cart-link " href="{{ route('cart') }}">
                    <span>Cart</span>
                    <svg  width='20' height="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 193.056 193.056">
                        <g fill="#21ed08eb">
                            <path d="M163.022,147.499H62.417l-2.13-8.714h114.017l18.466-80.448L42.135,40.28L35.234,0H0.286v15.217h22.116l3.969,23.173
								l-0.32-0.038l18.184,100.435h0.383l2.214,9.049c-10.774,1.798-19.021,11.164-19.021,22.44c0,12.562,10.218,22.78,22.777,22.78
								c12.559,0,22.78-10.218,22.78-22.78c0-2.65-0.479-5.192-1.319-7.558h69.512c-0.837,2.369-1.319,4.91-1.319,7.558
								c0,12.562,10.218,22.78,22.775,22.78c12.562,0,22.78-10.218,22.78-22.78C185.805,157.718,175.584,147.499,163.022,147.499z
								M44.818,55.925l129.331,15.507l-11.968,52.136H56.946L46.89,68.018L44.818,55.925z M50.594,177.837
								c-4.169,0-7.56-3.393-7.56-7.563c0-4.167,3.391-7.558,7.56-7.558c4.169,0,7.56,3.394,7.56,7.558
								C58.154,174.446,54.763,177.837,50.594,177.837z M163.022,177.84c-4.167,0-7.558-3.393-7.558-7.563
								c0-4.167,3.393-7.558,7.558-7.558c4.172,0,7.563,3.393,7.563,7.558C170.588,174.446,167.194,177.84,163.022,177.84z"/>
                        </g>
                    </svg>
                </a>
            </div>
            <!--end .header-cart -->
        </div>
        <!--end .header-wrapper -->

    </div>
    <!-- end .wrapper -->
</header>
<!-- end .header -->
@if(session()->has('success'))
    <div class="alert alert-success">
        <h1>{{ session()->get('success') }}</h1>
    </div>
@elseif(session()->has('warning'))
    <div class="alert alert-warning">
        <h1>{{ session()->get('warning') }}</h1>
    </div>
@endif
<section>
    <!-- .wrapper -->
    <div class="wrapper">
        <!-- content -->
        <div class="content">
            @yield('content')

        </div>
        <!-- end .content -->
    </div>
    <!-- end .wrapper -->
</section>
<!-- end .section -->
<!-- script -->
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
