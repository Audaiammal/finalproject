<?php
include 'dbcon.php';

if ($_POST) {
    $userId = $_POST['id'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $username = $_POST['username'];
    $redirectUrl = $_POST['redirect_url']; 

    $updateQuery = "UPDATE user SET firstname = '$firstName', lastname = '$lastName', username = '$username' WHERE id = $userId";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: admin_dashboard.php?show=userList"); 
        exit();
    } else {
        echo 'Error updating user';
    }
}
?>
