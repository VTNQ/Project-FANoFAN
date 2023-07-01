<?php $__env->startSection('title_page'); ?>

    Category List

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mycss'); ?>
    <style>
        .main-panel {
            background-color: #1c2331;
            color: white;
            text-align: initial;
        }

        div#row {
            display: inline-flex;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_content'); ?>

    <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Ecommerce Template</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
            <link rel="stylesheet"
                  href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
            <style>
                body, ul, li, p, a, label, input, div {
                    font-family: 'Roboto', sans-serif;
                    font-size: 18px !important;
                    font-weight: 300 !important;
                }

                .h1 {
                    font-family: 'Roboto', sans-serif;
                    font-size: 48px !important;
                    font-weight: 200 !important;
                }

                .h2 {
                    font-family: 'Roboto', sans-serif;
                    font-size: 30px !important;
                    font-weight: 300;
                }

                .h3 {
                    font-family: 'Roboto', sans-serif;
                    font-size: 22px !important;
                }

                /* General */
                .logo {
                    font-weight: 500 !important;
                }

                .text-warning {
                    color: #ede861 !important;
                }

                .text-muted {
                    color: #bcbcbc !important;
                }

                .text-success {
                    color: #59ab6e !important;
                }

                .text-light {
                    color: #cfd6e1 !important;
                }

                .bg-dark {
                    background-color: #212934 !important;
                }

                .bg-light {
                    background-color: #e9eef5 !important;
                }

                .bg-black {
                    background-color: #1d242d !important;
                }

                .bg-success {
                    background-color: #59ab6e !important;
                }

                .btn-success {
                    background-color: #59ab6e !important;
                    border-color: #56ae6c !important;
                }

                .pagination .page-link:hover {
                    color: #000;
                }

                .pagination .page-link:hover, .pagination .page-link.active {
                    background-color: #69bb7e;
                    color: #fff;
                }

                /* Nav */
                #templatemo_nav_top {
                    min-height: 40px;
                }

                #templatemo_nav_top * {
                    font-size: 12px !important;
                }

                #templatemo_main_nav a {
                    color: #212934;
                }

                #templatemo_main_nav a:hover {
                    color: #69bb7e;
                }

                #templatemo_main_nav .navbar .nav-icon {
                    margin-right: 20px;
                }

                /* Hero Carousel */
                #template-mo-jassa-hero-carousel {
                    background: #efefef !important;
                }

                /* Accordion */
                .templatemo-accordion a {
                    color: #000;
                }

                .templatemo-accordion a:hover {
                    color: #333d4a;
                }

                /* Shop */
                .shop-top-menu a:hover {
                    color: #69bb7e !important;
                }

                /* Product */
                .product-wap {
                    box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.10);
                }

                .product-wap .product-color-dot.color-dot-red {
                    background: #f71515;
                }

                .product-wap .product-color-dot.color-dot-blue {
                    background: #6db4fe;
                }

                .product-wap .product-color-dot.color-dot-black {
                    background: #000000;
                }

                .product-wap .product-color-dot.color-dot-light {
                    background: #e0e0e0;
                }

                .product-wap .product-color-dot.color-dot-green {
                    background: #0bff7e;
                }

                .card.product-wap .card .product-overlay {
                    background: rgba(0, 0, 0, .2);
                    visibility: hidden;
                    opacity: 0;
                    transition: .3s;
                }

                .card.product-wap:hover .card .product-overlay {
                    visibility: visible;
                    opacity: 1;
                }

                .card.product-wap a {
                    color: #000;
                }

                #carousel-related-product .slick-slide:focus {
                    outline: none !important;
                }

                #carousel-related-product .slick-dots li button:before {
                    font-size: 15px;
                    margin-top: 20px;
                }

                /* Brand */
                .brand-img {
                    filter: grayscale(100%);
                    opacity: 0.5;
                    transition: .5s;
                }

                .brand-img:hover {
                    filter: grayscale(0%);
                    opacity: 1;
                }

                /* Carousel Hero */
                #template-mo-jassa-hero-carousel .carousel-indicators li {
                    margin-top: -50px;
                    background-color: #59ab6e;
                }

                #template-mo-jassa-hero-carousel .carousel-control-next i,
                #template-mo-jassa-hero-carousel .carousel-control-prev i {
                    color: #59ab6e !important;
                    font-size: 2.8em !important;
                }

                /* Carousel Brand */
                .tempaltemo-carousel .h1 {
                    font-size: .5em !important;
                    color: #000 !important;
                }

                /* Services */
                .services-icon-wap {
                    transition: .3s;
                }

                .services-icon-wap:hover, .services-icon-wap:hover i {
                    color: #fff;
                }

                .services-icon-wap:hover {
                    background: #69bb7e;
                }

                /* Contact map */
                .leaflet-control a, .leaflet-control {
                    font-size: 10px !important;
                }

                .form-control {
                    border: 1px solid #e8e8e8;
                }

                /* Footer */
                #tempaltemo_footer a {
                    color: #dcdde1;
                }

                #tempaltemo_footer a:hover {
                    color: #68bb7d;
                }

                #tempaltemo_footer ul.footer-link-list li {
                    padding-top: 10px;
                }

                #tempaltemo_footer ul.footer-icons li {
                    width: 2.6em;
                    height: 2.6em;
                    line-height: 2.6em;
                }

                #tempaltemo_footer ul.footer-icons li:hover {
                    background-color: #cfd6e1;
                    transition: .5s;
                }

                #tempaltemo_footer ul.footer-icons li:hover i {
                    color: #212934;
                    transition: .5s;
                }

                #tempaltemo_footer .border-light {
                    border-color: #2d343f !important;
                }

                /*
                // Extra small devices (portrait phones, less than 576px)
                // No media query since this is the default in Bootstrap
                */
                /* Small devices (landscape phones, 576px and up)*/
                .product-wap .h3, .product-wap li, .product-wap i, .product-wap p {
                    font-size: 12px !important;
                }

                .product-wap .product-color-dot {
                    width: 6px;
                    height: 6px;
                }

                @media (min-width: 576px) {
                    .tempaltemo-carousel .h1 {
                        font-size: 1em !important;
                    }
                }

                /*// Medium devices (tablets, 768px and up)*/
                @media (min-width: 768px) {
                    #templatemo_main_nav .navbar-nav {
                        max-width: 450px;
                    }
                }

                /* Large devices (desktops, 992px and up)*/
                @media (min-width: 992px) {
                    #templatemo_main_nav .navbar-nav {
                        max-width: 550px;
                    }

                    #template-mo-jassa-hero-carousel .carousel-item {
                        min-height: 30rem !important;
                    }

                    .product-wap .h3, .product-wap li, .product-wap i, .product-wap p {
                        font-size: 18px !important;
                    }

                    .product-wap .product-color-dot {
                        width: 12px;
                        height: 12px;
                    }
                }

                img.card-img-top {
                    width: 373px;
                    display: flex;
                    /* text-align: center; */
                    margin-left: 11px;
                }

                h1 {
                    font-size: 12px;
                }

                .row {
                    display: inline;
                }

                .col-12.col-md-4.mb-4 {
                    display: inline-block;
                    margin-top: 21px;
                    margin-right: 11px;
                }

                a {
                    color: #fff;
                }

                /* Extra large devices (large desktops, 1200px and up)*/
                @media (min-width: 1200px) {
                }
            </style>
        </head>
        <body>
        <!-- Start Top Nav -->

        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="#">
                        <img src="/public/upload/<?php echo e($product->value); ?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                            <li class="text-muted text-right">$<?php echo e($product->money); ?></li>
                        </ul>
                        <h1><?php echo e($product->name_product); ?></h1>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia
                            deserunt.
                        </p>
                        <a href="/CeilingFan/<?php echo e($product->id_product); ?>"><p class="text-muted">Details Product</p></a>
                    </div>

                </div>

            </div>


        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- End Featured Product -->
        <!-- Start Footer -->

        <!-- End Footer -->
        </body>
        </html>

        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('myscript'); ?>

        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phong\Documents\Zalo Received Files\x26\resources\views/index/categories_list.blade.php ENDPATH**/ ?>