<?php $__env->startSection('title_page'); ?>

Product Page

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mycss'); ?>
<style>
   .navbar:hover,
    .navbar.scrolled{
        background-color: #36454f;
    }
  @media (min-width: 576px) {
    .col-sm-9 {
      flex: 0 0 auto;
      width: 74%;
    }
  }

  #nav {
    display: inherit;
  }

  .main-panel {
    background-color: #1c2331;
    color: white;
    text-align: initial;
  }

  #card {
    position: relative;
    display: grid;
    margin-top: 4vh;
    flex-direction: column;
    place-items: center;
    /* min-width: 37vh; */
    height: 41vh;
    width: 30vh;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
  }

  div#row {
    display: inline-flex;
  }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_content'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Ecommerce Template</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">

  <style>
    body,
    ul,
    li,
    p,
    a,
    label,
    input,
    div {
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

    #h1 {
      font-size: 12px;
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

    .pagination .page-link:hover,
    .pagination .page-link.active {
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
    /* Services */
    .services-icon-wap {
      transition: .3s;
    }

    .services-icon-wap:hover,
    .services-icon-wap:hover i {
      color: #fff;
    }

    .services-icon-wap:hover {
      background: #69bb7e;
    }

    /* Contact map */
    .leaflet-control a,
    .leaflet-control {
      font-size: 10px !important;
    }

    .form-control {
      border: 1px solid #e8e8e8;
    }

    /* Footer */
    #tempaltemo_footer a {
      color: #FFFFFF;
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

    .col-sm-9 {
      display: flex;
    }

    a {
      color: #FFFFFF;
    }
  </style>
</head>

<body>
  <!-- Start Top Nav -->



  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="left-sidebar">

          <div class="brands_products"><!--brands_products-->
            <h2>Category</h2>
            <div class="brands-name">
              <ul class="nav nav-pills nav-stacked" id="nav">
                <?php $__currentLoopData = $count_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="/categories_list/<?php echo e($count->id); ?>"> <span class="pull-right">(<?php echo e($count->total); ?>)</span><?php echo e($count->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          </div><!--/brands_products-->

          <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <form action="">
              <p>
                <label for="amount">Price range:</label>
                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">

              </p>

              <div id="slider-range"></div>
              <br>
              <input type="submit" name="filter_price" value="filter_price" class="btn btn-success">
              <input type="hidden" name="start_price" id="start_price">
              <input type="hidden" name="end_price" id="end_price">
            </form>
          </div><!--/price-range-->
        </div>
      </div>

      <div class="col-sm-9 padding-right" style="flex-wrap: inherit">
      <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
<div class="col-12 col-md-4 mb-4">
<div class="card " id="card">
<div class="container">

</div>
<a href="/Product/<?php echo e($row->id_product); ?>">
<img src="/upload/<?php echo e($row->value); ?>" class="img-fluid" alt="..."  >
</a>
<div class="card-body">
<ul class="list-unstyled d-flex justify-content-between">
    <li class="text-muted text-right">$<?php echo e($row->money); ?></li>
</ul>
<h1  id="h1"><?php echo e($row->name_product); ?></h1>

<a href="/Product/<?php echo e($row->id_product); ?>"><p class="text-muted">Details Product</p></a>
</div>

</div>

</div>

        </div>

    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
        <!--features_items-->

        <div class="category-tab"><!--category-tab-->
          <div class="col-sm-12">

          </div>

        </div><!--/category-tab-->

        <!--/recommended_items-->

      </div>
    </div>
  </div>

  <!-- End Featured Product -->
  <!-- Start Footer -->

  <!-- End Footer -->

</body>

</html>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phong\Documents\project-FANoFAN\resources\views/user/categories_list.blade.php ENDPATH**/ ?>