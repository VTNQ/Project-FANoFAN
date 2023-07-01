<?php $__env->startSection('title_page'); ?>
    Category
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
                                    Manager category
                                </header>
                                <div class="panel-body">

                                    <?php if(Session::has('success')): ?>
                                    <script>
                                        toastr.success("<?php echo e(session('success')); ?>")
                                    </script>


                                    <?php endif; ?>
                                    <div class="position-center">

                                        <form role="form" action="/save_category" method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name category</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="name_category" placeholder="Enter name category">
                                                <br>
                                                <?php $__errorArgs = ['name_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-danger">Please Enter name Category</div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>



                                            <button type="submit" class="btn btn-info">Add category</button>
                                        </form>
                                    </div>

                                </div>
                            </section>

                        </div>
                        <section class="panel">
                        <div class="col-sm-3" style="float: right;">
        <form action="" >
        <div class="input-group">
          <input type="text" class="input-sm form-control" name="key" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit" >Go!</button>
          </span>
        </div>
        </form>
      </div>
                        <table class="table table-striped b-t b-light">
        <thead>
       <tr>
            <th>#</th>
            <th>Name_catelogy</th>

            <th style="width: 30px;"></th>
          </tr>
        </thead>
        <?php $__currentLoopData = $all_list_login; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


       <tr>
       <td><?php echo e(++$key); ?></td>
        <td><?php echo e($row->name); ?></td>
        <td>
              <a href="<?php echo e(url('/edit/'.$row->id)); ?>" class="active" ui-toggle-class=""><i class="fas fa-edit"> </a></i><a href="<?php echo e(url('/delete/'.$row->id)); ?>" onclick="return confirm('Are you want to delete category?')"> <i class="fa fa-times text-danger text"></i></a>
            </td>
       </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>
                    </div>

                    <?php echo e($all_list_login->links()); ?>


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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\votan\Desktop\x23\resources\views/category/profile_category.blade.php ENDPATH**/ ?>