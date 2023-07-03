<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="<?php echo e(asset('images/icon-title.ico')); ?>">
    <title>My Account</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<style>
    body {
        margin-top: 20px;
        color: #1a202c;
        text-align: left;
        background-color: #e2e8f0;
    }

    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm > .col, .gutters-sm > [class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3, .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }

    .card-body {
        height: 54vh;
    }
    button.btn.btn-primary {
    margin-top: 2vh;
}
</style>
<body>
<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/user">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Information</li>

            </ol>

        </nav>
        <!-- /Breadcrumb -->
        <?php if(session()->has('message')): ?>
            <div class="alert alert-success text-center" role="alert"><?php echo e(session('message')); ?></div>
        <?php elseif(session()->has('old')): ?>
            <div class="alert alert-danger" role="alert"><?php echo e(session('old')); ?></div>
        <?php elseif(session()->has('accept')): ?>
            <div class="alert alert-danger" role="alert"><?php echo e(session('accept')); ?></div>

        <?php elseif(session()->has('same')): ?>
            <div class="alert alert-danger" role="alert"><?php echo e(session('same')); ?></div>

        <?php endif; ?>
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                       <form action="/account" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="/upload/<?php echo e($list_photo->avatar); ?>" alt="Admin"
                                     class="rounded-circle" width="150" id="img">
                                    
                                <div class="mt-3">
                                    <?php $__currentLoopData = $list_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h4><?php echo e($user->username); ?></h4>
                                        <p class="text-secondary mb-1"><?php echo e($user->email); ?></p>
                                        <p class="text-muted font-size-sm"><?php echo e($user->phone); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                            <br>
                                            
                                        </div>
                                        
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fileImg"
                                                   aria-describedby="inputGroupFileAddon01" name="fileImg">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                        
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </form> 
                                </div>
                            </div>
                        

                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Username</h6>
                            </div>
                            <?php $__currentLoopData = $list_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo e($user->username); ?>

                                    <a class="col-1" data-toggle="modal" data-target="#edit_username">
                                        <i class="fa-solid fa-pen-to-square"></i></a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <?php $__currentLoopData = $list_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="col-sm-9 text-secondary">
                                    <?php echo e($user->email); ?>

                                    <a class="col-1" data-toggle="modal" data-target="#edit_email"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <?php $__currentLoopData = $list_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo e($user->phone); ?>

                                    <a class="col-1" data-toggle="modal" data-target="#edit_phone"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <a class="col-1" data-toggle="modal" data-target="#edit_password"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
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
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="edit_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <form action="/user/my_account/edit_email">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDIT EMAIL</h5>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://kit.fontawesome.com/1fa6a2ee32.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    document.getElementById('fileImg').onchange = evt => {
        const [file] = fileImg.files;
        if (file) {
            img.src = URL.createObjectURL(file);
        }

    }
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\project-FANoFAN-2\resources\views/user/my_account.blade.php ENDPATH**/ ?>