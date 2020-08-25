<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>e-EdPort</title>

    <!--====== Favicon Icon ======-->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png"> -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-1.png')}}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.css')}}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css')}}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css')}}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        p {
            line-height: 1.8;
            margin-bottom: 10px;
        }
    </style>

</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== NAVBAR PART START ======-->

    <section class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand m-auto" href="{{route('index')}}">
                                <img src="assets/images/logo-1.png" style="height:70px;" alt="Logo">
                            </a>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->


        <!--====== About Us PART START ======-->
        <section id="about" class="mt-5 portfolio-area">
            <div class="site-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-title text-center pb-20 wow fadeInUp" data-wow-duration="0.8" data-wow-delay="0.1s">
                                <h3 class="title">FAQS</h3>
                            </div> <!-- row -->
                        </div>
                    </div> <!-- row -->

                    <div class="ml-auto order-lg-1 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0s">

                        <ul style="list-style-type: disc;">
                            <li>
                                <b>
                                    How to Login to e-EdPort Virtual Learning Platform?
                                </b>
                                <p class="ml-1">
                                    To Login to e-EdPort Virtual Learning Platform, Put in the website URL in your browser that we will provide you with and then put in the username and password which again will be provided by us. Once you have put in your credentials, you are all set to start classes.
                                </p>
                            </li>
                            <li>
                                <b>
                                    Where do I find the platform URL for e-EdPort Virtual Learning Platform?
                                </b>
                                <p class="ml-1">
                                    The web URL, which will be unique for your particular school, will be provided by us.
                                </p>
                            </li>
                            <li>
                                <b>
                                    How to conduct classes online through e-EdPort Virtual Learning Platform?
                                </b>
                                <p class="ml-1">
                                    On the Teacher’s dashboard, you will see a ‘Join Live’ button. As soon as you click on it, it will start a Google meet meeting and then you just have to click on join now to enter your virtual class. The students will already be notified with the link to the meeting and can join your meeting through it.
                                </p>
                            </li>
                            <li>
                                <b>
                                    How to give online assignments to students through e-EdPort Virtual Learning Platform?
                                </b>
                                <p class="ml-1">
                                    On the teacher’s dashboard, click on the ‘New Assignment’ option and then you can either choose to assign a pre existing assignment (edited or unedited) or you can create a new assignment altogether. After you have given the assignment, you can check it under the ‘View Assignment’ option on the dashboard.
                                </p>
                            </li>
                            <li>
                                <b>
                                    Can we attach a word or PDF file from our computer for online assignments?
                                </b>
                                <p class="ml-1">
                                    Yes, you can attach a PDF file from your computer for an assignment. To attach any file, you have to open the particular assignment then click on the three dots to edit it and then choose the ‘add’ button and finally click on the file option to upload the PDF file.
                                </p>
                            </li>
                            <li>
                                <b>
                                    Can we use Google Drive files for online assignments?
                                </b>
                                <p class="ml-1">
                                    Yes, you can share a Google Drive file for an assignment directly. To attach any file, you have to open the particular assignment then click on the three dots to edit it and then choose the ‘add’ button and finally click on the Google Drive option to link the Google Drive file.
                                </p>
                            </li>
                            <li>
                                <b>
                                    What if a teacher needs some assistance, while using the e-EdPort Virtual Learning Platform?
                                </b>
                                <p class="ml-1">
                                    We have added two ‘Help’ options to help the teachers smoothen their teaching experience using our platform.The white ‘Help’ button, available for each class, when clicked will generate a help ticket directly in the school admin console and is accessible to the school admin who will then assist you with the issue.
                                </p>
                                <p class="ml-1">
                                    Further, we have added another help button in blue available on the top of the teacher’s dashboard where the teacher could specify the issue, which will be further addressed by the school admin.
                                </p>
                            </li>
                            <li>
                                <b>
                                    How to reset login password for e-EdPort Virtual Learning Platform?
                                </b>
                                <p class="ml-1">
                                    In case you forget your password, you have to contact your school admin and they will further take up this issue with the provider.
                                </p>
                            </li>
                            <li>
                                <b>
                                    How could a teacher send online notifications to their students?
                                </b>
                                <p class="ml-1">
                                    On the teacher’s dashboard, we have a ‘Notify Students’ button available, which the teachers would click if they want additional notifications to be sent to their students . A push notification would be sent through the Google classroom app along with an email notification, so that they can join the live class.
                                </p>
                            </li>
                            <li>
                                <b>
                                    Can students be notified before a class?
                                </b>
                                <p class="ml-1">
                                    Yes the students get an auto generated email fifteen to thirty minutes before the class but the teacher can send an email by themselves too by clicking on the ‘Notify Students’ option on their dashboard.
                                </p>
                            </li>
                            <li>
                                <b>
                                    How could I record a live class through e-EdPort Virtual Learning Platform?
                                </b>
                                <p class="ml-1">
                                    Once you launch the Google meet, you can click on the triple dot option on the lower right side where you will find an option to record your session.
                                </p>
                            </li>

                        </ul>
                    </div>



                </div>
            </div>


        </section>
        <!--====== ABOUT PART ENDS ======-->






        <!--====== FOOTER FOUR PART START ======-->

        <footer id="footer" class="contact-area footer-area">
            <div class="footer-copyright">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="copyright text-center text-lg-left mt-10">
                                <p class="text">© Copyright 2020, All Rights Reserved |<a style="color: #253372" rel="nofollow" href="index.html"> Montbit Technologies.</a></p>
                            </div> <!--  copyright -->
                        </div>
                        <div class="col-lg-2">
                            <div class="footer-logo text-center mt-10">
                                <a href="index.html"><img style="height: 100px !important;" src="assets/images/logo-1.png" alt="Logo"></a>
                            </div> <!-- footer logo -->
                        </div>
                        <div class="col-lg-5">
                            <ul class="social text-center text-lg-right mt-10">
                                <li><a target="_blank" href="https://www.facebook.com/eEdPort/?ref=aymt_homepage_panel&eid=ARCBqzK2__TNHwk7BNW0sZ_oWFM0IvHmdY-FDdEfmU53ssgLiCXbgwFPlB9YkVl9yHDyQSyJrafLcVi-"><i class="lni-facebook-filled"></i></a></li>
                                <li><a target="_blank" href="https://www.youtube.com/channel/UCy76UlnIMTWXk_aN4ZnmDdA"><i class="lni-youtube"></i></a></li>
                                <li><a target="_blank" href="https://www.instagram.com/e_edport/?hl=en"><i class="lni-instagram-original"></i></a></li>
                            </ul> <!-- social -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- footer copyright -->
        </footer>
        <!--====== FOOTER FOUR PART ENDS ======-->

        <!--====== BACK TOP TOP PART START ======-->

        <!--a href="#" class="back-to-top"><i class="lni-chevron-up" style="color:white"></i></!--a-->

        <!--====== BACK TOP TOP PART ENDS ======-->

        <!--====== PART START ======-->



        <!--====== PART ENDS ======-->










        <!--====== jquery js ======-->
        <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

        <!--====== Bootstrap js ======-->
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('assets/js/popper.min.js')}}"></script>

        <!--====== Slick js ======-->
        <script src="{{ asset('assets/js/slick.min.js')}}"></script>

        <!--====== Isotope js ======-->
        <script src="{{ asset('assets/js/isotope.pkgd.min.js')}}"></script>

        <!--====== Images Loaded js ======-->
        <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>

        <!--====== Magnific Popup js ======-->
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script>

        <!--====== Scrolling js ======-->
        <script src="{{ asset('assets/js/scrolling-nav.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.easing.min.js')}}"></script>

        <!--====== Ajax Contact js ======-->
        <script src="{{ asset('assets/js/ajax-contact.js')}}"></script>

        <!--====== wow js ======-->
        <script src="{{ asset('assets/js/wow.min.js')}}"></script>

        <!--====== Main js ======-->
        <script src="assets/js/main.js"></script>

</body>
<script>
    function showhide() {
        $('.portfolio-card').addClass('hidden');
        var a = document.getElementById("virtual");
        a.classList.toggle('hidden');
    }


    function showinstitutional() {

        $('.portfolio-card').addClass('hidden');
        var b = document.getElementById("institutional");
        b.classList.toggle('hidden');
    }

    function showsmart() {

        $('.portfolio-card').addClass('hidden');
        var c = document.getElementById("smart");
        c.classList.toggle('hidden');
    }

    function showstudent() {

        $('.portfolio-card').addClass('hidden');
        var d = document.getElementById("student");
        d.classList.toggle('hidden');
    }

    function showinternational() {

        $('.portfolio-card').addClass('hidden');
        var e = document.getElementById("International");
        e.classList.toggle('hidden');
    }
</script>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v8.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat" attribution=setup_tool page_id="111542750588557" logged_in_greeting="Hi! We can provide you a product demo. Interested?" logged_out_greeting="Hi! We can provide you a product demo. Interested?">
</div>

</html>