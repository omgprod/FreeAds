<?php $__env->startSection('content'); ?>
    <div id="refresh-m-page"></div>
    <div class="container" style="margin-top: 10px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Messages Options</div>
                    <div class="card-body" style="margin-left:15% ">
                        <ul class="nav nav-inline">
                            <li><button id="unread-btn" class="btn btn-dark" style="margin: 5px">UNREAD</button></li>
                            <li><button id="send-btn" class="btn btn-dark" style="margin: 5px">SEND</button></li>
                            <li><button class="btn btn-dark" style="margin: 5px">OPTIONS</button></li>
                        </ul>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 10px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="send" class="card">
                    <div class="card-header">Send a New Messages</div>
                    <div class="card-body" style="margin-left:15% ">
                        <form method='post' action='<?php echo e(url('send')); ?>'>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('POST'); ?>
                            <input name="sender_id" value="<?php echo e(Auth::user()->id); ?>" hidden>
                            <b>Send To :</b>
                            <select name="receiver_id">
                                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($name->id); ?>"><?php echo e($name->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <b>Subject :</b>
                            <input type="text" name="title" placeholder="Subject" required><br></br>
                            <textarea class="text" cols="fill" rows="10" name="content" placeholder="Content ..." required
                                      style="margin-top: 10px"></textarea><br>
                            <button type='submit' class="btn btn-dark">Send message</button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="message-refresh" class="container" style="margin-top: 10px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php $c = 1 ?>
                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div id="unread" class="card" style="margin-bottom: 10px">
                            <div id="header-card" class="card-header">
                                <p style="margin-right: 10px"><b> Sended by : </b><?php echo e($val->user->name); ?></p>
                                <p style="margin-right: 10px"><b>subject :</b> <?php echo e($val['title']); ?></p>
                                <button name='<?php echo e($val['id']); ?>' id="read" type="button" class="btn btn-dark read" data-toggle="collapse" data-target="#demo<?php echo e($c); ?>">Read</button>
                                <?php if(($val['status'] == 0)): ?>
                                    <span class="badge badge-danger">unread</span>
                                    <?php else: ?>
                                    <span class="badge badge-info">read</span>
                                    <?php endif; ?>
                            </div>
                        <div id="message<?php echo e($c); ?>" class="card-body" style="margin-left:15%;">
                            <?php if(empty($receive)): ?>
                                <p>Empty box.</p>
                            <?php else: ?>
                                <div id="demo<?php echo e($c); ?>" class="collapse">
                                    <p><b>content :</b> <?php echo e($val['content']); ?>

                                    <p><b>Receive at</b> <?php echo e($val['created_at']); ?></p>
                                    <form action="<?php echo e(url('/messages', ['id' => $val->id])); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <input value="<?php echo e($val->id); ?>" hidden>
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </div>
                            <?php endif; ?>
                            <script>
                                $(document).ready(function () {
                                    $('#read').click(function() {
                                        console.log('coucou');
                                    })
                                });
                            </script>
                        </div>
                    </div>
                    <?php $c++ ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div id="refresh"></div>
    <div id="time">
        <?php echo date('H:i:s');?>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>