<!DOCTYPE html>
<head>
    <link rel="short icon" href="<?php echo e(asset('images/icon-title.ico')); ?>">
    <title><?php echo $__env->yieldContent('title_page'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel='stylesheet' type='text/css'/>
    <link href="<?php echo e(asset('admin/css/style-responsive.css')); ?>" rel="stylesheet"/>
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/font.css')); ?>" type="text/css"/>
    <link href="<?php echo e(asset('admin/css/font-awesome.css')); ?>" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="<?php echo e(asset('admin/js/jquery2.0.3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/ckeditor/ckeditor.js')); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>
<style>
    span.fa-solid.fa-toggle-off {
        font-size: 33px;
    }

    span.fa-solid.fa-toggle-on {
        font-size: 33px;
    }

    span.fa-solid.fa-thumbs-down {
        font-size: 24px;
    }

    span.fa-solid.fa-thumbs-up {
        font-size: 24px;
    }

    span.text-alert {
        width: 116%;
        color: red;
        text-align: center;
        font-weight: bold;
        font-size: 18px;
        margin-left: 15px;
    }

    .wrapper {
        padding: 0;
    }
</style>
<body>
<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="/admin/dashboard" class="logo">
                Admin Page
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->

        <!-- settings end -->
        <!-- inbox dropdown start-->


        <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
        </div>
        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">

                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img src="upload/<?php echo e($list_photo->avatar); ?>" alt="">
                        <span class="username"> <?php
                                                $name = Session::get('username_admin');
                                                if ($name) {
                                                    echo $name;
                                                }
                                                ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="/admin/logout"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->

            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="active" href="/admin/dashboard">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sub">
                        <a href="/profile_category">
                            <i class="fa fa-th"></i>
                            <span>Profile Category</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:">
                            <i class="fa fa-th"></i>
                            <span>List photo</span>
                        </a>
                        <ul class="sub">
                            <li><a href="/add_photo">Add photo</a></li>
                            <li><a href="/show_photo">Show list photo</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:">
                            <i class="fa fa-th"></i>
                            <span>List Product</span>
                        </a>
                        <ul class="sub">
                            <li><a href="/add_Product">Add Product</a></li>
                            <li><a href="/list_product">Show list Product</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <?php echo $__env->yieldContent('body_content'); ?>
</section>

<script src="<?php echo e(asset('admin/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/jquery.nicescroll.js')); ?>"></script>
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php echo e(asset('admin/js/jquery.scrollTo.js')); ?>"></script>

<!-- morris JavaScript -->
<script>
    $(document).ready(function () {
        //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function () {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function () {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function () {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }

        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth: true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity: 0.85,
        });
</script>
<!-- calendar -->
<script type="text/javascript" src="js/monthly.js"></script>
<script type="text/javascript">
    $(window).load(function () {

        $('#mycalendar').monthly({
            mode: 'event',

        });

        $('#mycalendar2').monthly({
            mode: 'picker',
            target: '#mytarget',
            setWidth: '250px',
            startHidden: true,
            showTrigger: '#mytarget',
            stylePast: true,
            disablePast: true
        });

        switch (window.location.protocol) {
            case 'http:':
            case 'https:':
                // running on a server, should be good.
                break;
            case 'file:':
                alert('Just a heads-up, events will not work when run locally.');
        }

    });
</script>
<!-- //calendar -->
<script type="application/x-javascript">
    addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>
<script type="text/javascript">
    fileImg.onchange = evt => {
        const [file] = fileImg.files;
        if (file) {
            img.src = URL.createObjectURL(file);
        }

    }

</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\project-FANoFAN-2\resources\views/layouts/admin.blade.php ENDPATH**/ ?>