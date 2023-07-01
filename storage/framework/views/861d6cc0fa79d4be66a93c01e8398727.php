    <?php $__env->startSection('title_page'); ?>
    List Picture
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('body_content'); ?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manager photo
                    </div>
                    <div class="row w3-res-tb">
                        <div class="col-sm-5 m-b-xs">


                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-3">
                            <form action="" >
                                <div class="input-group">
                                    <input type="text" class="input-sm form-control" name="key" placeholder="Search">
                                    <span class="input-group-btn">
            <input class="btn btn-sm btn-default" type="submit" >Go!</input>
          </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php

                    ?>
                    <div class="panel-body">
                        <?php if(Session::has('success')): ?>
                            <script>
                                toastr.success("<?php echo e(session('success')); ?>")
                            </script>

                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-striped b-t b-light">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>value</th>
                                    <th>status</th>
                                    <th>Approval/Deny</th>
                                    <td>Product</td>
                                    <th style="width: 30px;"></th>


                                </tr>
                                </thead>
                                <?php $__currentLoopData = $photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <tr>
                                        <td><?php echo e(++$key); ?></td>
                                        <td><img src="/public/upload/<?php echo e($row->value); ?>" alt="" height="100" width="100"></td>
                                        <td><?php
                                                if($row->status==1){
                                                    echo 'main';
                                                }else{
                                                    echo 'extra';
                                                }
                                                ?></td>
                                        <td><span class="text-ellipsis">
        <?php
                                                if($row->status==1){
                                                    ?>
             <a href="<?php echo e(url('/unlike/'.$row->id_photo)); ?>"><span class="fa-solid fa-toggle-on"></span></a>
             <?php
                                                }else{
                                                    ?>

            <a href="<?php echo e(url('/like/'.$row->id_photo)); ?>"><span class="fa-solid fa-toggle-off"></span></a>
            <?php
                                                }
                                                    ?>

       </span>



                                        </td>
                                        <td><?php echo e($row->name_product); ?></td>
                                        <td>
                                            <a onclick="return confirm('Do you want delete this photo?')" href="<?php echo e(url('/delete_picture/'.$row->id_photo)); ?>" ><i class="fa fa-times text-danger text"></i></a>
                                        </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </table>
                            <?php echo e($photo->links()); ?>

                        </div>
                    </div>
                    <footer class="panel-footer">

                    </footer>
                </div>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\votan\Desktop\x23\resources\views/photo/list_picture.blade.php ENDPATH**/ ?>