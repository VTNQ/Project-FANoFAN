

<?php $__env->startSection('title_page'); ?>

home page

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mycss'); ?>
<style>
    .main-panel {
        background-color: #1c2331;
        color: white;
        text-align: initial;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_content'); ?>

<div class="container text-center">
    <div class="row">
        <?php $__currentLoopData = $photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-sm-4" style="background-color: slategrey;padding-top: 2%;border: solid 5px black;margin-top: 1%;">
            <a href="/ceilingfan/<?php echo e($row->id_product); ?>">
                <div>
                    <img src="/public/upload/<?php echo e($row->value); ?>" alt="" width="300" height="300">
            </a>
        </div>
        <tr><?php echo e($row->name_product); ?><br></tr>
        <tr><?php echo e($row->money); ?>$</tr>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>





<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\votan\Desktop\x2\resources\views/index/index.blade.php ENDPATH**/ ?>