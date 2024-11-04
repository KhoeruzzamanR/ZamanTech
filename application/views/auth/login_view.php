<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login_style.css'); ?>">
</head>

<body>

    <div class="login-container">
        <center>
            <h2>Login</h2>

            <?php if ($this->session->flashdata('error')): ?>
                <p class="error"><?php echo $this->session->flashdata('error'); ?></p>
            <?php endif; ?>

            <form action="<?php echo site_url('Auth/login_process'); ?>" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Submit">
            </form>
            <p>Belum punya akun, <a href="<?php echo base_url('auth/regist'); ?>">Registrasi</a></p><br>
            <a href="<?php echo base_url(); ?>">Exit</a>
        </center>
    </div>

</body>

</html>