@extends('master')
@section('body')
    <div id="ImageCarousel" class="carousel slide" data-interval="2000" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#ImageCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#ImageCarousel" data-slide-to="1"></li>
            <li data-target="#ImageCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/SocialTrading.jpg" class="img-responsive" alt="First-Slider" style="width:1500px;">
            </div>
            <div class="item ">
                <img src="images/banner.jpg" class="img-responsive" alt="First-Slider" style="width:1500px;">
            </div>
            <div class="item ">
                <img src="images/trading.jpeg" class="img-responsive" alt="First-Slider" style="width:1500px;">
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
                    <img src="images/matrix.jpg" alt="Norway" class="card-image img-responsive" height="170px" width="360px">
                    <h4 class="card-title" style="font-size: large;">MATRIX PLAN</h4>
                    <div class="w3-container w3-center" style="margin-top: 10px">
                        <p class="card-text card-body">At C.T.M, we offer the best matrix plan to our members with an awesome referral commission.
                            </p>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @php($test = \App\Testimonial::orderByDesc('id')->get())


    @if($test != null)
    <!---Testimonial-->
    <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
        <div class="testimonial4_header">
            <h4>OUR TESTIMONIES SO FAR</h4>
        </div>
        <div class="carousel-inner" role="listbox">
            @php($i = 1)
            @foreach($test as $t)
                <div class="item {{$i == 1 ? 'active' : ""}}">
                    <div class="testimonial4_slide">
                        <img src="uploads/{{$t->image}}" class="img-responsive" />
                        <p>{{$t->word}}</p>
                        <h4>{{$t->name}}</h4>
                    </div>
                </div>
                @php($i++)
            @endforeach
        </div>
        <a class="left carousel-control" href="#testimonial4" role="button" data-slide="prev">
            <span class="fa fa-chevron-left" style="color: green;"></span>
        </a>
        <a class="right carousel-control" href="#testimonial4" role="button" data-slide="next">
            <span class="fa fa-chevron-right" style="color: green;"></span>
        </a>
    </div>
    <!--/Testimonial-->
    @endif
@endsection