<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post a new ad :</div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"  action="/ad">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <input type="text" name="title" placeholder="Title"/><br><br>
                            <textarea name="content" cols="50" rows="10" placeholder="Describe your ad."></textarea><br>
                            <input type="text" name="price" placeholder="Price"/>
                            <select name="category">
                                <option value="house-stuff">House Stuff</option>
                                <option value="Home-renting">Home Renting</option>
                                <option value="High-techs">High Techs</option>
                                <option value="Mobile">Mobile</option>
                                <option value="Clothes">Clothes</option>
                                <option value="Tools">Tools</option>
                                <option value="Vehicle">Vehicle</option>
                                <option value="Pet">Pet</option>
                            </select><br>
                            <input type="text"  name="picture1" placeholder="image link" style="margin-top: 5px;margin-bottom: 5px">
                            <input type="text" name="picture2" placeholder="image link">
                            <input type="text" name="picture3" placeholder="image link">
                            <button type="submit">Post new ad.</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>