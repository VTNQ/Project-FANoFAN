

<?php $__env->startSection('title_page'); ?>
    My Account
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mycss'); ?>
    <style>
        div.col-11:hover {
            background-color: #0d1137 !important;
        }
        div.
        a:hover {
            color: gold;
        }


        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .alert-success {
            --bs-alert-bg: #68d388;
            margin-left: 9vw;
            width: 23vw;

        }

        .alert-error {
            --bs-alert-bg: #ff4c54;
            margin-left: 9vw;
            width: 23vw;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_content'); ?>
<div class="row" style="width: 100%; background-color: #778899; margin: 0;height: 33vh;">
    <aside class="col-2" style="position: relative;left: 16%;">
        <div class="row">
            <!-- sidebar menu start-->
            <div style="border: 1px solid #fbec04;background-color: #002e5a;border-radius: 113px;text-align: center;" onmouseover="this.style.background='#d97a33'" onmouseout="this.style.background='#002e5a'">
                <a class="active" href="/user/my_account">
                    <h3>My Infomation</h3>
                </a>
            </div>
        </div>
        <div class="row">
            <div style="border: 1px solid #ffff;background-color: #1c2331;border-radius: 113px;text-align: center;" onmouseover="this.style.background='#d97a33'" onmouseout="this.style.background='#002e5a'">
                <a class="active" href="/user/history_feedback">
                    <h3>History FeebBack</h3>
                </a>
            </div>
        </div>
    </aside>
    <main class="col-10"
        style="position: relative;left: 26%;width: 43%;background-color: #278ac0;border-radius: 13px;text-align:center">
            <table>

                <h3>My Information</h3>
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success text-center" role="alert"><?php echo e(session('message')); ?></div>
                    <?php elseif(session()->has('old')): ?>
                    <div class="alert alert-error text-center" role="alert"><?php echo e(session('old')); ?></div>
                    <?php elseif(session()->has('accept')): ?>
                    <div class="alert alert-error text-center" role="alert"><?php echo e(session('accept')); ?></div>

                    <?php elseif(session()->has('same')): ?>
                    <div class="alert alert-error text-center" role="alert"><?php echo e(session('same')); ?></div>
                    
                <?php endif; ?>
                <div class="row">
                    <div class="col-6">UserName:</div>
                    <div class="col-5">
                        <?php $__currentLoopData = $list_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($user->username); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a class="col-1" data-toggle="modal" data-target="#edit_username">
                        <i class="fa-solid fa-pen-to-square"></i></a>
                </div>
                <div class="row">
                    <div class="col-6">Email:</div>
                    <div class="col-5">
                        <?php $__currentLoopData = $list_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($user->email); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a class="col-1" data-toggle="modal" data-target="#edit_email"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                </div>
                <div class="row">
                    <div class="col-6">Phone:</div>
                    <div class="col-5">
                        <?php $__currentLoopData = $list_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($user->phone); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a class="col-1" data-toggle="modal" data-target="#edit_phone"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                </div>
                <div class="row">
                    <div class="col-6">Password:</div>
                    <div class="col-5">

                    </div>
                    <a class="col-1" data-toggle="modal" data-target="#edit_password"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </table>
            <div class="modal fade" id="edit_username" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <form action="/user/my_account/edit_username">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">EDIT USERNAME</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">NEW USERNAME:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="new_username">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="sumit" class="btn btn-primary">Sumit</button>
                            </div>
                </form>
            </div>
    </div>
    </div>
    <div class="modal fade" id="edit_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="/user/my_account/edit_email">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">EDIT EMIAL</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">NEW EMAIL:</label>
                            <input type="text" class="form-control" id="recipient-name" name="new_email">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="sumit" class="btn btn-primary">Submit</button>
                    </div>
        </form>
    </div>
    </div>
    </div>
    <div class="modal fade" id="edit_phone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="/user/my_account/edit_phone">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">EDIT PHONE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">NEW PHONE:</label>
                            <input type="text" class="form-control" id="recipient-name" name="new_phone">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="sumit" class="btn btn-primary">Submit</button>
                    </div>
        </form>
    </div>
    </div>
    </div>
    <div class="modal fade" id="edit_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="/user/my_account/edit_password">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">EDIT PASSWORD</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">OLD PASSWORD:</label>
                            <input type="text" class="form-control" id="recipient-name" name="old_password">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">NEW PASSWORD:</label>
                            <input type="text" class="form-control" id="recipient-name" name="new_password">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">RE-ENTER PASSWORD:</label>
                            <input type="text" class="form-control" id="recipient-name" name="re_new_password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="sumit" class="btn btn-primary">Submit</button>
                    </div>
        </form>
    </div>
    </div>
    </div>
    </main>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phong\Documents\x\resources\views/user/my_account.blade.php ENDPATH**/ ?>