<?php
include 'dbcon.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $role = $_POST['role'];
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($role)) {
        echo "<script>alert('All fields are required.'); window.location.href = 'signup.php';</script>";
        exit();
    }
    if ($role === 'student') {
        $roll_number = $_POST['rollno'];
        $gender = $_POST['gender'];
        $mobile_number = $_POST['mobile'];
        $year = $_POST['year'];

        if (empty($roll_number) || empty($gender) || empty($mobile_number) || empty($year)) {
            echo "<script>alert('All member fields are required.'); window.location.href = 'signup.php';</script>";
            exit();
        }
        $stmt_member = $conn->prepare("INSERT INTO member (firstname, lastname, username, email, password, `roll number`, gender, `mobile number`, year) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");
        $stmt_member->bind_param("sssssssss", $firstname, $lastname, $username, $email, $password, $roll_number, $gender, $mobile_number, $year);

        if ($stmt_member->execute()) {
            echo "<script>alert('Signup successful! You are registered as a student.'); window.location.href = 'home.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt_member->error . "'); window.location.href = 'signup.php';</script>";
        }

        $stmt_member->close(); 
    } else {
        $stmt_user = $conn->prepare("INSERT INTO user (firstname, lastname, username, email, password, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_user->bind_param("ssssss", $firstname, $lastname, $username, $email, $password, $role);

        if ($stmt_user->execute()) {
            echo "<script>alert('Signup successful! You are registered as a $role.'); window.location.href = 'admin_dashboard.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt_user->error . "'); window.location.href = 'signup.php';</script>";
        }

        $stmt_user->close();
    }
}
?>
