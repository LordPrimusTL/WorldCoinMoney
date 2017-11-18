<div id="google_translate_element"></div><script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
    }
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<div class="header" style="background-color:yellow;">
    <div class="container">
        <div class="w3_agile_logo">
            <h1><a href="@if(Auth::check()) @if(Auth::user()->role_id == 3) {{route('user_dashboard')}} @elseif(Auth::user()->role_id < 3) {{route('home')}} @else {{route('home')}} @endif @endif"><img src="{{asset('images/logoball.jpg')}}" class="img img-circle" style="width:50px;height:50px;font-size:2em;"/> <span style="color: green;">W</span>ORLD COIN CRYPTO-CURRENCY TRADING</a></h1>
        </div>
        <div class="agile_header_social">
            <ul class="agileits_social_list">
                <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- header -->
<!-- banner -->
<div style="background-color:green;">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <nav class="link-effect-12">
                    <ul class="nav navbar-nav w3_agile_nav">
                        @if(\App\Helpers\AuthCheck::AuthUserCheck())
                            <li class="{{Request::is('user/dashboard') ? 'active' : ''}}"><a href="{{route('user_dashboard')}}"><span>Dashboard</span></a></li>
                            <li class="{{Request::is('user/transactions') ? 'active' : ''}}"><a href="{{route('user_transaction')}}"><span>Transactions</span></a></li>
                            <li class="{{Request::is('user/account/*') ? 'active' : ''}}"><a href="{{route('user_account')}}"><span>Account</span></a></li>
                            <li class="{{Request::is('logout') ? 'active' : ''}}"><a href="{{route('logout')}}"><span>Log Out</span></a></li>
                        @elseif(\App\Helpers\AuthCheck::AuthAdminCheck())
                            <li class="{{Request::is('/') ? 'active' : ''}}"><a href=""><span>Home</span></a></li>
                            <li><a href="{{route('about')}}"><span>About Us</span></a></li>
                            <li class="dropdown {{Request::is('register') || Request::is('login') ? 'active' : ''}}">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span data-hover="Short Codes">Accounts</span> <b class="caret"></b></a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    <li><a href="{{route('register')}}">Register</a></li>
                                    <li><a href="{{route('login')}}">Login</a></li>
                                </ul>
                            </li>
                            <li class="{{Request::is('contact') ? 'active' : ''}}"><a href="{{route('contact')}}"><span>Contact Us</span></a></li>
                        @else
                            <li class="{{Request::is('/') ? 'active' : ''}}"><a href="@if(Auth::check()) @if(Auth::user()->role_id == 3) {{route('user_dashboard')}} @elseif(Auth::user()->role_id < 3) {{route('home')}} @else {{route('home')}} @endif @else {{route('home')}} @endif"><span>Home</span></a></li>
                            <li class="{{Request::is('about') ? 'active' : ''}}"><a href="{{route('about')}}"><span>About Us</span></a></li>
                            <li class="dropdown {{Request::is('register') || Request::is('login') ? 'active' : ''}}">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span data-hover="Short Codes">Accounts</span> <b class="caret"></b></a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    <li><a href="{{route('register')}}">Register</a></li>
                                    <li><a href="{{route('login')}}">Login</a></li>
                                </ul>
                            </li>
                            <li class="{{Request::is('contact') ? 'active' : ''}}"><a href="{{route('contact')}}"><span>Contact Us</span></a></li>
                        @endif
                    </ul>
                    <<!--div class="w3_agileits_search_form">
                        <form action="#" method="post">
                            <input type="search" name="Search" placeholder="Search" required="">
                            <button class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
                        </form>
                    </div>-->
                </nav>
            </div>
        </nav>
    </div>
    <br/>
</div>