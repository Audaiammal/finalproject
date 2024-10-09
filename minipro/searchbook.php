<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>                  
    <script src="js/popper.min.js"></script>                  
    <script src="js/bootstrap.min.js"></script> 
    <style>
    .table-header {
        background-color: navy;
        color: white;
    }
    .table-body {
        background-color: #cfe7eb;
        color: black;
    }
</style>
</head>

<?php
include 'dbcon.php';
// Get search parameters from POST request
$bookTitle = isset($_POST['bookTitle']) ? $_POST['bookTitle'] : '';
$authorName = isset($_POST['authorName']) ? $_POST['authorName'] : '';

// Create SQL query based on input
$sql = "SELECT * FROM book WHERE 1=1";  // Base query

// Add search conditions
if (!empty($bookTitle)) {
    $sql .= " AND Booktitle LIKE '%" . $conn->real_escape_string($bookTitle) . "%'";
}
if (!empty($authorName)) {
    $sql .= " AND Author LIKE '%" . $conn->real_escape_string($authorName) . "%'";
}

// Execute the query
$result = $conn->query($sql);

// Check if results found
if ($result->num_rows > 0) {
    echo '<table class="table table-bordered">';
    echo '<thead style="background-color: navy; color: white;">
            <tr>
            <th>Book Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Copies</th>
            <th>Publisher</th>
            <th>Copyright</th>
            </tr>
            </thead>';
    echo '<tbody style="background-color: #cfe7eb; color: black;">';

    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['Booktitle']) . "</td>
                <td>" . htmlspecialchars($row['Author']) . "</td>
                <td>" . htmlspecialchars($row['Category']) . "</td>
                <td>" . htmlspecialchars($row['Copies']) . "</td>
                <td>" . htmlspecialchars($row['Publisher']) . "</td>
                <td>" . htmlspecialchars($row['Copyright']) . "</td>
              </tr>";
    }

    echo '</tbody></table>';
} else {
    echo '<p>No results found.</p>';
}

// Close the connection
$conn->close();
?>
