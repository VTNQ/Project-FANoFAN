<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <link rel="short icon" href="<?php echo e(asset('images/icon-title.ico')); ?>">
    <title><?php echo $__env->yieldContent('title_page'); ?></title>
    <meta http-equiv="refresh" content="number">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?php echo e(asset('/css/bootstrap.min.css ')); ?>">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo e(asset('/css/style.css ')); ?>">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?php echo e(asset('/css/responsive.css ')); ?>">
    <!-- fevicon -->
    <link rel="icon" href="<?php echo e(asset('/images/fevicon.png ')); ?>" type="image/gif"/>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('/css/jquery.mCustomScrollbar.min.css ')); ?>">
    <!-- Tweaks for older IEs-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
          media="screen">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <?php echo $__env->yieldContent('mycss'); ?>

</head>
<style>
    .navbar.scrolling-navbar {
        padding-top: 12px;
        padding-bottom: 12px;
        -webkit-transition: background 0.5s ease-in-out, padding 0.5s ease-in-out;
        transition: background 0.5s ease-in-out, padding 0.5s ease-in-out;
    }

    a {
        color: #fff;
    }

    body {
        height: 100%;
    }
    li div#list_category{
        display: none;
    }
    li:hover div#list_category{
        display: block;
        position: absolute;
    }
    #card{
        width: 18vw;
        height: 60vh;
    }
</style>
<!-- body -->

