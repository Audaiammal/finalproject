<?php
session_start(); 
include 'dbcon.php';
$message = '';
$message_type = '';
if (isset($_GET['message'])) {
    $message = $_GET['message'];
    $message_type = isset($_GET['type']) ? $_GET['type'] : 'success'; 
}
if (isset($_SESSION['member_id'])) {
    $member_id = $_SESSION['member_id']; 
} else {
    die("Member not logged in.");
}
$result = $conn->query("SELECT id, Booktitle, Author, Copies FROM book WHERE Copies > 0");
if (!$result) {
    die("Database query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Books</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #87CEFA; 
        }
        table {
            background-color: white;
        }
        thead {
            background-color: navy;
            color: white;
        }
        #message {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Available Books</h1>

        <?php if ($message): ?>
            <div id="message">
                <script>
                    alert('<?php echo htmlspecialchars($message); ?>');
                </script>
            </div>
        <?php endif; ?>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Copies</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Booktitle']); ?></td>
                        <td><?php echo htmlspecialchars($row['Author']); ?></td>
                        <td><?php echo $row['Copies']; ?></td>
                        <td>
                            <form method="POST" action="process_borrow_request.php">
                                <input type="hidden" name="member_id" value="<?php echo htmlspecialchars($member_id); ?>">
                                <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                <button type="submit" class="btn btn-primary" name="borrow">Borrow</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="member_dashboard.php" class="btn btn-secondary mt-4">Return to Dashboard</a>
    </div>
</body>
</html>
