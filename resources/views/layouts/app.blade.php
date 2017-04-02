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
                        <img src="{{asset('images/checker5.jpg')}}" width="200" height="" align="left" alt="logo">
                    </a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            
                        <li class="scroll"><a href="{{ url('/') }}">HOME</a></li>
                        
                        <li class="scroll"><a href="#features">ABOUT US</a></li>
                        <li class="scroll"><a href="#services">SUPPORT</a></li>
                        <li class="scroll"><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> LOGIN</a></li>
                        <li class="scroll"><a href="{{ route('register') }}"><i class="fa fa-edit"></i> REGISTER</a></li>
                        
                                            
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

    @yield('content')

</div>
    <section id="features">
        <div class="container">
            <div class="section-header">
                <h2>TERMS AND CONDITIONS</h2> 
<p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">
WELCOME!
CHECKERS FUNDS is a peer to peer donation exchange platform. We strive on our cooperative support and constantly grow through influx of new members and on a robust system and algorithms working very well and automated. 
Our major goal is to willingly help one another to achieve an equality platform and stop financial insecurities leaving the poor, poorer and helpless. 
<BR>CHECKERS FUNDS is a simple 100% returns within 12hours or less to 15 days maximum platform as this can only be achieved when we are sincere to ourselves, avoid fake pop, scams, invite new members and adhere to the terms and conditions.
REFERRAL is not compulsory as we do not intend to make vague promises but informing others will really enable the platform grow bigger and stronger to benefit us all.<br>
CHECKERS FUNDS  demands a commitment of honesty and sincerity from its members, supporting and uplifting one another. Its principle is simple, give and receive… Provide help to someone when you are able to do so and also request to be helped when you need it. And keep on doing this cycle.

 Contact us via email on contactcheckersfunds@gmail.com.
  For URGENT issues, contact us via our support Ticket in your dashboard when you login.
<br><br>Thanks. Support –<br>
CHECKERSFUNDS.COM




</p>
            </div>
            <div class="row">               
                <div class="col-md-6">
                    <div class="media service-box wow fadeInRight">
                        <div class="imgs pull-left">
                          
                 </div>
                        
                    </div>
                    </div>
<div class="col-md-6">
                    <div class="media service-box wow fadeInRight">
                        <div class="imgs pull-left">
                         
                        </div>
                       
                    </div>
                    </div> 
                    </div>
        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6"><br>
                    &copy; 2017 all right reserved by CHECKERSFUNDS.com:::Legit Peer to Peer Donation Platform
                </div><br>
                |TERMS OF USE | <b><abbr>PRIVACY POLICY</abbr></b>|WARNING
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    <script src=" {{ asset('js/jquery.js') }} "></script>
    <script src=" {{ asset('js/bootstrap.min.js') }} "></script>
    @yield('script')
    
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




 




    