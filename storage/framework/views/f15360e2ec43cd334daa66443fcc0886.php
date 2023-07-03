<?php $__env->startSection('title_page'); ?>
    Detail Product
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('body_content'); ?><!DOCTYPE html>
    <!--main content start-->
    <style>
        button.btn.btn-outline-primary {
            float: left;
            margin-top: 10px;
            color: white;

            background-color: dodgerblue;
            /* color: whitesmoke; */
            margin-left: -14px;
        }
    </style>

    <section id="main-content">
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <a href="/list_product">
                            <button type="button" class="btn btn-outline-primary">Back</button>
                        </a>
                        Detail Product
                    </div>

                    <?php

                    ?>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm=12 col-md-12">
                                <div class="form-group">
                                    <strong>Name Product:</strong>
                                    <?php echo e($data->name_product); ?>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-sm=12 col-md-12">
                                <div class="form-group">
                                    <strong>Money:</strong>
                                    <?php echo e($data->money); ?>$
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-sm=12 col-md-12">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img src="/public/upload/<?php echo e($row->value); ?>" alt="" width="200px">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm=12 col-md-12">
                                <div class="form-group">
                                    <strong>category Product:</strong>
                                    <?php echo e($data->name); ?>

                                </div>
                            </div>

                        </div>

                    </div>
                    <footer class="panel-footer">

                    </footer>
                </div>
            </div>
        </section>
        <!-- footer -->
        <div class="footer" style="width: 100%; position: absolute; bottom: 0; text-align: center">
            <div class="wthree-copyright">
                <p>© 2023. All rights reserved | Design by <a href="/about">Favorable Team</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>

    <!--main content end-->
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-FANoFAN-2\resources\views/Product/detail_product.blade.php ENDPATH**/ ?>