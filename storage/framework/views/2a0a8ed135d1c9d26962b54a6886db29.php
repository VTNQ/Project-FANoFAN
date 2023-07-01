    <?php $__env->startSection('title_page'); ?>
    Product
    <?php $__env->stopSection(); ?>
        <?php $__env->startSection('body_content'); ?>
    <!--main content start-->
    <style>
        .col-md-3 {
    margin-top: 1vh;
}
    </style>
    <section id="main-content">
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manager Product
                    </div>
                    <div class="row w3-res-tb">
                        <div class="col-sm-5 m-b-xs">

                        </div>
                        <div class="col-sm-4">
                        </div>
                        <form action="" role="form">
                            <div class="input-group">
                                <input type="text" class="input-sm form-control" name="key" placeholder="Search">
                                <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit" >Go!</button>
          </span>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <?php if(Session::has('success')): ?>
                            <script>
                                toastr.success("<?php echo e(session('success')); ?>")
                            </script>

                        <?php endif; ?>

                        <form action="/filter_product" method="get">
                            <div class="row" style="margin-left: 1vh;">
                                
                                <label >Filter by product</label>
                              
                                <select name="date" id="form-select">
                                <?php $__currentLoopData = $list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              
                               <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </form>
                        <table class="table table-striped b-t b-light">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>category</th>
                                <th>money</th>
                                <th>view</th>
                                <th style="width: 30px;"></th>


                            </tr>
                            </thead>
                            <?php $__currentLoopData = $list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <tr>
                                    <td><?php echo e(++$key); ?></td>


                                    <td><?php echo e($row->name_product); ?></td>

                                    <td><?php echo e($row->name); ?></td>
                                    <td><?php echo e($row->money); ?>$</td>
                                    <td><a href="<?php echo e(url('/detail_product/'.$row->id_product)); ?>"><button class="btn btn-sm btn-secondary" >view</button></a></td>
                                    <td>
                                        <a href="<?php echo e(url('/edit_product/'.$row->id_product)); ?>" class="active" ui-toggle-class=""><i class="fas fa-edit"> </a></i><a href="<?php echo e(url('/delete_product/'.$row->id_product)); ?>" onclick="return confirm('Are you want to delete product?')"> <i class="fa fa-times text-danger text"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                        <?php echo e($list_product->links()); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phong\Documents\Zalo Received Files\x26\resources\views/product/list_product.blade.php ENDPATH**/ ?>