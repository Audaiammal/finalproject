<?php include 'dbcon.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            background-color: #e0f7fa; 
            border-color: navy;
        }
        thead {
            background-color: navy;
            color: white;
        }
        .btn-edit {
            background-color: rgb(20, 12, 109);
            color: white;
        }
        .btn-delete {
            background-color:rgb(20, 12, 109); 
            color: white;
        }
        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.9; 
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center" style="color: navy;">Users</h3>
        <table class="table table-bordered table-responsive-md">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <?php
                $query = "SELECT * FROM user";
                $result = $conn->query($query);

                while($row = $result->fetch_assoc()) {
                    echo "<tr id='user-{$row['id']}'>
                            <td>{$row['firstname']}</td>
                            <td>{$row['lastname']}</td>
                            <td>{$row['username']}</td>
                            <td>
                                <button class='btn btn-edit btn-sm' onclick='editUser({$row['id']})'>Edit</button>
                                <button class='btn btn-delete btn-sm' onclick='deleteUser({$row['id']})'>Delete</button>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function editUser(userId) {
            window.location.href = `edit_user.php?id=${userId}`;
        }

        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                fetch(`delete_user.php?id=${userId}`)
                .then(response => response.text())  
                .then(data => {
                    if (data.trim() === 'success') { 
                        alert('User deleted successfully!');
                        document.getElementById(`user-${userId}`).remove(); 
                    } else {
                        alert(data);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error deleting the user'); 
                });
            }
        }
    </script>

</body>
</html>
