<?php $__env->startSection('title_page'); ?>

Ceiling Fan

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mycss'); ?>

<style>
    .navbar:hover,
    .navbar.scrolled {
        background-color: #36454f;
    }

    .main-panel {
        background-color: #1c2331;
        color: white;

    }

    .py-4.px-lg-5.px-md-4.px-sm-4.form-section {
        background-color: skyblue;
    }

    body {
        font-family: 'Roboto Condensed', sans-serif;
        background-color: #f5f5f5
    }

    .hedding {
        font-size: 20px;
        color: #ab8181;
    }

    .main-section {
        position: absolute;
        left: 50%;
        right: 50%;
        transform: translate(-50%, 5%);
    }

    .left-side-product-box img {
        width: 100%;
    }

    .left-side-product-box .sub-img img {
        margin-top: 5px;
        width: 83px;
        height: 100px;
    }

    .right-side-pro-detail span {
        font-size: 15px;
    }

    .right-side-pro-detail p {
        font-size: 25px;
        color: #a1a1a1;
    }

    .right-side-pro-detail .price-pro {
        color: #E45641;
    }


    .right-side-pro-detail .tag-section {
        font-size: 18px;
        color: #5D4C46;
    }

    .pro-box-section .pro-box img {
        width: 100%;
        height: 200px;
    }

    @media (min-width: 360px) and (max-width: 640px) {
        .pro-box-section .pro-box img {
            height: auto;
        }
    }

    body {
        background: #eee
    }

    .date {
        font-size: 11px
    }

    .comment-text {
        font-size: 12px
    }

    .fs-12 {
        font-size: 12px
    }

    .shadow-none {
        box-shadow: none
    }

    .name {
        color: #007bff
    }

    .cursor:hover {
        color: blue
    }

    .list-inline {
        padding-left: 0;
        list-style: none;
        display: contents;
    }

    .cursor {
        cursor: pointer
    }

    .textarea {
        resize: none
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_content'); ?>

<!-- product -->

<div class="row m-0">
    <div class="col-lg-4 left-side-product-box pb-3">
        <img id="main-image" src="<?php echo e($photo->value); ?>" class=" p-3">
        <?php $__currentLoopData = $data3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = explode('|',$row->value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="sub-img">
            <img onclick="change_image(this)" src="<?php echo e($value); ?>" class=" p-2">

        </span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="col-lg-8">
        <div class="right-side-pro-detail  p-3 m-0">
            <div class="row">
                <div class="col-lg-12">

                    <p class="m-0 p-0"><?php echo e($photo->name_product); ?></p>
                </div>

                <div class="col-lg-12">
                    <p class="m-0 p-0 price-pro">$<?php echo e($photo->money); ?></p>
                    <hr class="p-0 m-0">
                </div>


                <div class="col-lg-12 pt-2">
                    <h5> Detail Product</h5>
                    <span><?php echo $photo->content; ?></span>
                    <hr class="m-0 pt-2 mt-2">
                </div>


            </div>
        </div>
    </div>
</div>

</div>
<!-- product -->
<!-- feedback -->

<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="d-flex flex-column comment-section">
                <div class="bg-white p-2">


                    <?php $__currentLoopData = $Show_comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex flex-row user-info">
                        <img class="rounded-circle" src="/upload/user.png" width="100">


                        <div class="d-flex flex-column justify-content-start ml-2">
                            <span class="d-block font-weight-bold name"><?php echo e($row->username); ?></span>
                            <span class="date text-black-50"><?php echo e(date('M d,Y h:i A',strtotime($row->date_to))); ?></span>
                        </div>
                    </div>

                    <div class="mt-2">
                        <p class="comment-text"><?php echo e($row->comment); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="bg-light p-2">

                    <?php echo csrf_field(); ?>
                    <div class="d-flex flex-row align-items-start">
                        <img class="rounded-circle" src="/upload/user.png" width="40">

                        <textarea class="form-control ml-1 shadow-none textarea" name="Message"></textarea>
                    </div>
                    <div class="mt-2 text-right">
                        <button class="btn btn-primary btn-sm shadow-none" type="button" data-toggle="modal" data-target="#exampleModal">Post comment</button>
                        <button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Warning login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/login"><button type="button" class="btn btn-primary">Login</button></a>
            </div>
        </div>
    </div>
</div>
<!-- feedback -->
<script>
    function change_image(image) {

        var container = document.getElementById("main-image");

        container.src = image.src;
    }
</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-FANoFAN\resources\views/index/Product.blade.php ENDPATH**/ ?>