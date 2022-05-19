<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Sync is a landing page HTML template built with Bootstrap 4 for presenting mobile apps to the online audience and for getting visitors to become users.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Webpage Title -->
    <title>Sync - Mobile App Splash</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="web/css/bootstrap.css" rel="stylesheet">
    <link href="web/css/fontawesome-all.css" rel="stylesheet">
    <link href="web/css/swiper.css" rel="stylesheet">
    <link href="web/css/magnific-popup.css" rel="stylesheet">
    <link href="web/css/styles.css" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">

<!-- Preloader -->
<div class="spinner-wrapper">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- end of preloader -->


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Sync</a> -->
        @isset($splash->icon)
        <a class="navbar-brand logo-image" href="index.html"><img src="storage/{{$splash->icon}}" alt="alternative"></a>
    @else
            <a class="navbar-brand logo-image" href="index.html"><img src="/" alt="alternative"></a>

    @endisset
            <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

    </div> <!-- end of container -->
</nav> <!-- end of navbar -->
<!-- end of navigation -->


<!-- Header -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-container">
                    @isset($splash->desc)
                    <h1>{{$splash->desc}}</h1>
                    @else
                        <h1>Hallo</h1>
                    @endisset
                    <p class="p-large p-heading">Start focusing on your goals and get more things done with Sync mobile application. It's the first app to harness the power of social connections to help you stay focused and get organized</p>
                    <a class="btn-solid-lg" href="https://play.google.com"><i class="fab fa-google-play">&nbsp;&nbsp;</i>تحميل التطبيق</a>
                    <a class="btn-solid-lg" href="{{route('login')}}"><i class="fas fa-door-open">&nbsp;&nbsp;</i>الدخول للتطبيق</a>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="image-container">
                    <img class="img-fluid" src="web/images/header-iphone.png" alt="alternative">
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
    <div class="deco-white-circle-1">
        <img src="web/images/decorative-white-circle.svg" alt="alternative">
    </div> <!-- end of deco-white-circle-1 -->
    <div class="deco-white-circle-2">
        <img src="web/images/decorative-white-circle.svg" alt="alternative">
    </div> <!-- end of deco-white-circle-2 -->
    <div class="deco-blue-circle">
        <img src="web/images/decorative-blue-circle.svg" alt="alternative">
    </div> <!-- end of deco-blue-circle -->
    <div class="deco-yellow-circle">
        <img src="web/images/decorative-yellow-circle.svg" alt="alternative">
    </div> <!-- end of deco-yellow-circle -->
    <div class="deco-green-diamond">
        <img src="web/images/decorative-green-diamond.svg" alt="alternative">
    </div> <!-- end of deco-yellow-circle -->
</header> <!-- end of header -->
<!-- end of header -->


<!-- Small Features -->
<!-- end of small features -->


<!-- Description 1 -->

<!-- Scripts -->
<script src="web/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="web/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
<script src="web/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="web/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="web/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
<script src="web/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
<script src="web/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
<script src="web/js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>
