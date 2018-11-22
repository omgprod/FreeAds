<?php $__env->startSection('content'); ?>
    <div id="refresh-h-page"></div>
    <div id="home-refresh" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card" style="margin-bottom: 10px">
                        <div class="card-header d-flex justify-content-center">
                            <b>Ad : </b> <?php echo e($ad['id']); ?> <b> | Category : </b> <?php echo e($ad['category']); ?><b> | Posted at : </b><?php echo e($ad['created_at']); ?></div>
                        <div class="card-body">
                            <?php if(!empty($ad['picture1'])): ?>
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                            class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="<?php echo e($ad['picture1']); ?>" height="400"
                                                 width="200" alt="First slide">
                                        </div>
                                        <?php if(!empty($ad['picture2'])): ?>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="<?php echo e($ad['picture2']); ?>" height="400"
                                                     width="200" alt="First slide">
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($ad['picture3'])): ?>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="<?php echo e($ad['picture3']); ?>" height="400"
                                                     width="200" alt="First slide">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <p><b>Title: </b> <?php echo e($ad['title']); ?></p>
                            <p><b>Price: </b><?php echo e($ad['price'] . " euro"); ?></p>
                            <p><b>Content: </b><?php echo e($ad['content']); ?></p>
                            <p><b>Posted by: </b><?php echo e($ad->user->name); ?></p>
                            <a href="messages"><button class="btn btn-dark">Send Text</button></a>
                            <button class="btn btn-dark">like</button>
                            <button class="btn btn-dark" hidden>Dislike</button>
                            <a class="like" href="#"><i class="far fa-heart fa-clickable" ></i></a>
                            <a class="dislikes"><i class="fas fa-heart fa-clickable" hidden></i></a>
                            <br>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php echo e($ads->render()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>