<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <!-- Tambahkan library Bootstrap jika diperlukan -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: aquamarine;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">My Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item <?php echo ($this->uri->segment(1) == '') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li class="nav-item <?php echo ($this->uri->segment(1) == 'about') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('about'); ?>">About</a>
                </li>
                <li class="nav-item <?php echo ($this->uri->segment(1) == 'contact') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('contact'); ?>">Contact</a>
                </li>
                <li class="nav-item <?php echo ($this->uri->segment(1) == 'login') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('auth/login'); ?>">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
