<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Form_component :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?php echo e(asset('admin/css/style.css')); ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo e(asset('admin/css/style-responsive.css')); ?>" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?php echo e(asset('admin/css/font.css')); ?>" type="text/css"/>
<link href="<?php echo e(asset('css/font-awesome.css')); ?>" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="<?php echo e(asset('admin/js/jquery2.0.3.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <style>
.preview{
            display: block;
            width: 150px;
            height: 150px;
            border: 1px solid black;
            margin-top: 10px;
        }
span.text-alert {
    width: 116%;
    color: red;
    text-align: center;
    font-weight: bold;
    font-size: 15px;
    margin-left: -20px;
}
    </style>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="/admin/dashboard" class="logo">
        VISITORS
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->


<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username">
                    <?php
                    $name=Session::get('username');
                    if($name){
                        echo $name;
                    }
                    ?>
                </span>
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
               
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>List category</span>
                    </a>
                    <ul class="sub">
                        <li><a href="/add_category">Add category</a></li>
                        <li><a href="/list_all_category">Show list category</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>List photo</span>
                    </a>
                    <ul class="sub">
                        <li><a href="/add_photo">Add photo</a></li>
                        <li><a href="/show_photo">Show list photo</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>List Product</span>
                    </a>
                    <ul class="sub">
                        <li><a href="/add_Product">Add Product</a></li>
                        <li><a href="/list_product">Show list Product</a></li>
                    </ul>
                </li>
 
              
               
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add List Photo
                        </header>
                        <div class="panel-body">
                        
                        <?php if(Session::has('success')): ?>
                                    <script>
                                        toastr.success("<?php echo e(session('success')); ?>")
                                    </script>

                                    <?php endif; ?>
                            <div class="position-center">
                                <?php if(count($errors)>0): ?>
                                <div class="alert alert-danger"><?php echo e($errors->first()); ?></div>
                                <?php endif; ?>
                                <form role="form" action="/save_photo" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name photo</label>
                                    <input type="file" class="form-control" id="fileImg" accept="image/*" name="fileImg"  placeholder="Enter name category">
                                    <div class="preview">
        <img src="https://cdn.vectorstock.com/i/preview-1x/65/30/default-image-icon-missing-picture-page-vector-40546530.jpg" alt="Preview" id="img" style="width: 100%; height: 100%;">
    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select name="status" class="form_control input-sm m-bot15" id="">
                                 <option value="1">Main</option>
                                 <option value="0">Extra</option>
                                    </select>
                                   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product</label>
                                    <select name="product" class="form_control input-sm m-bot15" id="">
                                        <?php $__currentLoopData = $list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($row->id); ?>"><?php echo e($row->name_product); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                   
                                </div>
                               
                                
                               
                                <button type="submit" class="btn btn-info">Add category</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
           
      
        

       
                           
                            
               

        <section class="panel">
           
      
       
                    


                </form>
            </div>
      

     
        

        

        <!-- page end-->
        </div>
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script type="text/javascript">
        fileImg.onchange=evt=>{
            const[file]=fileImg.files;
            if(file){
                img.src=URL.createObjectURL(file);
            }
            
        }
    </script>
  
<script src="<?php echo e(asset('admin/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/jquery.nicescroll.js')); ?>"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php echo e(asset('admin/js/jquery.scrollTo.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\Phong\Documents\x\resources\views/photo/add_picture.blade.php ENDPATH**/ ?>