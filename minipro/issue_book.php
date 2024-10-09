<?php
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request_id = $_POST['request_id'];
    $book_id = $_POST['book_id'];
    $return_date = date('Y-m-d', strtotime('+14 days'));

    $sql = "UPDATE borrow_requests SET status = 'approved', return_date = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $return_date, $request_id);

    if ($stmt->execute()) {
        $updateCopies = "UPDATE book SET copies = copies - 1 WHERE id = ? AND copies > 0";
        $stmtCopies = $conn->prepare($updateCopies);
        $stmtCopies->bind_param("i", $book_id);
        $stmtCopies->execute();

        if ($stmtCopies->affected_rows > 0) {
            echo 'success';
        } else {
            echo 'Error: No copies left to issue.';
        }

        $stmtCopies->close();
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

