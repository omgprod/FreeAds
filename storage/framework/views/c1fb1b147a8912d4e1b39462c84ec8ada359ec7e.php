<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Welcome to the site <?php echo e($user['name']); ?></h2>
<br/>
Your registered email-id is <?php echo e($user['email']); ?> , Please click on the below link to verify your email account
<br/>
<a href="<?php echo e(url('user/verify', $user->verif->token)); ?>">Verify Email</a>
</body>

</html>
