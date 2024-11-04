// JavaScript untuk memproses HTTP PUT
// Fungsi untuk membuka modal dengan data pengguna yang ada
function openEditModal(id, name, email) {
    document.getElementById('editUserId').value = id;
    document.getElementById('editUserName').value = name;
    document.getElementById('editUserEmail').value = email;

    // Tampilkan modal
    document.getElementById('editModal').style.display = 'block';
}

// Fungsi untuk menutup modal
function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}

// Fungsi untuk menangani form submit (update data)
document.getElementById('editForm').onsubmit = function (e) {
    e.preventDefault(); // Mencegah reload halaman

    var id = document.getElementById('editUserId').value;
    var name = document.getElementById('editUserName').value;
    var email = document.getElementById('editUserEmail').value;
    var apiUpdateUrl = "<?php echo base_url('index.php/api/update_js/'); ?>";

    console.log("Sending data: ", { id, name, email }); // Debug: data yang akan dikirim

    // Lakukan request HTTP PUT menggunakan Fetch API
    // Lakukan request HTTP PUT menggunakan Fetch API
    fetch(apiUpdateUrl + id, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            name: name,
            email: email
        })
    })
        .then(response => {
            console.log("Response status: ", response.status); // Debug: status respons
            return response.json();
        })
        .then(data => {
            console.log("Response data: ", data); // Debug: response JSON dari server
            if (data.status === "success") {
                alert('User updated successfully');
                location.reload(); // Reload halaman setelah update
            } else {
                alert('Failed to update user');
            }
        })
        .catch(error => {
            console.error('Error occurred:', error);
            alert('An error occurred while updating the user');
        });

    closeEditModal(); // Tutup modal setelah submit
}

// JavaScript untuk memproses HTTP DELETE 
function deleteUser(id) {
    if (confirm('Are you sure you want to delete this user?')) {
        // Lakukan request DELETE menggunakan fetch
        fetch('<?php echo base_url("api/delete_data/"); ?>' + id, {
            method: 'DELETE'
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert('User deleted successfully');
                    location.reload(); // Reload halaman untuk memperbarui tabel
                } else {
                    alert('Failed to delete user');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while deleting the user');
            });
    }
}
