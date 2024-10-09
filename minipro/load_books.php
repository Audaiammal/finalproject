<?php
include 'dbcon.php';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$query = "SELECT *, DATE(Dateadded) AS Dateadded FROM book";
if (!empty($status)) {
    $query .= " WHERE Status = '$status'";
}

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr id='book-{$row['id']}'>
                <td>{$row['Accno']}</td>
                <td>{$row['Booktitle']}</td>
                <td>{$row['Category']}</td>
                <td>{$row['Author']}</td>
                <td>{$row['Copies']}</td>
                <td>{$row['Publisher']}</td>
                <td>{$row['Publishername']}</td>
                <td>{$row['isbn']}</td>
                <td>{$row['Copyright']}</td>
                <td>{$row['Dateadded']}</td>
                <td>{$row['Status']}</td>
                <td>
                  <div class='btn-group' role='group' aria-label='Action buttons'>
                    <button class='btn btn-edit btn-sm btn-spacing' onclick='editBook({$row['id']})'>Edit</button>
                    <button class='btn btn-delete btn-sm btn-spacing' onclick='deleteBook({$row['id']})'>Delete</button>
                  </div>  
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='12' class='text-center'>No books found.</td></tr>";
}
?>
