<template>

    <div id="wrapper">
        <!-- toggle top area -->
        <div class="hidden-top">
            <div class="hidden-top-inner container">
                <div class="row">
                    <div class="span12">
                        <ul>
                            <li><strong>We are available for any custom works this month</strong></li>
                            <li>Main office: Springville center X264, Park Ave S.01</li>
                            <li>Call us <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end toggle top area -->
        <!-- start header -->
        <header>
            <div class="container ">
                <!-- hidden top area toggle link -->

                <!-- end toggle link -->
                <div class="row nomargin">
                    <div class="span12">
                        <div class="headnav">
                            <ul>
                                <li><a href="#mySignup" data-toggle="modal"><i class="icon-user"></i> Sign up</a></li>
                                <li><a href="#mySignin" data-toggle="modal">Sign in</a></li>
                            </ul>
                        </div>
                        <!-- Signup Modal -->
                        <div id="mySignup" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySignupModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 id="mySignupModalLabel">Create an <strong>account</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">Email</label>
                                        <div class="controls">
                                            <input type="text" id="inputEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputSignupPassword">Password</label>
                                        <div class="controls">
                                            <input type="password" id="inputSignupPassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputSignupPassword2">Confirm Password</label>
                                        <div class="controls">
                                            <input type="password" id="inputSignupPassword2" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn">Sign up</button>
                                        </div>
                                        <p class="aligncenter margintop20">
                                            Already have an account? <a href="#mySignin" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Sign in</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end signup modal -->
                        <!-- Sign in Modal -->
                        <div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 id="mySigninModalLabel">Login to your <strong>account</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label" for="inputText">Username</label>
                                        <div class="controls">
                                            <input type="text" id="inputText" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputSigninPassword">Password</label>
                                        <div class="controls">
                                            <input type="password" id="inputSigninPassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn">Sign in</button>
                                        </div>
                                        <p class="aligncenter margintop20">
                                            Forgot password? <a href="#myReset" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Reset</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end signin modal -->
                        <!-- Reset Modal -->
                        <div id="myReset" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="myResetModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 id="myResetModalLabel">Reset your <strong>password</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label" for="inputResetEmail">Email</label>
                                        <div class="controls">
                                            <input type="text" id="inputResetEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn">Reset password</button>
                                        </div>
                                        <p class="aligncenter margintop20">
                                            We will send instructions on how to reset your password to your inbox
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end reset modal -->
                    </div>
                </div>
                <div class="row">
                    <div class="span4">
                        <div class="logo">
                            <a href=""><img src="../../../../public/assets/img/logo.png" alt="" class="logo" /></a>
                        </div>
                    </div>
                    <div class="span8">
                        <div class="navbar navbar-static-top">
                            <div class="navigation">
                                <nav>
                                    <ul class="nav topnav" style="display: flex">
                                        <router-link to="/index" class="nav-link" exact>
                                            <li class="dropdown active">
                                                <a href="">Home </a>
                                            </li>
                                        </router-link>
                                        <router-link to="/categories" class="nav-link" exact>
                                            <li class="dropdown active">
                                                <a href="">Categories </a>
                                            </li>
                                        </router-link>
                                    </ul>
                                </nav>
                            </div>
                            <!-- end navigation -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->
        <section id="featured">
            <!-- start slider -->
            <!-- Slider -->
            <div id="nivo-slider">
                <div class="nivo-slider">
                    <!-- Slide #1 image -->
                    <img src="../../../../public/assets/img/slides/nivo/bg-1.jpg" alt="" title="#caption-1" />
                    <!-- Slide #2 image -->
                    <img src="../../../../public/assets/img/slides/nivo/bg-2.jpg" alt="" title="#caption-2" />
                    <!-- Slide #3 image -->
                    <img src="../../../../public/assets/img/slides/nivo/bg-3.jpg" alt="" title="#caption-3" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <!-- Slide #1 caption -->
                            <div class="nivo-caption" id="caption-1">
                                <div>
                                    <h2>Awesome <strong>features</strong></h2>
                                    <p>
                                        Lorem ipsum dolor sit amet nsectetuer nec Vivamus. Curabitu laoreet amet eget. Viurab oremd ellentesque ameteget. Lorem ipsum dolor sit amet nsectetuer nec vivamus.
                                    </p>
                                    <a href="#" class="btn btn-theme">Read More</a>
                                </div>
                            </div>
                            <!-- Slide #2 caption -->
                            <div class="nivo-caption" id="caption-2">
                                <div>
                                    <h2>Fully <strong>responsive</strong></h2>
                                    <p>
                                        Lorem ipsum dolor sit amet nsectetuer nec Vivamus. Curabitu laoreet amet eget. Viurab oremd ellentesque ameteget. Lorem ipsum dolor sit amet nsectetuer nec vivamus.
                                    </p>
                                    <a href="#" class="btn btn-theme">Read More</a>
                                </div>
                            </div>
                            <!-- Slide #3 caption -->
                            <div class="nivo-caption" id="caption-3">
                                <div>
                                    <h2>Very <strong>customizable</strong></h2>
                                    <p>
                                        Lorem ipsum dolor sit amet nsectetuer nec Vivamus. Curabitu laoreet amet eget. Viurab oremd ellentesque ameteget. Lorem ipsum dolor sit amet nsectetuer nec vivamus.
                                    </p>
                                    <a href="#" class="btn btn-theme">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end slider -->
        </section>
        <section class="callaction">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="big-cta">
                            <div class="cta-text">
                                <h3>We've created more than <span class="highlight"><strong>5000 websites</strong></span> this year!</h3>
                            </div>
                            <div class="cta floatright">
                                <a class="btn btn-large btn-theme btn-rounded" href="#">Request a quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="row">
                            <div class="span3">
                                <div class="box aligncenter">
                                    <div class="aligncenter icon">
                                        <i class="icon-briefcase icon-circled icon-64 active"></i>
                                    </div>
                                    <div class="text">
                                        <h6>Corporate business</h6>
                                        <p>
                                            Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                                        </p>
                                        <a href="#">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="box aligncenter">
                                    <div class="aligncenter icon">
                                        <i class="icon-desktop icon-circled icon-64 active"></i>
                                    </div>
                                    <div class="text">
                                        <h6>Responsive theme</h6>
                                        <p>
                                            Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                                        </p>
                                        <a href="#">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="box aligncenter">
                                    <div class="aligncenter icon">
                                        <i class="icon-beaker icon-circled icon-64 active"></i>
                                    </div>
                                    <div class="text">
                                        <h6>Coded carefully</h6>
                                        <p>
                                            Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                                        </p>
                                        <a href="#">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="box aligncenter">
                                    <div class="aligncenter icon">
                                        <i class="icon-coffee icon-circled icon-64 active"></i>
                                    </div>
                                    <div class="text">
                                        <h6>Sit and enjoy</h6>
                                        <p>
                                            Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                                        </p>
                                        <a href="#">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- divider -->
                <div class="row">
                    <div class="span12">
                        <div class="solidline">
                        </div>
                    </div>
                </div>
                <!-- end divider -->
                <!-- Portfolio Projects -->
                <div class="row">
                    <div class="span12">
                        <h4 class="heading">Some of recent <strong>works</strong></h4>
                        <div class="row">
                            <section id="projects">
                                <ul id="thumbs" class="portfolio">
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The City" href="../../../../public/assets/img/works/full/image-01-full.jpg">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb font-icon-plus"></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="../../../../public/assets/img/works/thumbs/image-01.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                    </li>
                                    <!-- End Item Project -->
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs span3 design" data-id="id-1" data-type="icon">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Office" href="../../../../public/assets/img/works/full/image-02-full.jpg">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb font-icon-plus"></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="../../../../public/assets/img/works/thumbs/image-02.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                    </li>
                                    <!-- End Item Project -->
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="../../../../public/assets/img/works/full/image-03-full.jpg">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb font-icon-plus"></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="../../../../public/assets/img/works/thumbs/image-03.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                    </li>
                                    <!-- End Item Project -->
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="../../../../public/assets/img/works/full/image-04-full.jpg">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb font-icon-plus"></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="../../../../public/assets/img/works/thumbs/image-04.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                    </li>
                                    <!-- End Item Project -->
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs span3 photography" data-id="id-4" data-type="web">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Sea" href="../../../../public/assets/img/works/full/image-05-full.jpg">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb font-icon-plus"></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="../../../../public/assets/img/works/thumbs/image-05.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                    </li>
                                    <!-- End Item Project -->
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs span3 photography" data-id="id-5" data-type="icon">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Clouds" href="../../../../public/assets/img/works/full/image-06-full.jpg">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb font-icon-plus"></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="../../../../public/assets/img/works/thumbs/image-06.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                    </li>
                                    <!-- End Item Project -->
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="../../../../public/assets/img/works/full/image-07-full.jpg">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb font-icon-plus"></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="../../../../public/assets/img/works/thumbs/image-07.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                    </li>
                                    <!-- End Item Project -->
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Dark" href="../../../../public/assets/img/works/full/image-08-full.jpg">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb font-icon-plus"></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="../../../../public/assets/img/works/thumbs/image-08.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                    </li>
                                    <!-- End Item Project -->
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
                <!-- End Portfolio Projects -->
                <!-- divider -->
                <div class="row">
                    <div class="span12">
                        <div class="solidline">
                        </div>
                    </div>
                </div>
                <!-- end divider -->
                <div class="row">
                    <div class="span12">
                        <h4>Very satisfied <strong>clients</strong></h4>
                        <ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients">
                            <li>
                                <a href="#">
                                    <img src="../../../../public/assets/img/dummies/clients/client1.png" class="client-logo" alt="" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../../../../public/assets/img/dummies/clients/client2.png" class="client-logo" alt="" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../../../../public/assets/img/dummies/clients/client3.png" class="client-logo" alt="" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../../../../public/assets/img/dummies/clients/client4.png" class="client-logo" alt="" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../../../../public/assets/img/dummies/clients/client5.png" class="client-logo" alt="" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../../../../public/assets/img/dummies/clients/client6.png" class="client-logo" alt="" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../../../../public/assets/img/dummies/clients/client1.png" class="client-logo" alt="" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../../../../public/assets/img/dummies/clients/client2.png" class="client-logo" alt="" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../../../../public/assets/img/dummies/clients/client3.png" class="client-logo" alt="" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../../../../public/assets/img/dummies/clients/client4.png" class="client-logo" alt="" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../../../../public/assets/img/dummies/clients/client5.png" class="client-logo" alt="" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../../../../public/assets/img/dummies/clients/client6.png" class="client-logo" alt="" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="bottom">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="aligncenter">
                            <div id="twitter-wrapper">
                                <div id="twitter">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="widget">
                            <h5 class="widgetheading">Browse pages</h5>
                            <ul class="link-list">
                                <li><a href="#">About our company</a></li>
                                <li><a href="#">Our services</a></li>
                                <li><a href="#">Meet our team</a></li>
                                <li><a href="#">Explore our portfolio</a></li>
                                <li><a href="#">Get in touch with us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="widget">
                            <h5 class="widgetheading">Important stuff</h5>
                            <ul class="link-list">
                                <li><a href="#">Press release</a></li>
                                <li><a href="#">Terms and conditions</a></li>
                                <li><a href="#">Privacy policy</a></li>
                                <li><a href="#">Career center</a></li>
                                <li><a href="#">Flattern forum</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="widget">
                            <h5 class="widgetheading">Flickr photostream</h5>
                            <div class="flickr_badge">
                            </div>
                            <div class="clear">
                            </div>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="widget">
                            <h5 class="widgetheading">Get in touch with us</h5>
                            <address>
                                <strong>Flattern studio, Pte Ltd</strong><br>
                                Springville center X264, Park Ave S.01<br>
                                Semarang 16425 Indonesia
                            </address>
                            <p>
                                <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891 <br>
                                <i class="icon-envelope-alt"></i> email@domainname.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="span6">
                            <div class="copyright">
                                <p>
                                    <span>&copy; Flattern - All right reserved.</span>
                                </p>
                                <div class="credits">
                                    <!--
                                      All the links in the footer should remain intact.
                                      You can delete the links only if you purchased the pro version.
                                      Licensing information: https://bootstrapmade.com/license/
                                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Flattern
                                    -->
                                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <ul class="social-network">
                                <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Google plus"><i class="icon-google-plus icon-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
    export default {
        name: 'index'
    }
</script>

<style scoped src="../../../../public/assets/css/bootstrap.css"></style>
<style scoped src="../../../../public/assets/css/bootstrap.css"></style>
<style scoped src="../../../../public/assets/css/bootstrap-responsive.css"></style>
<style scoped src="../../../../public/assets/css/fancybox/jquery.fancybox.css"></style>
<style scoped src="../../../../public/assets/css/jcarousel.css"></style>
<style scoped src="../../../../public/assets/css/style.css"></style>
<style scoped src="../../../../public/assets/skins/default.css"></style>