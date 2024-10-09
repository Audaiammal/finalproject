<?php
include 'dbcon.php';

session_start();
if (isset($_POST['member_id']) && isset($_POST['book_id'])) {
    $member_id = $_POST['member_id'];
    $book_id = $_POST['book_id'];

    $checkBorrow = $conn->prepare("SELECT * FROM borrow_requests WHERE member_id = ? AND book_id = ? AND status = 'approved'");
    $checkBorrow->bind_param("ii", $member_id, $book_id);
    $checkBorrow->execute();
    $result = $checkBorrow->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('You have already borrowed this book and not yet returned it.'); window.location.href = 'browse_books.php';</script>";
        exit(); 
    }

    $checkOutstandingBorrow = $conn->prepare("SELECT * FROM borrow_requests WHERE member_id = ? AND status IN ('approved', 'pending')");
    $checkOutstandingBorrow->bind_param("i", $member_id);
    $checkOutstandingBorrow->execute();
    $outstandingResult = $checkOutstandingBorrow->get_result();

    if ($outstandingResult->num_rows > 0) {
        echo "<script>alert('You cannot borrow a new book until you return your previously borrowed book.'); window.location.href = 'browse_books.php';</script>";
        exit(); 
    }

    $checkCopies = $conn->prepare("SELECT copies FROM book WHERE id = ?");
    $checkCopies->bind_param("i", $book_id);
    $checkCopies->execute();
    $copiesResult = $checkCopies->get_result();
    $bookData = $copiesResult->fetch_assoc();
    if ($bookData['copies'] <= 0) {
        echo "<script>alert('No copies available for this book.'); window.location.href = 'browse_books.php';</script>";
        exit(); 
    }
    $request_date = date('Y-m-d'); 
    $insertBorrow = $conn->prepare("INSERT INTO borrow_requests (member_id, book_id, request_date, status) VALUES (?, ?, ?, 'pending')");
    $insertBorrow->bind_param("iis", $member_id, $book_id, $request_date);

    if ($insertBorrow->execute()) {
        echo "<script>alert('Your borrow request has been sent successfully.'); window.location.href = 'browse_books.php';</script>";
    } else {
        echo "<script>alert('Failed to send borrow request. Please try again later.'); window.location.href = 'browse_books.php';</script>";
    }
    $insertBorrow->close(); 
    $checkBorrow->close(); 
    $checkOutstandingBorrow->close(); 
    $checkCopies->close(); 
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'browse_books.php';</script>";
}

$conn->close(); 
?>
