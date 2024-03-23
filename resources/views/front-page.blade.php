<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>reactify</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('front-page/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('front-page/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('front-page/assets/css/templatemo-space-dynamic.css') }}">
    <link rel="stylesheet" href="{{ asset('front-page/assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('front-page/assets/css/owl.css') }}">
    <!--

    TemplateMo 562 Space Dynamic

    https://templatemo.com/tm-562-space-dynamic

    -->
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <h4>REAC<span>TIFY</span></h4>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">Features</a></li>
                            <li class="scroll-to-section"><a href="#services">Services</a></li>
                            <li class="scroll-to-section"><a href="#portfolio">Top IT fields</a></li>
                            <li class="scroll-to-section"><a href="#blog">Top questions</a></li>
                            <li class="scroll-to-section"><a href="#contact">Message Us</a></li>
                            <li class="scroll-to-section"><div class="main-red-button"><a href="{{ route('login') }}">Get Started</a></div></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                <h6>Welcome to Reactify Space</h6>
                                <h2>Every <em>Developer</em> &lt;/&gt;<span>Has </span>an Issue</h2>
                                <p>REACTIFY is an Online programming plateform that target developers and IT enthusiasts with a common objective which's finding the right answer for their questions and problems.</p>
                                <a href="" style="display: inline-block; margin-top: 15px; background-color: #0d6efd; color: white; padding: 12px 30px; border-radius: 6px;">DISCOVER MORE</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="front-page/assets/images/banner-right-image.png" alt="team meeting">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <img src="front-page/assets/images/about-left-image.png" alt="person graphic">
                    </div>
                </div>
                <div class="col-lg-8 align-self-center">
                    <div class="services">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="icon">
                                        <img src="front-page/assets/images/service-icon-01.png" alt="reporting">
                                    </div>
                                    <div class="right-text">
                                        <h4>Chat a Developer</h4>
                                        <p>Plateform support chat functionnality so you can contact anyone.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                                    <div class="icon">
                                        <img src="front-page/assets/images/service-icon-02.png" alt="">
                                    </div>
                                    <div class="right-text">
                                        <h4>Live stream</h4>
                                        <p>Plateform support livestream.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                                    <div class="icon">
                                        <img src="front-page/front-page/assets/images/service-icon-03.png" alt="">
                                    </div>
                                    <div class="right-text">
                                        <h4>User Interface</h4>
                                        <p>Our plateform have an easy sections navigations to keep your flow on.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                                    <div class="icon">
                                        <img src="front-page/assets/images/service-icon-04.png" alt="">
                                    </div>
                                    <div class="right-text">
                                        <h4>AI Assistance</h4>
                                        <p>Reactify come with an AI assitance that it's ready to help you.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="our-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="left-image">
                        <img src="front-page/assets/images/services-left-image.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="section-heading">
                        <h2>Grow your website with our <em>SEO</em> service &amp; <span>Project</span> Ideas</h2>
                        <p>Space Dynamic HTML5 template is free to use for your website projects. However, you are not permitted to redistribute the template ZIP file on any CSS template collection websites. Please contact us for more information. Thank you for your kind cooperation.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="first-bar progress-skill-bar">
                                <h4>Website Analysis</h4>
                                <span>84%</span>
                                <div class="filled-bar"></div>
                                <div class="full-bar"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="second-bar progress-skill-bar">
                                <h4>SEO Reports</h4>
                                <span>88%</span>
                                <div class="filled-bar"></div>
                                <div class="full-bar"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="third-bar progress-skill-bar">
                                <h4>Page Optimizations</h4>
                                <span>94%</span>
                                <div class="filled-bar"></div>
                                <div class="full-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="portfolio" class="our-portfolio section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h2>Top IT fields that are <em>runked</em> at  <span>reactify</span> plateform</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="hidden-content">
                                <h4>WEB Development</h4>
                                <p>Development of web applications technology.</p>
                            </div>
                            <div class="showed-content">
                                <img src="front-page/assets/images/portfolio-image.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                            <div class="hidden-content">
                                <h4>WEB3</h4>
                                <p>Development of decentralized blockchain technology.</p>
                            </div>
                            <div class="showed-content">
                                <img src="front-page/assets/images/portfolio-image.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="hidden-content">
                                <h4>Mobile Development</h4>
                                <p>Development of mobile applications technology.</p>
                            </div>
                            <div class="showed-content">
                                <img src="front-page/assets/images/portfolio-image.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="hidden-content">
                                <h4>Game Development</h4>
                                <p>Development of video games and engines.</p>
                            </div>
                            <div class="showed-content">
                                <img src="front-page/assets/images/portfolio-image.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="blog" class="our-blog section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
                    <div class="section-heading">
                        <h2>Check Out Top <em>Trending</em> Answers and <span>Questions</span></h2>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
                    <div class="top-dec">
                        <img src="front-page/assets/images/blog-dec.png" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                    <div class="left-image">
                        <a href="#"><img src="front-page/assets/images/big-blog-thumb.jpg" alt="Workspace Desktop"></a>
                        <div class="info">
                            <div class="inner-content">
                                <ul>
                                    <li><i class="fa fa-calendar"></i> 24 Mar 2021</li>
                                    <li><i class="fa fa-users"></i> TemplateMo</li>
                                    <li><i class="fa fa-folder"></i> Branding</li>
                                </ul>
                                <a href="#"><h4>SEO Agency &amp; Digital Marketing</h4></a>
                                <p>Lorem ipsum dolor sit amet, consectetur and sed doer ket eismod tempor incididunt ut labore et dolore magna...</p>
                                <div class="main-blue-button">
                                    <a href="#">Discover More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                    <div class="right-list">
                        <ul>
                            <li>
                                <div class="left-content align-self-center">
                                    <span><i class="fa fa-calendar"></i> 18 Mar 2021</span>
                                    <a href="#"><h4>New Websites &amp; Backlinks</h4></a>
                                    <p>Lorem ipsum dolor sit amsecteturii and sed doer ket eismod...</p>
                                </div>
                                <div class="right-image">
                                    <a href="#"><img src="front-page/assets/images/blog-thumb-01.jpg" alt=""></a>
                                </div>
                            </li>
                            <li>
                                <div class="left-content align-self-center">
                                    <span><i class="fa fa-calendar"></i> 14 Mar 2021</span>
                                    <a href="#"><h4>SEO Analysis &amp; Content Ideas</h4></a>
                                    <p>Lorem ipsum dolor sit amsecteturii and sed doer ket eismod...</p>
                                </div>
                                <div class="right-image">
                                    <a href="#"><img src="front-page/assets/images/blog-thumb-01.jpg" alt=""></a>
                                </div>
                            </li>
                            <li>
                                <div class="left-content align-self-center">
                                    <span><i class="fa fa-calendar"></i> 06 Mar 2021</span>
                                    <a href="#"><h4>SEO Tips &amp; Digital Marketing</h4></a>
                                    <p>Lorem ipsum dolor sit amsecteturii and sed doer ket eismod...</p>
                                </div>
                                <div class="right-image">
                                    <a href="#"><img src="front-page/assets/images/blog-thumb-01.jpg" alt=""></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <div class="section-heading">
                        <h2>CONTACT US</h2>
                        <p>Feel Free To Send Us a Message About Anything that can improve our Website and enhance its features and functionalities.</p>
                        <div class="phone-info">
                            <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="#">010-020-0340</a></span></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="name" name="name" id="name" placeholder="First Name" autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="surname" name="surname" id="surname" placeholder="Second Name" autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button ">Send Message</button>
                                </fieldset>
                            </div>
                        </div>
                        <div class="contact-dec">
                            <img src="front-page/assets/images/contact-decoration.png" alt="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                    <p>© Copyright 2021 Space Dynamic Co. All Rights Reserved.

                        <br>Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('front-page/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front-page/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front-page/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('front-page/assets/js/animation.js') }}"></script>
    <script src="{{ asset('front-page/assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('front-page/assets/js/templatemo-custom.js') }}"></script>

</body>
</html>
