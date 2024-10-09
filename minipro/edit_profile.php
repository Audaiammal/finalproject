<?php
session_start();
include 'dbcon.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $roll_number = $_POST['roll_number'];
    $update_stmt = $conn->prepare("UPDATE member SET firstname = ?, lastname = ?, email = ?, `roll number` = ? WHERE username = ?");
    $update_stmt->bind_param("sssss", $firstname, $lastname, $email, $roll_number, $username);

    if ($update_stmt->execute()) {
        header("Location: my_profile.php");
        exit();
    } else {
        echo "Error updating profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f8ff;
        }
        .profile-container {
            margin-top: 50px;
        }
        .profile-card {
            background-color: lightskyblue;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .profile-card h2 {
            margin-bottom: 20px;
            color: #001f3f;
        }
    </style>
</head>
<body>

<div class="container profile-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="profile-card">
                <h2 class="text-center">Edit Profile</h2>

                <form method="POST" action="edit_profile.php">
                    <dl class="row">
                        <dt class="col-sm-5">First Name:</dt>
                        <dd class="col-sm-7">
                            <span class="profile-text"><?php echo htmlspecialchars($user['firstname']); ?></span>
                            <input type="text" name="firstname" class="form-control profile-input" value="<?php echo htmlspecialchars($user['firstname']); ?>" style="display: none;">
                        </dd>

                        <dt class="col-sm-5">Last Name:</dt>
                        <dd class="col-sm-7">
                            <span class="profile-text"><?php echo htmlspecialchars($user['lastname']); ?></span>
                            <input type="text" name="lastname" class="form-control profile-input" value="<?php echo htmlspecialchars($user['lastname']); ?>" style="display: none;">
                        </dd>

                        <dt class="col-sm-5">Email:</dt>
                        <dd class="col-sm-7">
                            <span class="profile-text"><?php echo htmlspecialchars($user['email']); ?></span>
                            <input type="email" name="email" class="form-control profile-input" value="<?php echo htmlspecialchars($user['email']); ?>" style="display: none;">
                        </dd>

                        <dt class="col-sm-5">Roll Number:</dt>
                        <dd class="col-sm-7">
                            <span class="profile-text"><?php echo htmlspecialchars($user['roll number']); ?></span>
                            <input type="text" name="roll_number" class="form-control profile-input" value="<?php echo htmlspecialchars($user['roll number']); ?>" style="display: none;">
                        </dd>
                        <dt class="col-sm-5">Mobile Number:</dt>
                        <dd class="col-sm-7">
                            <span class="profile-text"><?php echo htmlspecialchars($user['mobile number']); ?></span>
                            <input type="text" name="mobile_number" class="form-control profile-input" value="<?php echo htmlspecialchars($user['mobile number']); ?>" style="display: none;">
                        </dd>

                        
                    </dl>
                    <div class="text-center mt-3">
                        <button type="button" id="edit-btn" class="btn btn-primary" onclick="enableEditing()">Edit Profile</button>
                        <button type="submit" id="save-btn" class="btn btn-success" style="display: none;">Save Changes</button>
                        <a href="my_profile.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script>
    function enableEditing() {
        document.getElementById('edit-btn').style.display = 'none';
        document.getElementById('save-btn').style.display = 'inline';
        var textFields = document.getElementsByClassName('profile-text');
        var inputFields = document.getElementsByClassName('profile-input');

        for (var i = 0; i < textFields.length; i++) {
            textFields[i].style.display = 'none'; 
        }

        for (var i = 0; i < inputFields.length; i++) {
            inputFields[i].style.display = 'block'; 
        }
    }
</script>
</body>
</html>
