<?php 
include 'dbcon.php';
session_start();
if (!isset($_SESSION['member_id'])) {
    echo "You are not logged in.";
    exit;
}

$member_id = $_SESSION['member_id'];
$query = $conn->prepare("
    SELECT br.id as request_id, br.request_date, b.Booktitle, br.status, br.return_date, br.book_id
    FROM borrow_requests br
    JOIN book b ON br.book_id = b.id
    WHERE br.member_id = ?
    ORDER BY br.request_date DESC
");
$query->bind_param("i", $member_id);
$query->execute();
$result = $query->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow History</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .blurred-button {
            background-color: #ccc;
            color: #666;
            cursor: not-allowed;
            opacity: 0.6;
        }
        #alert-message {
            display: none;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center">Borrow History</h1>
        <?php if (isset($_GET['message'])) { ?>
            <div id="alert-message" class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($_GET['message']); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Request Date</th>
                    <th>Book Title</th>
                    <th>Status</th>
                    <th>Return Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['request_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['Booktitle']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                        <td><?php echo $row['return_date'] ? htmlspecialchars($row['return_date']) : 'N/A'; ?></td>
                        <td>
                            <?php if ($row['status'] == 'approved') { ?>
                                <form method="POST" action="process_return_request.php">
                                    <input type="hidden" name="request_id" value="<?php echo htmlspecialchars($row['request_id']); ?>">
                                    <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($row['book_id']); ?>">
                                    <button type="submit" class="btn btn-primary">Return</button>
                                </form>
                            <?php } elseif ($row['status'] == 'returned') { ?>
                                <button class="blurred-button btn" disabled>Returned</button>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="member_dashboard.php" class="btn btn-secondary mt-4">Return to Dashboard</a>
    </div>

<script src="js/jquery-3.5.1.min.js"></script>                 
<script src="js/popper.min.js"></script>                  
<script src="js/bootstrap.min.js"></script> 
    <script>
        $(document).ready(function() {
            if ($("#alert-message").length) {
                $("#alert-message").show();
            }
        });
    </script>
</body>
</html>

<?php
$query->close();
$conn->close();
?>
