<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background-color: lightskyblue;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            color: navy;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container label {
            color: black;
            font-weight: 500;
        }
        .form-container .form-control {
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
        }
        .btn-primary {
            background-color: navy;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            transition: background-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #4e555b;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-container">
                <h2>Add Book</h2>
                <form id="addBookForm" method="POST" action="process_user.php">
                    <div class="form-group">
                        <label for="Accno">Account Number</label>
                        <input type="text" class="form-control" id="Accno" name="Accno" placeholder="Enter account number " required>
                    </div>
                    <div class="form-group">
                        <label for="Booktitle">Book Title</label>
                        <input type="text" class="form-control" id="Booktitle" name="Booktitle" placeholder="Enter book title" required>
                    </div>
                    <div class="form-group">
                        <label for="Category">Category</label>
                        <input type="text" class="form-control" id="Category" name="Category" placeholder="Enter Category" required>
                    </div>
                    <div class="form-group">
                        <label for="Author">Author</label>
                        <input type="text" class="form-control" id="Author" name="Author" placeholder="Enter Author" required>
                    </div>
                    <div class="form-group">
                        <label for="Copies">Copies</label>
                        <input type="number" class="form-control" id="Copies" name="Copies" placeholder="Enter Copies" required>
                    </div>
                    <div class="form-group">
                        <label for="Publisher">Publisher</label>
                        <input type="text" class="form-control" id="Publisher" name="Publisher" placeholder="Enter Publisher" required>
                    </div>
                    <div class="form-group">
                        <label for="Publishername">publisher Name</label>
                        <input type="text" class="form-control" id="Publishername" name="Publishername" placeholder="Enter Publishername" required>
                    </div>
                    <div class="form-group">
                        <label for="isbn">isbn</label>
                        <input type="number" class="form-control" id="isbn" name="isbn" placeholder="Enter isbn" required>
                    </div>
                    <div class="form-group">
                        <label for="Copyright">Copyright Year</label>
                        <input type="text" class="form-control" id="Copyright" name="Copyright" placeholder="Enter Copyright" required>
                    </div>    
                    <div class="form-group">
                        <label for="Dateadded">Date Added</label>
                        <input type="date" id="Dateadded" name="Dateadded" step="1" placeholder="Enter date and time">
                    </div>      
                    <div class="form-group">
                        <label for="status">status</label></br>
                        <input type="radio" id="damage" name="Status" value="damage">
                        <label for="damage">Damage</label><br>
                        <input type="radio" id="lost" name="Status" value="lost">
                        <label for="lost">Lost</label><br>
                        <input type="radio" id="new" name="Status" value="new">
                        <label for="new">New</label><br>
                        <input type="radio" id="Archive" name="Status" value="Archive">
                        <label for="Archive">Archive</label><br>
                    </div>                                                    
                    <button type="submit" class="btn btn-primary btn-block">Add Book</button>
                    <a href="admin_dashboard.php" class="btn btn-secondary btn-block mt-2">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="js/jquery-3.5.1.min.js"></script>                  
<script src="js/popper.min.js"></script>                  
<script src="js/bootstrap.min.js"></script> 
<script>
    $(document).ready(function() {
    $('#addBookForm').on('submit', function(event) {
        event.preventDefault();

        
        let dateAddedValue = $('#Dateadded').val();

        $.ajax({
            type: 'POST',
            url: 'process_book.php',
            data: $(this).serialize() + '&Dateadded=' +dateAddedValue , 
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                    window.location.href = "admin_dashboard.php#bookNavItem"; 
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('An error occurred while processing your request.');
            }
        });
    });
});

</script>
</body>
</html>