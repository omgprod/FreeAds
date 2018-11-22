<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('Free Ads', 'Free Ads')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <ul class="nav navbar-nav">
                <li><a class="blog-nav-item <?php echo e(Request::is('/') ? 'active' : ''); ?>" href="/">Home</a></li>
                <li><a class="blog-nav-item <?php echo e(Request::is('show-case') ? 'active' : ''); ?>" href="/show-case">Show Case</a></li>
                <li><a class="blog-nav-item <?php echo e(Request::is('services') ? 'active' : ''); ?>" href="/services">Services</a></li>
                <li><a class="blog-nav-item <?php echo e(Request::is('contact') ? 'active' : ''); ?>" href="/contact">Contact</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <?php if(Auth::guest()): ?>
                    <li><a class="blog-nav-item <?php echo e(Request::is('login') ? 'active' : ''); ?>" href="<?php echo e(route('login')); ?>">Login</a></li>
                    <li><a class="blog-nav-item <?php echo e(Request::is('register') ? 'active' : ''); ?>" href="<?php echo e(route('register')); ?>">Register</a></li>
                <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="blog-nav-item dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">All Posts</a></li>
                            <li><a href="#">Add New</a></li>
                            <li><a href="#">Categories</a></li>

                            <li><hr/></li>

                            <li><a href="#">All Pages</a></li>
                            <li><a href="#">Add New</a></li>

                            <li><hr/></li>

                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                      style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>
