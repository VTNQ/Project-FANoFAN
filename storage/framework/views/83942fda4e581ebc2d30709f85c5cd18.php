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
                                            <label for="exampleInputEmail1">Name Category</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                   name="name_category" placeholder="Enter name category">
                                            <br>
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


                                        <button type="submit" class="btn btn-info">Add Category</button>
                                    </form>
                                </div>

                            </div>
                        </section>

                    </div>
                    <section class="panel">
                        <div class="col-sm-3" style="float: right;">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="input-sm form-control" name="key" placeholder="Search">
                                    <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit">Go!</button>
          </span>
                                </div>
                            </form>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-8 pb-2">
                                <button href="" class="btn btn-danger" id="btn-confirm">Delete Multiple</button>
                            </div>
                        </div>
                        <table class="table table-striped b-t b-light">
                            <thead>
                            <tr>
                                <th><input type="checkbox" name="" id="select_all_ids"></th>
                                <th>#</th>
                                <th>Name Category</th>

                                <th style="width: 30px;"></th>
                            </tr>
                            </thead>
                            <?php
                                $url = $_SERVER['REQUEST_URI'];
                                $string = substr($url, 23);
                                $item=(int)$string;
                                $i = $item ? ($item -1)*5 + 1 : 1;
                            ?>
                            <?php $__currentLoopData = $all_list_login; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr id="category_ids<?php echo e($row->id); ?>">
                                    <td><input type="checkbox" name="ids[]" class="checkbox_ids" value="<?php echo e($row->id); ?>"></td>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($row->name); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('/edit/'.$row->id)); ?>" class="active" ui-toggle-class=""><i
                                                class="fas fa-edit"> </a></i><a href="<?php echo e(url('/delete/'.$row->id)); ?>"
                                                                                onclick="return confirm('Are you want to delete category?')">
                                            <i class="fa fa-times text-danger text"></i></a>
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
        <div class="footer" style="width: 100%;bottom: 0; text-align: center">
            <div class="wthree-copyright">
                <p>© 2023. All rights reserved | Design by <a href="/about">Favorable Team</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>

    <!--main content end-->
    </section>
    <form action="/save_category"></form>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="mi-modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Are you Delete</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="deleteAllSelectedRecord">Yes</button>
                    <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function (e) {
            $("#select_all_ids").click(function () {
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));
            });
            $('#deleteAllSelectedRecord').click(function (e) {
                e.preventDefault();
                var all_ids = [];
                $('input:checkbox[name=ids]:checked').each(function () {
                    all_ids.push($(this).val());
                })
                $.ajax({
                    url: "<?php echo e(route('category.delete')); ?>",
                    type: 'DELETE',
                    data: {
                        ids: all_ids,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function (response) {
                        $.each(all_ids, function (key, val) {
                            $('#category_ids' + val).remove();
                        })
                    }
                });
            });
        });
    </script>
    <script>
        var modalConfirm = function (callback) {

            $("#btn-confirm").on("click", function () {
                $("#mi-modal").modal('show');
            });

            $("#modal-btn-si").on("click", function () {
                callback(true);
                $("#mi-modal").modal('hide');
            });

            $("#modal-btn-no").on("click", function () {
                callback(false);
                $("#mi-modal").modal('hide');
            });
        };

        modalConfirm(function (confirm) {
            if (confirm) {
                //Acciones si el usuario confirma
                $("#result").html("CONFIRMADO");
            } else {
                //Acciones si el usuario no confirma
                $("#result").html("NO CONFIRMADO");
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phong\project-FANoFAN\resources\views/category/profile_category.blade.php ENDPATH**/ ?>