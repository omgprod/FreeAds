<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <div class="card-header">Edit your Ad <?php echo e($ad['id']); ?></div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="<?php echo e(route('ad.update')); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
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
                                    </div><br>
                                <?php endif; ?>
                                <input type="text" name="picture1" placeholder="Link pictures 1" style="margin-bottom: 10px"/>
                                <input type="text" name="picture2" placeholder="Link pictures 2" style="margin-bottom: 10px"/>
                                <input type="text" name="picture3" placeholder="Link pictures 3" style="margin-bottom: 10px"/>
                                <p><b>Title: </b><?php echo e($ad['title']); ?></p>
                                <input type="text" name="title" placeholder="Title" style="margin-bottom: 10px"/>
                                <P><b>Content: </b><?php echo e($ad['content']); ?></p>
                                <textarea name="content" cols="50" rows="10" placeholder="Describe your ad."
                                          style="margin-bottom: 10px"></textarea>
                                <P><b>Price: </b><?php echo e($ad['price']); ?></p>
                                <input type="text" name="price" placeholder="Price" style="margin-bottom: 10px"/>
                                <P><b>Category: </b><?php echo e($ad['category']); ?></p>
                                <select name="category" style="margin-bottom: 10px">
                                    <option value="house-stuff">House Stuff</option>
                                    <option value="Home-renting">Home Renting</option>
                                    <option value="High-techs">High Techs</option>
                                    <option value="Mobile">Mobile</option>
                                    <option value="Clothes">Clothes</option>
                                    <option value="Tools">Tools</option>
                                    <option value="Vehicle">Vehicle</option>
                                    <option value="Pet">Pet</option>
                                </select>
                                <input name="id" value="<?php echo e($ad['id']); ?>" hidden >
                                <button class="btn btn-dark" type="submit">
                                    UPDATE
                                </button>
                            </form>
                            <form method="post" enctype="multipart/form-data" action="/ad/delete/<?php echo e($ad['id']); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <input name="id" value="<?php echo e($ad['id']); ?>">
                                <button class="btn btn-danger" type="submit">
                                    DELETE
                                </button>
                            </form>
                        </div>
                    </div>
                    <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>