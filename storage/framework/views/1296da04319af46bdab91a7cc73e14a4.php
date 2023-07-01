    <?php $__env->startSection('title_page'); ?>
    Edit Product
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
                                Add List category
                            </header>

                            <div class="panel-body">


                                <div class="position-center">
                                    <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <form role="form" action="<?php echo e(URL::to('/update_product/'.$row->id_product)); ?>" method="post"  >
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name Product</label>
                                                <input type="text" class="form-control" value="<?php echo e($row->name_product); ?>"  id="exampleInputEmail1" name="nameProduct" placeholder="Enter name Product">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Price</label>
                                                <input type="number" class="form-control" id="exampleInputEmail1" value="<?php echo e($row->money); ?>" name="Price" placeholder="Enter name Product">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Description</label>
                                                <textarea name="description"  id="" class="form-control" style="resize: none;"  rows="8" ><?php echo e($row->content); ?></textarea>

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">category</label>

                                                <select name="category" class="form_control input-sm m-bot15" id="">
                                                    <?php $__currentLoopData = $list_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($category->id==$row->id_category): ?>
                                                            <option selected value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>


                                            </div>



                                            </label>
                                </div>







                                <button type="submit" class="btn btn-info">Add catelogies</button>
                                </form>
                            </div>

                    </div>
        </section>

        </div>
        <section class="panel">
            </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\votan\Desktop\x23\resources\views/Product/edit_product.blade.php ENDPATH**/ ?>