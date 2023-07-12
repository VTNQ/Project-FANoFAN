<?php $__env->startSection('title_page'); ?>
    Change Password
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
                            Change Password
                            </header>
                            <div class="panel-body">

                              
                                <div class="position-center">
                                <?php if(session()->has('message')): ?>
            <div class="alert alert-success text-center" role="alert"><?php echo e(session('message')); ?></div>
        <?php elseif(session()->has('old')): ?>
            <div class="alert alert-danger" role="alert"><?php echo e(session('old')); ?></div>
        <?php elseif(session()->has('accept')): ?>
            <div class="alert alert-danger" role="alert"><?php echo e(session('accept')); ?></div>

        <?php elseif(session()->has('same')): ?>
            <div class="alert alert-danger" role="alert"><?php echo e(session('same')); ?></div>

        <?php endif; ?>
                                    <form role="form" action="/change_pass" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Old Password</label>
                                            <input type="password" class="form-control" id="fileImg" 
                                                   name="old_password" placeholder="Enter name category" value="<?php echo e(old('old_password')); ?>">
                                        <?php $__errorArgs = ['old_password'];
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
                                            <label for="exampleInputEmail1">New Password</label>
                                            <input type="password" class="form-control" id="fileImg" 
                                                   name="New_password" placeholder="Enter name category" value="<?php echo e(old('New_password')); ?>">
                                         <?php $__errorArgs = ['New_password'];
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
                                            <label for="exampleInputEmail1">Conform Password</label>
                                            <input type="password" class="form-control" id="fileImg" 
                                                   name="re_New_password" placeholder="Enter name category" value="<?php echo e(old('re_New_password')); ?>">
                                            <?php $__errorArgs = ['re_New_password'];
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


                                        
                                    
                                        <button type="submit" class="btn btn-info">Update Password</button>
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
        </section>
        <!-- footer -->
        <div class="footer" style="width: 100%; position: absolute;bottom: 0; text-align: center">
            <div class="wthree-copyright">
                <p>© 2023. All rights reserved | Design by <a href="/about">Favorable Team</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>

    <!--main content end-->
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phong\Documents\project-FANoFAN\resources\views/admin/change_password.blade.php ENDPATH**/ ?>