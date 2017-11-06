@extends('master')
@section('body')
    <!-- about -->
    <div class="services">
        <div class="container">
            <div class="w3layouts_header">
                <p><span><i class="fa fa-info-circle" aria-hidden="true"></i></span></p>
                <h5>Brief description <span>about us</span></h5>
            </div>
            <div class="w3layouts_skills_grids">
                <div class="col-lg-2"></div>
                <div class="col-md-8 agileinfo_about_left">
                    <h4>Etiam non turpis sit amet nisl lacinia vehicula ac sollicitudin ex blandit leo tempor</h4>
                    <p>Phasellus pharetra velit eu felis pretium, nec eleifend ante varius.
                        Proin eget ante sit amet leo rhoncus scelerisque. Cum sociis natoque penatibus et
                        magnis dis parturient montes, nascetur ridiculus mus.
                        <i>Etiam non turpis sit amet nisl lacinia vehicula ac sollicitudin ex. Maecenas
                            bibendum nisi purus, in ullamcorper nisl aliquam id.</i>
                        Suspendisse maximus vestibulum consectetur. Aliquam erat volutpat.
                        Proin eu lacus at nulla commodo feugiat eleifend sit amet mauris.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //about -->
    <!-- team -->
    <div class="skills" style="margin-bottom:35px;">
        <div class="container">
            <div class="w3layouts_header w3_agile_head">
                <p><span><i class="fa fa-users" aria-hidden="true"></i></span></p>
                <h5>Our <span>Team</span></h5>
            </div>
            <div class="w3layouts_skills_grids">
                <div class="col-md-3 agile_team_grid">
                    <div class="agileits_w3layouts_team_grid">
                        <img src="images/12.jpg" alt=" " class="img-responsive" />
                        <div class="agileits_w3layouts_team_grid_pos">
                            <ul class="agileits_social_list">
                                <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <h4>Mark Williamson</h4>
                    <p>Marketer</p>
                </div>
                <div class="col-md-3 agile_team_grid">
                    <div class="agileits_w3layouts_team_grid">
                        <img src="images/13.jpg" alt=" " class="img-responsive" />
                        <div class="agileits_w3layouts_team_grid_pos">
                            <ul class="agileits_social_list">
                                <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <h4>Jennifer Carl</h4>
                    <p>Agent</p>
                </div>
                <div class="col-md-3 agile_team_grid">
                    <div class="agileits_w3layouts_team_grid">
                        <img src="images/14.jpg" alt=" " class="img-responsive" />
                        <div class="agileits_w3layouts_team_grid_pos">
                            <ul class="agileits_social_list">
                                <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <h4>Andria Paul</h4>
                    <p>Marketer</p>
                </div>
                <div class="col-md-3 agile_team_grid">
                    <div class="agileits_w3layouts_team_grid">
                        <img src="images/15.jpg" alt=" " class="img-responsive" />
                        <div class="agileits_w3layouts_team_grid_pos">
                            <ul class="agileits_social_list">
                                <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <h4>Julia Mark</h4>
                    <p>Marketer</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //team -->
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider){
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    <!-- //flexSlider -->
    <!-- stats -->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.countup.js"></script>
    <script>
        $('.counter').countUp();
    </script>
@endsection