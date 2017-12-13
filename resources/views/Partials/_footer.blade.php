<div class="newsletter">

    <div class="container">
        <div class="w3layouts_header w3_agile_head">
            <p><span><i class="fa fa-envelope-o" aria-hidden="true" style="color:yellow;"></i></span></p>
            <h5 style="color:yellow;">Contact <span>Us</span></h5>
        </div>
        <div class="w3ls_footer_grid">
            <div class="col-md-4 w3ls_footer_grid_left">
                <div class="w3ls_footer_grid_leftl">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="w3ls_footer_grid_leftr">
                    <h4>Email</h4>
                    <a href="mailto:info@cryptotradingmatrix.com">info@cryptotradingmatrix.com</a>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-4 w3ls_footer_grid_left">
                <div class="w3ls_footer_grid_leftl">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="w3ls_footer_grid_leftr">
                    <h4>Email</h4>
                    <a href="mailto:support@cryptotradingmatrix.com">support@cryptotradingmatrix.com</a>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-4 w3ls_footer_grid_left">
                <div class="w3ls_footer_grid_leftl">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="w3ls_footer_grid_leftr">
                    <h4>Email</h4>
                    <a href="mailto:admin@cryptotradingmatrix.com">admin@cryptotradingmatrix.com</a>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="w3l_footer_pos">
        <p>© 2017 Crypto Trading Matrix. All Rights Reserved</p>
        <div class="w3ls_newsletter_social">
            <ul class="agileits_social_list">
                <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- //footer -->
<!-- gauge-meter -->
<script src="{{asset('js/jquery.gauge.js')}}"></script>
<script>
    $(document).ready(function (){
        $("#gauge1").gauge(30,{color: "#fb5710",unit: " %",type: "halfcircle"});
        $("#gauge2").gauge(70, {color: "#a821e7", unit: " %",type: "halfcircle"});
        $("#gauge3").gauge(75, {color: "#fbb810",unit: " %",type: "halfcircle"});
        $("#gauge4").gauge(90, {color: "#21d0e7",unit: " %",type: "halfcircle"});
    });
</script>
<!-- //gauge-meter -->
<!-- range -->
<script type="text/javascript" src="{{asset('js/jquery-ui.js')}}"></script>
<script type='text/javascript'>//<![CDATA[
    $(window).load(function(){
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 900,
            values: [ 50, 600 ],
            slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

    });//]]>
</script>
<!-- //range -->
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('js/easing.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smooth-scrolling -->
<!-- for bootstrap working -->
<script src="{{asset('js/bootstrap.js')}}"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->