<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regist</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login_style.css'); ?>">
</head>

<body>

    <div class="login-container">
        <h2>Registrasi</h2>
        <?php echo validation_errors(); ?>
        <form action="<?php echo site_url('Auth/submit'); ?>" method="post">
            <label for="username">Name:</label>
            <input type="text" name="username" id="username"><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email"><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password"><br>

            <center><input type="submit" value="Submit"><br>
                <p>Sudah punya akun, <a href="<?php echo base_url('auth/login') ?>">Login</a></p>
            </center>

        </form>
    </div>
</body>

</html>