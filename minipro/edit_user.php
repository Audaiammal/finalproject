<?php
include 'dbcon.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $query = "SELECT * FROM user WHERE id = $userId";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff; }
        .container {
            background-color: lightskyblue; 
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            padding: 30px; 
            margin-top: 50px; 
        }
        h3 {
            color: navy; 
            margin-bottom: 20px; 
        }
        .btn-primary {
            background-color: navy; 
            border: none; 
        }
        .btn-primary:hover {
            background-color: #004080; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center">Edit User</h3>
        <form action="update_user.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
            <input type="hidden" name="redirect_url" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" /> 
            <div class="form-group">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $user['firstname']; ?>" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $user['lastname']; ?>" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $user['username']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary ">Update</button> 
        </form>
    </div>
</body>
</html>
