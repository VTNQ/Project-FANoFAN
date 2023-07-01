

<?php $__env->startSection('title_page'); ?>

home page

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mycss'); ?>
<style>
    .main-panel {
        background-color: #1c2331;
    }

    p {
        color: black !important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_content'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\votan\Desktop\x\resources\views\index.blade.php ENDPATH**/ ?>