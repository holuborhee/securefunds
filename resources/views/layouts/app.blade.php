<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="webthemez">

    <!-- CSRF Token -->
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" value="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!--<link rel ="stylesheet" type = "text/css" href = " {{ asset('static/css/bootstrap.css') }} " />-->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link href=" {{ asset('css/font-awesome.min.css') }} " rel="stylesheet">
    <link href=" {{ asset('css/animate.min.css') }} " rel="stylesheet">
    <link href=" {{ asset('css/owl.carousel.css') }} " rel="stylesheet">
    <link href=" {{ asset('css/owl.transitions.css') }} " rel="stylesheet">
    <link href=" {{ asset('css/prettyPhoto.css') }} " rel="stylesheet">
    <link href=" {{ asset('css/spend thrift.css') }} " rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/vue.js') }}"></script> 
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.2/vue.min.js"></script>--> 


    <!--[if lt IE 9]>
    <script src=" {{ asset('js/html5shiv.js') }} "></script>
    <script src=" {{ asset('js/respond.min.js') }} "></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico"> 
    <style type="text/css">
    .barry{background-image: url('images/investment2.jpg');
    }
    
    </style>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body id="home">
        <header id="header">
        <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'SECURE FUNDS') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            
                        <li class="scroll"><a href="{{ url('/') }}">HOME</a></li>
                        <li class="scroll"><a href="#pricing">TRANSACTION</a></li>
                        <li class="scroll"><a href="#features">ABOUT US</a></li>
                        <li class="scroll"><a href="#contact">SUPPORT</a></li>
                        <li class="scroll"><a href="{{ route('register') }}">REGISTER</a></li>
                        <li class="scroll"><a href="{{ route('login') }}">SIGN IN</a></li>
                                            
                        @else
                            <li class="scroll"><a href="{{ url('/home') }}">DASHBOARD</a></li>
                        <li class="scroll"><a href="{{ url('/donations') }}">DONATIONS</a></li>
                        <li class="scroll"><a href="{{ url('/transactions') }}">TRANSACTION</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user""></i> {{ Auth::user()->getName() }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out""></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        </header>
<div id="app">
<section id="testimonial">

        @yield('testimonial')

</section>
    @yield('rest_content')
</div>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6"><br>
                    &copy; 2017 all right reserved by SECUREFUNDS.com:::Legit Peer to Peer Donation Platform
                </div><br>
                |TERMS OF USE | <b><abbr>PRIVACY POLICY</abbr></b>|WARNING
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    @yield('script')
    <script src=" {{ asset('js/jquery.js') }} "></script>
    <script src=" {{ asset('js/bootstrap.min.js') }} "></script>
    <script src=" {{ asset('js/owl.carousel.min.js') }} "></script>
    <script src=" {{ asset('js/mousescroll.js') }} "></script>
    <script src=" {{ asset('js/smoothscroll.js') }} "></script>
    <script src=" {{ asset('js/jquery.prettyPhoto.js') }} "></script>
    <script src=" {{ asset('js/jquery.isotope.min.js') }} "></script>
    <script src=" {{ asset('js/jquery.inview.min.js') }} "></script>
    <script src=" {{ asset('js/wow.min.js') }} "></script>
    <script src=" {{ asset('js/custom-scripts.js') }} "></script>
</body>
</html>




 




    