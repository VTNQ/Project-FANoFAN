<?php $__env->startSection('title_page'); ?>

    Home Page

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

    <?php $__currentLoopData = $photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    width: 30vw;
                    display: flex;
                    height: 50vh;
                    object-fit: cover;
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
                <div class="card ">
                    <a href="Product/<?php echo e($row->id_product); ?>">
                        <img src="<?php echo e($row->value); ?>" class="card-img-top" alt="..." >
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">

                            <li class="text-muted text-right">$<?php echo e($row->money); ?></li>
                        </ul>
                        <h1><?php echo e($row->name_product); ?></h1>

                        <a href="Product/<?php echo e($row->id_product); ?>"><p class="text-muted">Product Details</p></a>
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

<?php echo $__env->make('layouts.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phong\project-FANoFAN\resources\views/user/Home.blade.php ENDPATH**/ ?>