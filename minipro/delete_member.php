<?php
include 'dbcon.php'; 
if (isset($_GET['member_id'])) {
    $memberId = $_GET['member_id'];
    $checkmemberQuery = "SELECT * FROM member WHERE member_id = $memberId";
    $memberExists = $conn->query($checkmemberQuery);

    if ($memberExists->num_rows > 0) {
        $deleteQuery = "DELETE FROM member WHERE member_id = $memberId";

        if ($conn->query($deleteQuery) === TRUE) {
            echo 'success'; 
        } else {
            echo 'Error: ' . $conn->error;
        }
    } else {
        echo 'Error: Member does not exist';
    }
} else {
    echo 'Error: Invalid ID';
}
?>

