@extends('master')
@section('body')
    <div id="ImageCarousel" style="height: 442px;" class="carousel slide" data-interval="2000" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#ImageCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#ImageCarousel" data-slide-to="1"></li>
            <li data-target="#ImageCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="height: 442px;">
            <div class="item active">
                <img src="images/SocialTrading.jpg" class="img-responsive" alt="First-Slider" style="width:1500px;">
            </div>
            <div class="carousel-caption">
                <h3>MY SiteName</h3>
                <p>Make Money Everywhere</p>
            </div>
            <div class="item ">
                <img src="images/banner.jpg" class="img-responsive" alt="First-Slider" style="width:1500px;">
                <div class="carousel-caption">
                    <h3>MY SiteName</h3>
                    <p>Make Money Everywhere</p>
                </div>
            </div>
            <div class="item ">
                <img src="images/trading.jpeg" class="img-responsive" alt="First-Slider" style="width:1500px;">
                <div class="carousel-caption">
                    <h3>MY SiteName</h3>
                    <p>Make Money Everywhere</p>
                </div>
            </div>
            <a href="#ImageCarousel" class="carousel-control left" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"style="color:yellow;"></span>
            </a>
            <a href="#ImageCarousel" class="carousel-control right" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" style="color:yellow;"></span>
            </a>
        </div>
    </div>
    <!-- //banner -->
    <!--News Slider
    <div class="row" style="margin-top: 50px;">
        @php($ss = \App\Info::orderByDesc('created_at','DESC')->get())

        <div class="col-lg-1"></div>
        <div class="col-lg-10 w3-card">
            <div class="carousel slide" data-interval="5000" data-ride="carousel" style=" margin-bottom:20px;margin-top:70px;">
                <div class="carousel-inner">
                    @php($i = 1)
                    @foreach($ss as $s)
                        <div class="item {{$i == 1 ? 'active' : ''}}">
                            <header class="text-center"><h2 style="font-size:25px !important;color:green;">{{$s->title}}</h2></header>
                            <p class="well-sm text-muted container" style="font-size:20px;">
                                {{$s->data}}
                            </p>
                        </div>
                        @php($i++)
                    @endforeach
                </div>
            </div>
        </div>
    </div>-->
    <!--//News Slider ends here-->
    <!--// brief information about us-->
    <div class="container" style="margin-top:70px;">
        <header class=" text-center" style="font-size:25px;color:green;;font-family:cursive">What We Offer</header>
        <div class="col-md-offset-3 col-sm-offset-3 col-xs-offset-3 " style="width:50%;margin-bottom:40px;" id="line">
            <hr class="hr-dark hm-red-light">
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="w3-card-4 w3-hover-shadow text-center">
                    <img src="images/live.jpg" alt="Norway" class="card-image img-responsive">
                    <h4 class="card-title" style="font-size: large;">SIGNAL LIVE</h4>
                    <div class="w3-container w3-center" style="margin-top: 10px">
                        <p class="card-text card-body">Regardless of whether you are resting,celebrating,working, you will automatically get SIGNAL from the organization</p>
                    </div>
                </div>
            </div><div class="col-lg-3">
                <div class="w3-card-4 text-center w3-hover-shadow">
                    <img src="images/meeting.jpg" alt="Norway" class="card-image img-responsive" height="170px" width="360px">
                    <h4 class="card-title" style="font-size: large;">LIVE TRAINING</h4>
                    <div class="w3-container w3-center" style="margin-top: 10px">
                        <p class="card-text card-body">There are webinars and seminars room where many scenario ace dealers  in the business sectors will give live online training</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="w3-card-4 text-center w3-hover-shadow">
                    <img src="images/signal.jpg" alt="Norway" class="card-image img-responsive" height="170px" width="360px">
                    <h4 class="card-title" style="font-size: large;">TRADING INVESTMENT</h4>
                    <div class="w3-container w3-center" style="margin-top: 10px">
                        <p class="card-text card-body">At CTM ,we offer an Automated trading platforms that enable traders to invest money and wait for some percentage profit monthly.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="w3-card-4 text-center w3-hover-shadow">
                    <img src="images/teach.jpg" alt="Norway" class="card-image img-responsive" height="170px" width="360px">
                    <h4 class="card-title" style="font-size: large;">TRAINING EDUCATION</h4>
                    <div class="w3-container w3-center" style="margin-top: 10px">
                        <p class="card-text card-body">At C.T.M, we offer the best trading education to our academy's students instruction on the market.
                            </p>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="w3-card-4">
                    <h4 class="card-title text-center" style="font-size: large; padding-top:20px;color:green;;font-family:cursive;">HOW IT WORKS</h4>
                    <div class="w3-container w3-center" style="margin-top: 10px">
                        <div class="col-lg-12">
                            <h5 class="header pull-left">MONEY BACK GUARANTEE PROGRAM</h5>
                        </div>
                        <br/>
                        <br/>
                        <p class="card-text card-body text-left text-justify">
                            Crypto trading matrix(CTM) is an online company platorm available worldwide. We offer our members competitive 4 Free Tools operates on a membership basis. Created by network marketers and crypto traders,first online program that conserve network marketing(matrix) and crypto trading(free training on crypto trading, free crypto signals and crypto lending) , CTM meets every criteria of our industry and has an innovative approach in its pricing and compensation plan which doubles as an income stream within a month. Through our matrix plan,or  trading training,or crypto signals,or crypto lending investment , our members can earn 100% profit in any of our 4 tools services such as: matrix bonus(1btc) from the compensation plan with universal link,  commissions on their referrals upgrades when any members use his referral link to invite members, free crypto trading training by learning how to trade and become a pro trader, free crypto signal and crypto trading investment by clicking to trade now in your dashboard then deposit any amount from CTM10,000 = $15 = 0.002btc and earn up to 1.66% daily(50% monthly). The entry fees are paid (voluntarily) by our members for all tools at low fee .  All payments are exclusively used to pay our members back in the matrix plan and we provide the remaining 3 tools service at free of fund and risk .
                        </p>
                        <p class="card-text card-body text-left text-justify">
                            The matrix compensation plan works on a 3x3 company forced matrix structure. the crypto trading training work on a free crypto coach tutorial on whatsapp, telegram and facebook with live education, the crypto signals work by receiving 1-3 signal daily. Read our FAQ for more information about referral commission, referral bonus and leadership bonus both matrix and trading
                        </p>
                        <p class="card-text card-body text-left text-justify">
                            it is rare to work with us without earn from any of our 4 tools services, we had never encounter or meet such kind of problem since we are working  on the crypto market since 3 years ago that is why we promise and guarantee a 100% money back with refund policy.
                        </p>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// brief information about us ends here-->
    <!--<section id="middle" class="jumbotron" style="background-color:white;" >
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="accordion" style="margin-top:-20px;">
                        <h2 style="margin-bottom:20px;">Do you want to learn more?</h2>
                        <div class="panel-group" id="accordion1">
                            <div class="panel panel-default">
                                <div class="panel-heading active" style="background-color:black;color:white;">
                                    <h3 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                                            Learn more about how our referral works
                                            <i class="fa fa-angle-right pull-right"></i>
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapseOne1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="media accordion-inner">
                                            <div class="pull-left">
                                                <img class="img-responsive" src="images/pc1.png" width="160">
                                            </div>
                                            <div class="media-body">
                                                <h4>Gnissimos voluptatum</h4>
                                                <p style="font-size:15px;">Gnissimos voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi. atque corrupti quos dolores et quas molestias excepturi sint occaecat officia deserunt mollitia laborum et dolorum fuga
                                                    quas molestias excepturi sint occaecat officia deserunt mollitia laborum et dolorum fuga. At vero eos et accusamus et iusto odio dignis
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">
                                            Learn more on how to upgrade to a teacher
                                            <i class="fa fa-angle-right pull-right"></i>
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapseTwo1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="media accordion-inner">
                                            <div class="pull-left">
                                                <img class="img-responsive" src="images/p4.jpg" width="160">
                                            </div>
                                            <div class="media-body">
                                                <h4>Gnissimos voluptatum</h4>
                                                <p style="font-size:15px;">simos voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi. atque corrupti quos dolores et quas molestias excepturi sint occaecat officia deserunt mollitia laborum et dolorum fuga
                                                    quas molestias excepturi sint occaecat officia deserunt mollitia laborum et dolorum fuga.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1">
                                            Know more on how we Invest
                                            <i class="fa fa-angle-right pull-right"></i>
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapseThree1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="media accordion-inner">
                                            <div class="pull-left">
                                                <img class="img-responsive" src="images/p2.jpg" width="160">
                                            </div>
                                            <div class="media-body">
                                                <h4>simos voluptatum</h4>
                                                <p style="font-size:15px;">simos voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi. atque corrupti quos dolores et quas molestias excepturi sint occaecat officia deserunt mollitia laborum et dolorum fuga
                                                    quas molestias excepturi sint occaecat officia deserunt mollitia laborum et dolorum fuga.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour1">
                                            FAQs
                                            <i class="fa fa-angle-right pull-right"></i>
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapseFour1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="media accordion-inner">
                                            <div class="pull-left">
                                                <img class="img-responsive" src="images/gu5.png" width="160">
                                            </div>
                                            <div class="media-body">
                                                <h4>What others say</h4>
                                                <p style="font-size:15px;">simos voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi. atque corrupti quos dolores et quas molestias excepturi sint occaecat officia deserunt mollitia laborum et dolorum fuga
                                                    quas molestias excepturi sint occaecat officia deserunt mollitia laborum et</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 col-sm-push-1 voffset-mobile2">
                    <div class="testimonial">
                        <h2>Testimonials</h2>
                        <div class="media testimonial-inner">
                            <div class="pull-left">
                                <div class="abb">
                                    &nbsp;<img class="img-responsive" src="images/mission.png" width="160">&nbsp;
                                </div>
                            </div>
                            <div class="media-body">
                                <p style="font-size:15px;">simos voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi. atque corrupti quos dolores et quas molestias excepturi sint occaecat officia deserunt mollitia laborum et dolorum fuga
                                    quas molestias excepturi sint occaecat officia deserunt mollitia laborum et</p>
                                <span><strong>M.Primus</strong> Ondo Akure</span>
                            </div>
                        </div>
                        <div class="media testimonial-inner">
                            <div class="pull-left">
                                <div class="abb">
                                    <img class="img-responsive" src="images/gu5.png" width="160">
                                </div>
                            </div>
                            <div class="media-body">
                                <p  style="font-size:15px;">simos voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi. atque corrupti quos dolores et quas molestias excepturi sint occaecat officia deserunt mollitia laborum et dolorum fuga
                                    quas molestias excepturi sint occaecat officia deserunt mollitia laborum et</p>
                                <span><strong>O.Oladejo</strong></span>
                            </div>
                        </div>
                        <div class="media testimonial-inner">
                            <div class="pull-left">
                                <div class="abb">
                                    <img class="img-responsive" src="images/gu5.png" width="160">
                                </div>
                            </div>
                            <div class="media-body">
                                <p  style="font-size:15px;">simos voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi. atque corrupti quos dolores et quas molestias excepturi sint occaecat officia deserunt mollitia laborum et dolorum fuga
                                    quas molestias excepturi sint occaecat officia deserunt mollitia laborum et</p>
                                <span><strong>T.Olatunbosun</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
@endsection