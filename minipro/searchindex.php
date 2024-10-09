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
    .table-body {
            background-color: #cfe7eb;
            color: black;
        }
        .table th, .table td {
            vertical-align: middle; /* Vertically center align text */
            text-align: center; /* Center align text */
            padding: 15px; /* Add padding for better spacing */
        }
        .table {
            margin-top: 20px; /* Add some margin above the table */
            border-collapse: collapse; /* Ensure borders collapse properly */
            width: 100%; 
            margin-right:10px;/* Ensure the table takes full width */
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6; /* Add a border to table cells */
        }
    </style> 
</head>
<body>
    <div class="modal-header" style="background-color: navy; color: white;">
        <h5 class="modal-title" id="searchModalLabel">Search Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" style="background-color: #cfe7eb; color:black;">
        <form id="searchForm">
            <div class="form-group">
                <label for="bookTitle">Book Title</label>
                <input type="text" class="form-control" id="bookTitle" name="bookTitle" placeholder="Enter Book Title">
            </div>
            <div class="form-group">
                <label for="authorName">Author Name</label>
                <input type="text" class="form-control" id="authorName" name="authorName" placeholder="Enter Author Name">
            </div>
            <button type="submit" class="btn" style="background-color: navy; color: lightblue; border: 1px solid lightblue;">Search</button>
            <button type="button" class="btn" data-dismiss="modal" style="background-color: navy; color: lightblue; border: 1px solid lightblue;">Close</button>
        </form>
    </div>
    <div id="searchResults" style="margin-top:0px;"></div>

    <script>
        // Handle form submission and send data using AJAX
        $('#searchForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            console.log('Search initiated'); // Log search initiation

            // Get the input values
            var bookTitle = $('#bookTitle').val();
            var authorName = $('#authorName').val();
            console.log('Book Title:', bookTitle, 'Author Name:', authorName); // Log input values

            // Send AJAX request to search PHP script
            $.ajax({
                url: 'searchbook.php',
                type: 'POST',
                data: {
                    bookTitle: bookTitle,
                    authorName: authorName
                },
                success: function(response) {
                    // Display search results in the designated area
                    $('#searchResults').html(response);
                    console.log('Search results received:', response); // Log successful response
                    $('#resultsModal').modal('show');

                },
                error: function(xhr, status, error) {
                    console.error('Error:', error); // Log any errors
                    alert('Search request failed: ' + error);
                }
            });
        });
    </script>
</body>
</html>
