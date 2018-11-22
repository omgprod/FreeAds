<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <div class="card-header">Annonce <?php echo e(1); ?></div>
                        <div class="card-body">
                            <h1>IMAGE</h1>
                            <a <?php echo e(URL::action('PostController@view', $post->id)); ?>><?php echo e($post->title); ?></a>
                            <p><?php echo e($post->content); ?></p>
                            <i><?php echo e($post->user->name); ?></i>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>