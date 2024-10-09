<?php include 'dbcon.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <style>
        body {
            color: black; 
        }
        table {
            background-color: #cfe7eb; 
            border-color: navy;
        }
        thead {
            background-color: navy;
            color: white; 
        }
        .btn-edit, .btn-delete {
            background-color: rgb(20, 12, 109); 
            color: white;
        }
        .btn-spacing {
            margin-right: 10px;
        }
        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.9; 
            color: white;
        }
        .card-custom {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            background-color: navy;
        }
        .nav-tabs {
            display: flex;
            justify-content: space-evenly; 
            background-color: #cfe7eb;
        }
        .nav-tabs .nav-link.active, .nav-tabs .nav-link.selected {
            background-color: grey; 
            color: white; 
        }
        .nav-tabs .nav-link {
            background-color: #cfe7eb;
            color: black; 
            border: 1px solid navy; 
        }
        .nav-tabs .nav-link:hover {
            background-color: grey;
            color: black; 
        }
        .card-header-tabs {
            display: flex;
            justify-content: space-evenly; 
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#" onclick="loadBooks('')">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadBooks('new')">New Books</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadBooks('archive')">Archive Books</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadBooks('lost')">Lost Books</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadBooks('damage')">Damaged Books</a>
        </li>
    </ul>
</div>

<div class="container mt-5">
    <h3 class="text-center" style="color: navy;">Books</h3>
    <table class="table table-bordered table-responsive-md">
        <thead>
            <tr>
                <th>Acc No</th>
                <th>Book Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Copies</th>
                <th>Publisher</th>
                <th>Publisher Name</th>
                <th>ISBN</th>
                <th>Copyright Year</th>
                <th>Date Added</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="bookTableBody">
           
        </tbody>
    </table>
</div>

<script>
    function loadBooks(status) {
        $.ajax({
            url: 'load_books.php',
            type: 'GET',
            data: { status: status },
            success: function(response) {
                $('#bookTableBody').html(response);
            },
            error: function() {
                alert('Error loading books.');
            }
        });
    }
    $(document).ready(function() {
        loadBooks(''); 
        $('.nav-tabs .nav-link').on('click', function() {
            $('.nav-tabs .nav-link').removeClass('active selected');
            $(this).addClass('active selected');
        });
    });

    function editBook(bookId) {
        window.location.href = 'edit_book.php?id=' + bookId;
    }

    function deleteBook(bookId) {
        if (confirm('Are you sure you want to delete this book?')) {
            $.ajax({
                url: 'delete_book.php',
                type: 'GET',
                data: { id: bookId },
                success: function(response) {
                    if (response.trim() === 'success') {
                        alert('Book deleted successfully!');
                        $('#book-' + bookId).remove();
                    } else {
                        alert(response);
                    }
                },
                error: function() {
                    alert('Error deleting the book.');
                }
            });
        }
    }
</script>

</body>
</html>
