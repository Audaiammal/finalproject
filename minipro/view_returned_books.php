<?php
include 'dbcon.php';
$query = "SELECT b.Accno, b.Booktitle,br.member_id,m.firstname,m.lastname, br.request_date as borrow_date, br.return_date 
          FROM borrow_requests br 
          JOIN member m ON br.member_id = m.member_id 
          JOIN book b ON br.book_id = b.id 
          WHERE br.status = 'returned'";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Returned Books</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body >
    <div class="container mt-5">
        <h2>Returned Books</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Acc No</th>
                    <th>Title</th>
                    <th>MemberId</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Borrow Date</th>
                    <th>Returned Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['Accno']; ?></td>
                        <td><?php echo $row['Booktitle']; ?></td>
                        <td><?php echo $row['member_id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['borrow_date']; ?></td>
                        <td><?php echo $row['return_date']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
