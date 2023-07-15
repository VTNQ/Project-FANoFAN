<?php $__env->startSection('title_page'); ?>
    Edit Product
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body_content'); ?>
    <!--main content start-->
    <style>
        .btn-info {
            color: #fff;
            background-color: #5bc0de;
            border-color: #46b8da;
            margin-left: 31vh;
        }
    </style>
    <section id="main-content">
        <section class="wrapper">
            <div class="form-w3layouts">
                <!-- page start-->
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Edit Product
                            </header>

                            <div class="panel-body">


                                <div class="position-center">

                                    <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <form role="form" action="<?php echo e(URL::to('/update_product/'.$row->id_product)); ?>"
                                              method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name Product</label>
                                                <input type="text" class="form-control" value="<?php echo e($row->name_product); ?>"
                                                       id="exampleInputEmail1" name="nameProduct"
                                                       placeholder="Enter name Product">
                                                       <?php $__errorArgs = ['nameProduct'];
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
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Price</label>
                                                <input type="number" class="form-control" id="exampleInputEmail1"
                                                       value="<?php echo e($row->money); ?>" name="Price"
                                                       placeholder="Enter name Product">
                                                       <?php $__errorArgs = ['Price'];
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
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Description</label>
                                                <textarea name="description" id="ckeditor" class="ckeditor"
                                                      style="resize: none;" rows="8"
                                                      placeholder="Enter Product Description"><?php echo e($row->content); ?>

                                                </textarea>
                                                <?php $__errorArgs = ['description'];
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

                                            <div class="form-group">
                                                <label for="category">category</label>
                                                <select name="category" class="form_control input-sm m-bot15" id="">
                                                    <?php $__currentLoopData = $list_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($category->id==$row->id_category): ?>
                                                            <option selected
                                                                    value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                        <?php else: ?>
                                                            <option
                                                                value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>


                                <button type="submit" class="btn btn-info">Edit Product</button>
    </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <section class="panel">
            <div></div>
        </section>
        <!-- footer -->
        <div class="footer" style="width: 100%; position: absolute; text-align: center">
            <div class="wthree-copyright">
                <p>© 2023. All rights reserved | Design by <a href="/about">Favorable Team</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    <!--main content end-->
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-FANoFAN\resources\views/Product/edit_product.blade.php ENDPATH**/ ?>