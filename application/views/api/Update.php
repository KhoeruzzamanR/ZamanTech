<!DOCTYPE html>
<html>

<head>
    <title>Update User Data</title>
</head>

<body>
    <h1>Update Data</h1>

    <form action="<?php echo base_url('api/update/' . $users->id); ?>" method="post"> 
        <!-- Gantilah 'id' dengan nama kolom ID Anda -->
        <label for="name">Name:</label>
        <input type="text" name="name"
            id="name" value="<?php echo set_value('name', $users->name); ?>"><br>
        <label for="email">Email:</label>
        <input type="text" name="email"
            id="email" value="<?php echo set_value('email', $users->email); ?>"><br>
        <input type="submit" value="Update">
    </form>
    <script>
        $.ajax({
            url: "<?php echo base_url('api/update/') ?>" + id,
            type: "PUT",
            data: JSON.stringify({
                name: 'John Doe',
                email: 'john@example.com'
            }),
            contentType: "application/json",
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    </script>

</body>

</html>