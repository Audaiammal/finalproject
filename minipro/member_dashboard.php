<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #003366; 
        }
        .navbar-brand, .nav-link {
            color: white !important; 
        }
        .nav-link:hover {
            color: #cce5ff !important; 
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">Library Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="my_profile.php">My Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="browse_books.php">Browse Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="borrow_history.php">Borrow History</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<div id="carouselArea" class="container">
    <?php include 'scrollpic.php'; ?>
</div>
<script src="js/jquery-3.5.1.min.js"></script>                 
<script src="js/popper.min.js"></script>                  
<script src="js/bootstrap.min.js"></script> 
<script>
    $(document).ready(function() {
       
        $('#homeNavItem').on('click', function(event) {
            event.preventDefault(); 
            $('#carouselArea').show();
            $('#contentArea').hide(); 
            $('#homeNavItem').trigger('click'); 
        })
        });
</script>
<?php include 'simplefooter.php';?>
</body>
</html>
