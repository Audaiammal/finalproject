<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <?php 
    include 'spkcheader.php';

    ?>
    
    <style>
        body {
            background-color: #f5f5f5;
        }
        .welcome{
            font-size: 2rem;
            background-color:rgba(168, 68, 68, 0.678);
        }
        .h5{
            color:black;
            font-size:20px;
            font-family:arial;
        }
        .dat{
            text-align:center;
            margin-top:50px;
            font-size:20px;
            font-weight:600;
            color:red;
        }

    </style>
</head>
<body>

<div class="welcome text-white text-center py-2">
    <p class="h4">Welcome to SPKC Library</p>
</div>


<div class="dat">
    <?php include 'datetime.php';?>
</div>


<div class="content container text-center">
    <div class="library-hours mt-5">
        <h2 class="font-weight-bold text-primary">LIBRARY HOURS</h2>
        <p class="h5">Monday to Friday: 8:30 a.m. to 5:30 a.m.</p>
        <p class="h5">Holidays: 9:30a.m. to 3:30 p.m.(Except State Holidays)</p>
    </div>

   
    <div class="library-staff mt-5">
        <h2 class="font-weight-bold text-primary">LIBRARY STAFF</h2>
        <p class="h5">Miss.Kalyani
        </p>
        <p class="h5">Librarian</p>
    </div>
</div>


<!-- 
<footer class="text-center">
    <p>&copy; 2024 spkc college. All Rights Reserved.</p>
</footer> -->

<script src="js/jquery-3.5.1.min.js"></script>                  
<script src="js/popper.min.js"></script>                  
<script src="js/bootstrap.min.js"></script> 
<?php
include 'simplefooter.php';
?>
</body>
</html>
