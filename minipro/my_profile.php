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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
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
        .profile-card dl {
            margin-bottom: 0;
        }
        .profile-card dt {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container profile-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="profile-card">
                <h2 class="text-center">My Profile</h2>
                <dl class="row">
                    <dt class="col-sm-5">First Name:</dt>
                    <dd class="col-sm-7"><?php echo htmlspecialchars($user['firstname']); ?></dd>

                    <dt class="col-sm-5">Last Name:</dt>
                    <dd class="col-sm-7"><?php echo htmlspecialchars($user['lastname']); ?></dd>

                    <dt class="col-sm-5">Username:</dt>
                    <dd class="col-sm-7"><?php echo htmlspecialchars($user['username']); ?></dd>

                    <dt class="col-sm-5">Email:</dt>
                    <dd class="col-sm-7"><?php echo htmlspecialchars($user['email']); ?></dd>

                    <dt class="col-sm-5">Roll Number:</dt>
                    <dd class="col-sm-7"><?php echo htmlspecialchars($user['roll number']); ?></dd>

                    <dt class="col-sm-5">Gender:</dt>
                    <dd class="col-sm-7"><?php echo htmlspecialchars($user['gender']); ?></dd>

                    <dt class="col-sm-5">Mobile Number:</dt>
                    <dd class="col-sm-7"><?php echo htmlspecialchars($user['mobile number']); ?></dd>

                    <dt class="col-sm-5">Year:</dt>
                    <dd class="col-sm-7"><?php echo htmlspecialchars($user['year']); ?></dd>
                </dl>
                <div class="text-center mt-3">
                    <a href="member_dashboard.php" class="btn btn-secondary">Back</a>
                    <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
<?php include 'simplefooter.php';?>
</body>
</html>