<body class="main-layout">
<!-- loader  -->
<nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar fixed-top" id="navbar" style="padding-right: 3%">
    <!-- Navbar brand -->
    <a class="navbar-brand p-0" href="/">
        <!--FANo<span>FAN</span>-->
        <img
            src="https://d33wubrfki0l68.cloudfront.net/6e39a404f566cec2f989e430771b9895c40253d3/660b4/static/img/logo__icons_svg/logo.png"
            class="img-fluid" alt="">
    </a>
    <!-- Collapse button -->
    <button class="navbar-toggler  text-dark" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!--search-->
    <div class="col-md-3">
        <div class="search">
            <form action="http://127.0.0.1:8000/search">
                <input class="form_sea" type="text" placeholder="Search" name="search">
                <button type="submit" class="seach_icon"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse mt-lg-0 mt-md-3 mt-sm-4" id="basicExampleNav">
        <!-- Links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active px-lg-2 py-lg-0 py-md-1 py-sm-1 text-center  mx-auto">
                <a class="nav-link home-link  waves-effect waves-light" href="/">Home </a>
            </li>
            <li class="nav-item active px-lg-2 py-lg-0 py-md-1 py-sm-1 text-center  mx-auto">
                <a class="nav-link about-link waves-effect waves-light" href="/about">About</a>
            </li>
            <li class="nav-item active  dropdown px-lg-2 py-lg-0 py-md-1 py-sm-1 text-center  mx-auto">
                <a class="nav-link categories-link waves-effect waves-light" href="/all_product"
                   id="category" aria-haspopup="true"
                   aria-expanded="false">Categories</a>
                <div style="background-color: #6c757d;" id="list_category">
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="dropdown-item ceiling-fans-link waves-effect waves-light"
                           href="/categories_list/<?php echo e($row->id); ?>"><?php echo e($row->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </li>
            <li class="nav-item active  px-lg-2 py-lg-0 py-md-1 py-sm-1 text-center  mx-auto">
                <a class="nav-link contact-link waves-effect waves-light" href="/contact">Contact Us</a>
            </li>
            <li class="nav-item active  dropdown px-lg-2 py-lg-0 py-md-1 py-sm-1 text-center  mx-auto">
                <a class="nav-link dropdown-toggle categories-link waves-effect waves-light" href="#"
                   id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false"><img src="/upload/<?php echo e($avatar->avatar); ?>" alt="" width="30"
                                              style="border-radius: 50%"></a>
                <div class="dropdown-menu dropdown-primary  mt-lg-3" style="background-color: #6c757d;margin:-63%"
                     aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item  waves-effect waves-light" href="/user/my_account">My Account</a>
                    <a class="dropdown-item  waves-effect waves-light" href="/user/history_feedback">History
                        Feedback</a>
                    <a class="dropdown-item waves-effect waves-light" href="/logout">Logout</a>
                </div>
            </li>
        </ul>
        <!-- Links -->
    </div>
    <!-- Collapsible content -->
</nav>

<header class="img-fluid" style="padding: 11% 0px;">
</header>

<div class="main-panel">
    <section>
        <?php echo $__env->yieldContent('body_content'); ?>
    </section>
</div>

<!--  footer -->
<footer class="page-footer font-small unique-color-dark ">

    <div style="background-color: #6c757d;color: white !important;">
        <div class="container">

            <!-- Grid row-->
            <div class="row py-4 d-flex align-items-center">

                <!-- Grid column -->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                    <h6 class="mb-0 get-connected">Get connected with us on social networks!</h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6 col-lg-7 text-center text-md-right">

                    <!-- Facebook -->
                    <a class="social-icons fb-ic" style="visibility: visible;" href="https://www.facebook.com/">
                        <i class="fab fa-facebook-f white-text mr-4 " style="font-size: 20px !important;"
                           aria-hidden="true"> </i>
                    </a>
                    <!-- Twitter -->
                    <a class="social-icons tw-ic" style="visibility: visible;" href="https://twitter.com/">
                        <i class="fab fa-twitter white-text mr-4 " style="font-size: 20px !important;"
                           aria-hidden="true"> </i>
                    </a>
                    <!-- Google +-->
                    <a class="social-icons gplus-ic" style="visibility: visible;" href="https://google.com/">
                        <i class="fab fa-google-plus-g white-text mr-4 " style="font-size: 20px !important;"
                           aria-hidden="true"> </i>
                    </a>
                    <!--Linkedin -->
                    <a class="social-icons li-ic" style="visibility: visible;" href="https://www.linkedin.com/">
                        <i class="fab fa-linkedin-in white-text mr-4 " style="font-size: 20px !important;"
                           aria-hidden="true"> </i>
                    </a>
                    <!--Instagram-->
                    <a class="social-icons ins-ic" style="visibility: visible;"
                       href="https://www.instagram.com/">
                        <i class="fab fa-instagram white-text " style="font-size: 20px !important;"
                           aria-hidden="true"> </i>
                    </a>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->

        </div>
    </div>

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

        <!-- Grid row -->
        <div class="row mt-3">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                <!-- Content -->
                <h4 class="text-capitalize text-lg-start text-md-start text-sm-center ">FANoFAN</h4>
                <hr class=" mb-4 mt-0 footer-ruler"
                    style="width: 60px;background-color: #F8F9FA !important;height: 2px;opacity: 1 ;">
                <p class="text-start text-light footer-content">
                    Whether you have an industrial complex or a small shop, our experts are here to make your life
                    easier, more comfortable,
                    and less expensive.
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 footer-products">

                <!-- Links -->
                <h6 class="text-uppercase ">Products</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px;background-color: #F8F9FA !important;height: 2px;opacity: 1 ;">
                <p>
                    <a href="/categories_ceiling">Ceiling Fans</a>
                </p>
                <p>
                    <a href="/categories_table">Table Fans</a>
                </p>
                <p>
                    <a href="/categories_standing">Standing Fans</a>
                </p>
                <p>
                    <a href="/categories_standing">Exhaust Fans</a>
                </p>


            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 footer-company">

                <!-- Links -->
                <h6 class="text-uppercase ">Company</h6>
                <hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px;background-color: #F8F9FA !important;height: 2px;opacity: 1 ; color: #fff  !important;">
                <p class="py-1 m-0">
                    <a href="/about">About Us</a>
                </p>

                <p class="py-1 m-0">
                    <a href="/gallery">Gallery</a>
                </p>
                <p class="py-1 m-0">
                    <a href="/contact">Contact Us</a>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 footer-contact">

                <!-- Links -->
                <h6 class="text-uppercase ">Contact</h6>
                <hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px;background-color: #F8F9FA !important;height: 2px;opacity: 1 ;">
                <p style="color: white !important; ">
                    <i class="fas fa-home mr-3" aria-hidden="true"></i> 250 Rt 59, Airmont NY 10901
                </p>
                <p style="color: white !important; ">
                    <i class="fas fa-envelope mr-3" aria-hidden="true"></i> info@fanofan.com
                </p>
                <p style="color: white !important; ">
                    <i class="fas fa-phone mr-3" aria-hidden="true"></i> + 01 234 567 88
                </p>
                <p style="color: white !important; ">
                    <i class="fas fa-print mr-3" aria-hidden="true"></i> + 01 234 567 89
                </p>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© <span id="currentyear">2023</span> Copyright:
        <a href="/"> FANoFAN</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="<?php echo e(asset('/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('/js/popper.min.js ')); ?>"></script>
<script src="<?php echo e(asset('/js/bootstrap.bundle.min.js ')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery-3.0.0.min.js ')); ?>"></script>
<!-- sidebar -->
<script src="<?php echo e(asset('/js/jquery.mCustomScrollbar.concat.min.js ')); ?>"></script>
<script src="<?php echo e(asset('/js/custom.js ')); ?>"></script>
<?php echo $__env->yieldContent('myscript'); ?>
<script src="https://kit.fontawesome.com/1fa6a2ee32.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
<script>
    window.addEventListener('scroll', () => {
        const verticalScrollPx = window.scrollY || window.pageYOffset;

        if (verticalScrollPx < 10) {
            document.getElementById('scroll_top').style.display = 'none';
        } else if (verticalScrollPx < 500) {
            document.getElementById('scroll_top').style.display = 'block';
        }
    });
    $(window).scroll(function() {
        if ($(window).scrollTop() > 50) {
            $('.navbar').addClass('scrolled');
        } else {
            $('.navbar').removeClass('scrolled');
        }
    });
    function scroll_to_top(){
        window.scroll(0,0);
    }
</script>
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "100635189759938");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v17.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script>
    function scroll_to_top() {
        window.scroll(0, 0);
    }
    function show_category(){
        document.getElementById('list_category').display='block';
    }
</script>
<script>
    $( function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 2000,
            values: [ 75, 300 ],
            step:10,
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                $('#start_price').val(ui.values[0]);
                $('#end_price').val(ui.values[1]);
            }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    } );
</script>
</body>

</html>
<?php /**PATH C:\Users\Phong\Documents\project-FANoFAN\resources\views/layouts/template4.blade.php ENDPATH**/ ?>