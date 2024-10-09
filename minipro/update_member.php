<?php
include 'dbcon.php';

if ($_POST) {
    $memberId = $_POST['member_id'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rollno = $_POST['rollno'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $year = $_POST['year'];
    $redirectUrl = $_POST['redirect_url']; 

    $updateQuery = "UPDATE member SET firstname = '$firstName', lastname = '$lastName', username = '$username', email = '$email', password = '$password', `roll number`= '$rollno', gender = '$gender', `mobile number` = '$mobile', year = '$year' WHERE member_id = $memberId";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: admin_dashboard.php?show=memberList"); 
        exit();
    } else {
        echo 'Error updating member';
    }
}
?>