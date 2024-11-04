<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table View</title>
    
</head>

<body>

    <h2>Data Users</h2>
    <center>
        <?php
        // Membuat header tabel
        $this->table->set_heading('ID', 'Name', 'Email', 'Actions');
        // Menambahkan data ke tabel
        foreach ($users as $user) {
            $actions = '
                <a href="#" onclick="openEditModal(' . $user['id'] . ', \'' . $user['name'] . '\', \'' . $user['email'] . '\')">Edit</a>
                    |
                <a href="#" onclick="deleteUser(' . $user['id'] . ')">Delete</a>
                ';
            $this->table->add_row(
                $user['id'],
                $user['name'],
                $user['email'],
                $actions
            );
        }
        // Menampilkan tabel
        echo $this->table->generate();
        ?>
        <!-- Modal (popup form untuk edit) -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close-btn" onclick="closeEditModal()">X</span>
                <h3>Edit User</h3>
                <form id="editForm">
                    <input type="hidden" id="editUserId">
                    <label for="editUserName">Name:</label>
                    <input type="text" id="editUserName" name="name"><br><br>
                    <label for="editUserEmail">Email:</label>
                    <input type="text" id="editUserEmail" name="email"><br><br>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </center>
    <script src="<?php echo base_url('assets/js/script.js');?>"></script>
</body>

</html>