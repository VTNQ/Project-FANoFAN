<?php $__env->startSection('title_page'); ?>
    Edit Category
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body_content'); ?>

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
                                <Edit></Edit> List category
                            </header>
                            <div class="panel-body">

                                <div class="position-center">
                                    <form method="post" role="form" action="/update/<?php echo e($category[0]->id); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name category</label>
                                            <input type="text" class="form-control" value="<?php echo e($category[0]->name); ?>"
                                                   id="exampleInputEmail1" name="name_category"
                                                   placeholder="Enter name category">
                                                   <?php $__errorArgs = ['name_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                   <div class="alert alert-danger"><?php echo e($message); ?></div>
                                                   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>


                                        <button type="submit" class="btn btn-info">Edit Category</button>
                                    </form>
                                </div>

                            </div>
                        </section>

                    </div>
                    <section class="panel">

                    </section>
                </div>
                <!-- page end-->
            </div>

            <!-- footer -->
            <div class="footer"
                 style="bottom: 0;position: absolute; width: 100%; text-align: center;">
                <div class="wthree-copyright">
                    <p>© 2023. All rights reserved | Design by <a href="/about">Favorable team</a></p>
                </div>
            </div>
            <!-- / footer -->
        </section>

        <!--main content end-->
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-FANoFAN\resources\views/category/edit.blade.php ENDPATH**/ ?>