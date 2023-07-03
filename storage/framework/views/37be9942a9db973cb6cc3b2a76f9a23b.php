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
            <button class="btn btn-sm btn-default" type="submit">Go!</button>
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
                                <th>name</th>
                                <th>category</th>
                                <th>money</th>
                                <th>view</th>
                                <th style="width: 30px;"></th>


                            </tr>
                            </thead>
                            <?php $__currentLoopData = $list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr id="product_ids<?php echo e($row->id_product); ?>">
                                    <td><input type="checkbox" name="ids" class="checkbox_ids"
                                               value="<?php echo e($row->id_product); ?>"></td>
                                    <td><?php echo e(++$key); ?></td>


                                    <td><?php echo e($row->name_product); ?></td>

                                    <td><?php echo e($row->name); ?></td>
                                    <td><?php echo e($row->money); ?>$</td>
                                    <td><a href="<?php echo e(url('/detail_product/'.$row->id_product)); ?>">
                                            <button class="btn btn-sm btn-secondary">view</button>
                                        </a></td>
                                    <td>
                                        <a href="<?php echo e(url('/edit_product/'.$row->id_product)); ?>" class="active"
                                           ui-toggle-class=""><i class="fas fa-edit"> </a></i><a
                                            href="<?php echo e(url('/delete_product/'.$row->id_product)); ?>"
                                            onclick="return confirm('Are you want to delete product?')"> <i
                                                class="fa fa-times text-danger text"></i></a>
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
        <div class="footer" style="width: 100%; bottom: 0; text-align: center">
            <div class="wthree-copyright">
                <p>© 2023. All rights reserved | Design by <a href="/about">Favorable Team</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>

    <!--main content end-->
    </section>
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
                    url: "<?php echo e(route('product.delete')); ?>",
                    type: 'DELETE',
                    data: {
                        ids: all_ids,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function (response) {
                        $.each(all_ids, function (key, val) {
                            $('#product_ids' + val).remove();
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-FANoFAN-2\resources\views/product/list_product.blade.php ENDPATH**/ ?>