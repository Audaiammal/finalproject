<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
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
                <h2>Add User</h2>
                <form id="addUserForm">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add User</button>
                    <a href="admin-dashboard.php" class="btn btn-secondary btn-block mt-2">Back</a>
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
        $('#addUserForm').on('submit', function(event) {
            event.preventDefault(); 

            $.ajax({
                type: 'POST',
                url: 'process_user.php',
                data: $(this).serialize(), 
                dataType: 'json', 
                success: function(response) {
                    if (response.status === 'success') {
                        
                        alert(response.message);
                        
                        window.location.href = "admin_dashboard.php#userNavItem"; 
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
