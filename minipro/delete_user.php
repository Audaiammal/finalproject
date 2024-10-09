<?php
include 'dbcon.php'; 
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $checkUserQuery = "SELECT * FROM user WHERE id = $userId";
    $userExists = $conn->query($checkUserQuery);

    if ($userExists->num_rows > 0) {
        $deleteQuery = "DELETE FROM user WHERE id = $userId";

        if ($conn->query($deleteQuery) === TRUE) {
            echo 'success'; 
        } else {
            echo 'Error: ' . $conn->error;
        }
    } else {
        echo 'Error: User does not exist';
    }
} else {
    echo 'Error: Invalid ID';
}
?>
