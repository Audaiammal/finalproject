<?php
include 'dbcon.php'; 
if (isset($_GET['member_id'])) {
    $memberId = $_GET['member_id'];
    $query = "SELECT * FROM member WHERE member_id = $memberId";
    $result = $conn->query($query);
    $member = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff; 
        }
        .container {
            background-color: lightskyblue; 
            color: navy;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 8px;
            max-width: 600px; 
            margin: 0 auto;
        }
        label {
            color: black; 
        }
        .btn-primary {
            background-color: #0056b3; 
        }
        .btn-primary:hover {
            background-color: #003d7a; 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Edit Member</h3>
        <form method="POST" action="update_member.php">
        <input type="hidden" name="member_id" value="<?php echo $member['member_id']; ?>" />
        <input type="hidden" name="redirect_url" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" /> 
            <div class="form-group">
                <label for="firstaname">Firstname</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?= htmlspecialchars($member['firstname']) ?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= htmlspecialchars($member['lastname']) ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($member['username']) ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= htmlspecialchars($member['email']) ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= htmlspecialchars($member['password']) ?>" required>
            </div>
            <div class="form-group">
                <label for="rollno">Roll Number</label>
                <input type="text" class="form-control" id="rollno" name="rollno" value="<?= htmlspecialchars($member['roll number']) ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" value="<?= htmlspecialchars($member['mobile number']) ?>" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <select class="form-control" id="year" name="year">
                    <option value="1st">1st Year</option>
                    <option value="2nd">2nd Year</option>
                    <option value="3rd">3rd Year</option>
                </select>
            </div>
           
            
            <button type="submit" class="btn btn-primary">Update Member</button>
        </form>
    </div>
</body>
</html>
