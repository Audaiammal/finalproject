<?php
include 'dbcon.php'; 
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid book ID.");
}

$bookId = $_GET['id'];
$query = "SELECT *, DATE(Dateadded) AS Dateadded FROM book WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $bookId);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();
if (!$book) {
    die("Book not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Accno = $_POST['Accno'];
    $Booktitle = $_POST['Booktitle'];
    $Category = $_POST['Category'];
    $Author = $_POST['Author'];
    $Copies = $_POST['Copies'];
    $Publisher = $_POST['Publisher'];
    $Publishername = $_POST['Publishername'];
    $isbn = $_POST['isbn'];
    $Copyright = $_POST['Copyright'];
    $Dateadded = $_POST['Dateadded'];
    $Status = $_POST['Status'];

    $updateQuery = "UPDATE book SET Accno = ?, Booktitle = ?, Category = ?, Author = ?, Copies = ?, Publisher = ?, Publishername = ?, isbn = ?, Copyright = ?, Dateadded = ?, Status = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('ssssissssssi', $Accno, $Booktitle, $Category, $Author, $Copies, $Publisher, $Publishername, $isbn, $Copyright, $Dateadded, $Status, $bookId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header('Location: admin_dashboard.php?show=bookList'); 
        exit();
    } else {
        echo "Error updating book.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
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
        <h3 class="text-center">Edit Book</h3>
        <form method="post" action="">
            <div class="form-group">
                <label for="Accno">Acc No</label>
                <input type="text" class="form-control" id="Accno" name="Accno" value="<?= htmlspecialchars($book['Accno']) ?>" required>
            </div>
            <div class="form-group">
                <label for="Booktitle">Book Title</label>
                <input type="text" class="form-control" id="Booktitle" name="Booktitle" value="<?= htmlspecialchars($book['Booktitle']) ?>" required>
            </div>
            <div class="form-group">
                <label for="Category">Category</label>
                <input type="text" class="form-control" id="Category" name="Category" value="<?= htmlspecialchars($book['Category']) ?>" required>
            </div>
            <div class="form-group">
                <label for="Author">Author</label>
                <input type="text" class="form-control" id="Author" name="Author" value="<?= htmlspecialchars($book['Author']) ?>" required>
            </div>
            <div class="form-group">
                <label for="Copies">Copies</label>
                <input type="number" class="form-control" id="Copies" name="Copies" value="<?= htmlspecialchars($book['Copies']) ?>" required>
            </div>
            <div class="form-group">
                <label for="Publisher">Publisher</label>
                <input type="text" class="form-control" id="Publisher" name="Publisher" value="<?= htmlspecialchars($book['Publisher']) ?>" required>
            </div>
            <div class="form-group">
                <label for="Publishername">Publisher Name</label>
                <input type="text" class="form-control" id="Publishername" name="Publishername" value="<?= htmlspecialchars($book['Publishername']) ?>" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?= htmlspecialchars($book['isbn']) ?>" required>
            </div>
            <div class="form-group">
                <label for="Copyright">Copyright Year</label>
                <input type="number" class="form-control" id="Copyright" name="Copyright" value="<?= htmlspecialchars($book['Copyright']) ?>" required>
            </div>
            <div class="form-group">
                <label for="Dateadded">Date Added</label>
                <input type="date" class="form-control" id="Dateadded" name="Dateadded" value="<?= htmlspecialchars($book['Dateadded']) ?>" required>
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" id="Status" name="Status" required>
                    <option value="new" <?= $book['Status'] == 'new' ? 'selected' : '' ?>>New</option>
                    <option value="damage" <?= $book['Status'] == 'damage' ? 'selected' : '' ?>>Damage</option>
                    <option value="lost" <?= $book['Status'] == 'lost' ? 'selected' : '' ?>>Lost</option>
                    <option value="archive" <?= $book['Status'] == 'archive' ? 'selected' : '' ?>>Archive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>
</body>
</html>
