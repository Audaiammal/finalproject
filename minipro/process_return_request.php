<?php
include 'dbcon.php';
$request_id = $_POST['request_id'];
$book_id = $_POST['book_id'];
$return_date = date('Y-m-d');
$sql = "UPDATE borrow_requests SET status = 'returned', return_date = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $return_date, $request_id);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    $update_copies_sql = "UPDATE book SET Copies = Copies + 1 WHERE id = ?";
    $update_stmt = $conn->prepare($update_copies_sql);
    $update_stmt->bind_param("i", $book_id);
    $update_stmt->execute();
    header("Location: borrow_history.php?message=Book returned successfully.");
} else {
    header("Location: borrow_history.php?message=Failed to return the book.");
}

$stmt->close();
$conn->close();
?>
