
<?php $__env->startSection('title_page'); ?>
    History Feedback
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mycss'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body_content'); ?>
<div class="row" style="width: 100%; background-color: #778899; margin: 0;height: 33vh;">
    <aside class="col-2" style="position: relative;left: 16%;">
        <div class="row">
            <!-- sidebar menu start-->
            <div style="border: 1px solid #ffff;background-color: #1c2331;border-radius: 113px;text-align: center" onmouseover="this.style.background='#d97a33'" onmouseout="this.style.background='#002e5a'">
                <a class="active" href="/user/my_account">
                    <h3>My Infomation</h3>
                </a>
            </div>
        </div>
        <div class="row">
            <div style="border: 1px solid #fbec04;background-color: #002e5a;border-radius: 113px;text-align: center" onmouseover="this.style.background='#d97a33'" onmouseout="this.style.background='#002e5a'">
                <a class="active" href="/user/history_feedback">
                    <h3>History FeebBack</h3>
                </a>
            </div>
        </div>
    </aside>
    <main class="col-10" style="position: relative;left: 26%;width: 43%;background-color: #278ac0;border-radius: 13px;text-align:center">
        <h3>History Feedback</h3>
        <table class="table" style="border-radius: 13px">
            <tr>
                <th scope="col">Product</th>
                <th scope="col">User</th>
                <th scope="col">Feedback</th>
            </tr>
            <?php $__currentLoopData = $data_feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
           
            <tr>
                <td>
                    <?php echo e($data->name_product); ?>

                </td>
                <td>
                    <?php echo e($data->username); ?>

                </td>
                <td>
                    <?php echo e($data->content); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      
    </main>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\votan\Desktop\x\resources\views\user\history_feedback.blade.php ENDPATH**/ ?>