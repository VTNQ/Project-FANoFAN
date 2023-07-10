<!DOCTYPE html>
<head>
    <link rel="short icon" href="<?php echo e(asset('images/icon-title.ico')); ?>">
    <title>Admin Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel='stylesheet' type='text/css'/>
    <link href="<?php echo e(asset('css/style-responsive.css')); ?>" rel="stylesheet"/>
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/font.css')); ?>" type="text/css"/>
    <link href="<?php echo e(asset('admin/css/font-awesome.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/morris.css')); ?>" type="text/css"/>
    <!-- calendar -->
    <link rel="stylesheet" href="css/monthly.css">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="<?php echo e(asset('admin/js/jquery2.0.3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/raphael-min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/morris.js')); ?>"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<style>
    .market-update-block.clr-block-2 {
        background-color: wheat;
    }

    .market-update-block.clr-block-2 {
        width: 199%;
    }

    table.table {
        margin-left: -49%;
        margin-top: 34px;
    }
    h3.home1 {
    width: 28vh;

}

    td.home4 {
        padding: 4vh;

    }

    .table {
        max-width: none;
        width: auto;
    }

    .market-update-block.clr-block-2:hover {
        background: bisque;
    }

    .footer {
        margin-top: 20vh;
    }

    p.tittle {
        /* margin-left: 9vh; */
        font-size: 25px;
        text-align: center;
        font-weight: bold;
        margin-top: 1vh;
    }

    td, th {
        padding: 4vh;
        text-align: center;

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

        <div class="top-nav clearfix">
            <!--user info start-->
            <ul class="nav pull-right top-menu">
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img src="/upload/<?php echo e($list_photo->avatar); ?>" alt="">
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
                        <li><a href="/admin/logout"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->

            </ul>
            <!--user info end-->
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
                    <li class="sub-menu">
                        <a href="/feedback">
                            <i class="fa fa-th"></i>
                            <span>Feedback</span>
                        </a>
                     
                    </li>
                    <li class="sub-menu">
                        <a href="/feedback">
                            <i class="fa fa-th"></i>
                            <span>Change Password</span>
                        </a>
                     
                    </li>
                </ul>
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <h1>Welcome to page</h1>
            <!-- //market-->
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <p class="tittle">Quantity statistics</p>
                    <div id="donut" class="morris-donut-inverse"></div>
                </div>
                <div class="container">
                    <br>
                    <h3 style="text-transform: uppercase">the most user feedback</h3>
                    <table >
    <thead>
      <tr>
        <th>#</th>
        <th>NAME</th>
        <th>TOTAL</th>
      </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $count; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
      <td ><?php echo e(++$key); ?></td>
                                <td><?php echo e($row->username); ?></td>
                                <td><?php echo e($row->total); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>


                <br>



            </div>
                <div class="row">


                    <table class="left" style="text-align: center;">
                        <tr>
                            <th class="home"><h3 class="home1" style="text-transform: uppercase; font-size: 3rem">Name product</h3></th>
                        </tr>
                        <tr>

                            <th>#</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Money</th>
                        </tr>

                        <?php $__currentLoopData = $new_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td class="home4"><?php echo e(++$key); ?></td>
                                <td class="home4"><?php echo e($row->name_product); ?></td>
                                <td class="home4"><?php echo e($row->name); ?></td>
                                <td class="home4"><?php echo e($row->money); ?>$</td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>


                </div>

                <!-- //market-->
                <div class="row">
                    <div class="panel-body">
                        <div class="col-md-12 w3ls-graph">
                            <!--agileinfo-grap-->

                            <!--//agileinfo-grap-->

                        </div>
                    </div>
                </div>

                <!-- tasks -->


                <!-- //tasks -->

        </section>
        <!-- footer -->
        <div class="footer" style="bottom: 0; width: 100%; text-align: center">
            <div class="wthree-copyright">
                <p>© 2023. All rights reserved | Design by <a href="/about">Favorable team</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>
    <!--main content end-->
</section>
<script src="<?php echo e(asset('admin/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/jquery.nicescroll.js')); ?>"></script>
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php echo e(asset('admin/js/jquery.scrollTo.js')); ?>"></script>
<!-- Messenger Plugin chat Code -->

<!-- Your SDK code -->

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
            data: [
                {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

            ],
            lineColors: ['#eb6f6f', '#926383', '#eb6f6f'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });


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
<script>
    var colorDanger = "#FF1744";
    Morris.Donut({
        element: 'donut',
        resize: true,
        colors: [
            '#E0F7FA',
            '#B2EBF2',
            '#80DEEA',
            '#4DD0E1',
            '#26C6DA',
            '#00BCD4',
            '#00ACC1',
            '#0097A7',
            '#00838F',
            '#006064'
        ],
        //labelColor:"#cccccc", // text color
        //backgroundColor: '#333333', // border color
        data: [
            {label: "Product", value:<?php echo $product ?>, color: colorDanger},
            {label: "Category", value:<?php echo $category ?>},
            {label: "Photo", value:<?php echo $photo ?>},
            {label: "Feedback", value:<?php echo $feedback ?>},
            {label: "User", value:<?php echo $user ?>}
        ]
    });

</script>
<!-- //calendar -->
</body>
</html>
<?php /**PATH C:\Users\Phong\Downloads\project-FANoFAN\resources\views/admin/admin.blade.php ENDPATH**/ ?>