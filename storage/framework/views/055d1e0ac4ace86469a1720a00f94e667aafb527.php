<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 10px">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <script language="JavaScript" type="text/javascript">
                    function ma_fonction(text){
                        $.ajax({
                            type: "POST",
                            url: "test9214b.php",
                            dataType: 'html',
                            cache: false,
                            success: function(html) {$('#toto').html(html)}
                        });
                    }
                </script>

                <p id="toto"></p>
                <input type="button" value="ok" onclick="ma_fonction()" />
    <div class="container">
        <div class="d-flex justify-content-center">
            <img src="<?php echo e($user->picture); ?>">
        </div>
    </div>
                <div class="card">
                    <div class="card-header">Edit your profil</div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"
                              action="<?php echo e(route('users.update',["user" => $user->id])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <p>Name & Email:</p>
                            <input type="text" name="name" value="<?php echo e($user->name); ?>" placeholder="Name"/>
                            <input type="email" name="email" value="<?php echo e($user->email); ?>" placeholder="Email"/>
                            <p style="margin-top: 5px">Password:</p>
                            <input type="password" name="password" placeholder="Password"/>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password"/>
                            <button class="btn btn-dark" type="submit">UPDATE</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Upload Picture Profile</div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"
                              action="<?php echo e(route('users.store', ['id', Auth::user()->id])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('POST'); ?>
                            <p>Add your picture must be a jpg, jpeg, png, gif</p>
                            <input type="file" name="picture" />
                            <button class="btn btn-dark" type="submit">UPLOAD</button>
                        </form>
                    </div>
                </div>

                <div class="card" style="margin-top: 20px">
                    <div class="card-header">Account delete</div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('users.destroy',["user" => $user->id])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-dark" type="submit">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>