<header class="header">
    <nav class="navbar">

        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <!-- Navbar Header-->
                <div class="navbar-header">
                    <!-- Navbar Brand --><a href="{{route('admin_dashboard')}}" class="navbar-brand">
                        <div class="brand-text brand-big hidden-lg-down"><span>Admin </span><strong>Dashboard</strong></div>
                        <div class="brand-text brand-small"><strong>BD</strong></div>
                    </a>
                    <!-- Toggle Button--><a id="toggle-btn" onclick="function sidebarCall() {
                                                                        //e.preventDefault();
                                                                        $(this).toggleClass('active');

                                                                        $('.side-navbar').toggleClass('shrinked');
                                                                        $('.content-inner').toggleClass('active');

                                                                        if ($(window).outerWidth() > 1183) {
                                                                            if ($('#toggle-btn').hasClass('active')) {
                                                                                $('.navbar-header .brand-small').hide();
                                                                                $('.navbar-header .brand-big').show();
                                                                            } else {
                                                                                $('.navbar-header .brand-small').show();
                                                                                $('.navbar-header .brand-big').hide();
                                                                            }
                                                                        }

                                                                        if ($(window).outerWidth() < 1183) {
                                                                            $('.navbar-header .brand-small').show();
                                                                        }
                                                                        }
                            sidebarCall();" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                </div>
                <!-- Navbar Menu -->
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Logout    -->
                    <li class="nav-item"><a href="{{route('logout')}}" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>