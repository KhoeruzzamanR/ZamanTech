<!DOCTYPE html>
<html>

<head>
    <title>Post Data</title>
</head>

<body>
    <h1>Example POST Form</h1>

    <!-- Tampilkan validasi error jika ada -->
    <?php echo validation_errors(); ?>
    <!-- Form menggunakan method POST -->
    <form action="<?php echo site_url('Api/submit'); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"><br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email"><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>