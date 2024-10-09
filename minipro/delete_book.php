<?php
include 'dbcon.php'; 
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid book ID.");
}

$bookId = $_GET['id'];
$deleteQuery = "DELETE FROM book WHERE id = ?";
$stmt = $conn->prepare($deleteQuery);
$stmt->bind_param('i', $bookId);
$stmt->execute();

if ($stmt->affected_rows > 0)
{
    echo 'success'; 
}
else {
    echo 'Error deleting the book';
}
?>
