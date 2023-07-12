<?php $__env->startSection('title_page'); ?>
    Change Password
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body_content'); ?>
    <section>
        <section id="main-content">
            <section class="wrapper">
                <div class="form-w3layouts">
                    <!-- page start-->
                    <!-- page start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Change Password
                                </header>
                                <div class="panel-body">


                                    <div class="position-center">
                                        <?php $__currentLoopData = $recycle_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <table>
                                                <tr>
                                                    <th>Name Product</th>
                                                    <th>Money</th>
                                                    <th>Content</th>
                                                    <th>Category Name</th>
                                                </tr>
                                                <tr>
                                                    <td><?php echo e($rp->name_product); ?></td>
                                                    <td><?php echo e($rp->money); ?></td>
                                                    <td><?php echo e($rp->content); ?></td>
                                                    <td><?php echo e($rp->name); ?></td>
                                                </tr>
                                            </table>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </section>
        <!-- footer -->
            <div class="footer" style="width: 100%; position: absolute;bottom: 0; text-align: center">
                <div class="wthree-copyright">
                    <p>© 2023. All rights reserved | Design by <a href="/about">Favorable Team</a></p>
                </div>
            </div>
        <!-- / footer -->

    <!--main content end-->
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-FANoFAN\resources\views/recycle_bin/recycle_bin_product.blade.php ENDPATH**/ ?>