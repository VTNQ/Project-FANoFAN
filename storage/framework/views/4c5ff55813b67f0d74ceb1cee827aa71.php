<?php $__env->startSection('title_page'); ?>
    Add Product
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body_content'); ?>
    <!--main content start-->
    <style>
        button.btn.btn-info {
            margin-left: 28vh;
        }
        button.btn.btn-info {
    margin-left: 0vh;
    margin-top: 4vh;
}
    </style>
 <link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
          rel="stylesheet">
    <section id="main-content">
        <section class="wrapper">
            <div class="form-w3layouts">
                <!-- page start-->
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Add List Product
                            </header>
                            <div class="panel-body">
                                <?php if(Session::has('success')): ?>
                                    <script>
                                        toastr.success("<?php echo e(session('success')); ?>")
                                    </script>

                                <?php endif; ?>
                             
                                <div class="position-center">
                                    <form role="form" action="/add_Product" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name Product</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                   name="nameProduct" placeholder="Enter name Product">
                                            <?php $__errorArgs = ['nameProduct'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger">Please Enter name Product</div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Price</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                   name="Price" placeholder="Enter name Product">
                                                   <?php $__errorArgs = ['Price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                   <div class="alert alert-danger">Please Enter Money again</div>
                                                   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                           
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Description</label>
                                            <textarea name="description" id="ckeditor" class="ckeditor"
                                                      style="resize: none;" rows="8"
                                                      placeholder="Enter Product Description"></textarea>
                                                      <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger">Please Enter Description Again</div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category</label>

                                            <select name="category" class="form_control input-sm m-bot15" id="">
                                                <?php $__currentLoopData = $list_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>


                                        </div>
                                        <div class="mb-3">
        <label for="MultipleFile" 
               class="form-label">
               Main
        </label>
        <input class="form-control" 
               type="file"
                name="Main"
               id="MultipleFile" >
               <?php $__errorArgs = ['Main'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  
               <div class="alert alert-danger">Please upload Image main</div>
               
               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="mb-3">
        <label for="MultipleFile" 
               class="form-label">
               Extra
        </label>
        <input class="form-control" 
               type="file" 
               id="file" name="file[]" multiple>
               <?php $__errorArgs = ['file'];
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
                                <button type="submit" class="btn btn-info">Add Product</button>
                                </form>
                            </div>

                    </div>
        </section>

        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="position-center">

                    <form role="form" action="/bonus_photo" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name photo</label>
                            <input type="file" class="form-control" id="fileImg" accept="image/*" name="fileImg"  placeholder="Enter name category">
                            <div class="preview">
                                <img src="https://cdn.vectorstock.com/i/preview-1x/65/30/default-image-icon-missing-picture-page-vector-40546530.jpg" alt="Preview" id="img" style="width: 100%; height: 100%;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select name="status" class="form_control input-sm m-bot15" id="">
                                <option value="1">Main</option>
                                <option value="0">Extra</option>
                            </select>

                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product</label>
                            <select name="product" class="form_control input-sm m-bot15" id="" style="width: 36vh;">
                                <?php $__currentLoopData = $list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id_product); ?>"><?php echo e($row->name_product); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="">Send message</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        </form>
    </div>
   


   
</div>
        <section class="panel">
            </form>
            </div>
            <!-- page end-->
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



    </div>

    <script>
        CKEDITOR.replace('ckeditor');
    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phong\Documents\project-FANoFAN\resources\views/Product/add_product.blade.php ENDPATH**/ ?>