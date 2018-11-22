<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('💻Free Ads💯', '💯 Free-Ads 💻')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <?php echo e(config('💻Free Ads💯', '💯 Free-Ads 💻')); ?>

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="<?php echo e(__('Toggle navigation')); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php if(!empty(Auth::user())): ?>
                <div class="form-inline">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto" style="margin: 5px;padding-left: 10px">
                            <li>
                                <a class="blog-nav-item <?php echo e(Request::is('/') ? 'active' : ''); ?>" href="/home">Home</a>
                            </li>
                            <li style="padding-left: 15px"><a
                                    class="blog-nav-item <?php echo e(Request::is('services') ? 'active' : ''); ?>" href="/Newad">New
                                    Ads</a>
                            </li>
                            <li style="padding-left: 15px; margin-right: 5px">
                                <a class="blog-nav-item <?php echo e(Request::is('contact') ? 'active' : ''); ?>" href="/contact">Matching</a>
                            </li>
                        </ul>

                        <!-- Search form -->
                        <div class="md-form mt-0 form-inline">
                            <form name="search" action="<?php echo e(route('search')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <select class="form-control" name="title">
                                    <option value="title">Title</option>
                                    <option value="content">Content</option>
                                    <option value="price">Price</option>
                                    <option value="category">Category</option>
                                </select>
                                <input class="form-control" name="searchbar" id="searchbar" type="text"
                                       placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                        <!-- fonction keydown ENTREE -->
                        <script>document.getElementById("searchbar").addEventListener("keydown", function (e) {
                                if (!e) {
                                    var e = window.event;
                                }
                                e.preventDefault();
                                if (e.keyCode == 13) {
                                    document.getElementById("searchbar").submit();
                                }
                            }, false);</script>

                    <?php endif; ?>
                    <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <?php if(auth()->guard()->guest()): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <?php if(Route::has('register')): ?>
                                        <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                    <?php endif; ?>
                                </li>
                            <?php else: ?>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <?php echo e(Auth::user()->name); ?> <span class="badge badge-info"><?php echo e($num); ?></span> <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/users/update">
                                            <?php echo e(__('Profile')); ?>

                                        </a>

                                        <a class="dropdown-item" href="/Myads/<?php echo e(Auth::user()->id); ?>">
                                            <?php echo e(__('My Ads')); ?>

                                        </a>

                                        <a class="dropdown-item" href="<?php echo e(route('messages')); ?>">
                                            <?php echo e(__('Messages')); ?><span class="badge badge-info"><?php echo e($num); ?></span>
                                        </a>

                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Logout')); ?>

                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                              style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>

                                </li>

                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
        </div>
    </nav>

    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <script src="http://www.localhost/freeads/public/js/main.js"></script>
</div>
</body>
</html>
