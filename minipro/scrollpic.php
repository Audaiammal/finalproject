<!DOCTYPE html>
<html lang="'en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>dashboard</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            .carousel-item img{
                width:50%;
                height:700px;
                object-fit:contain;
                padding:50px;
            }
        </style>
        </head>
<body>
<div id="imageCarousel" class="carousel Slide"
        data-ride="carousel"
        data-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./images/mainblock2.jpg" class="d-block w-100" alt="First image">
            </div>
            <div class="carousel-item">
              <img src="./images/libbuilding.jpg" class="d-block w-100" alt="First image">
            </div>
            <div class="carousel-item">
              <img src="./images/mainblock.jpg" class="d-block w-100" alt="First image">
            </div>
            <div class="carousel-item">
              <img src="./images/libconvo.jpg" class="d-block w-100" alt="second image">
            </div>
            <div class="carousel-item">
              <img src="./images/libfrontold.jpg" class="d-block w-100" alt="third image">
            </div>
            <div class="carousel-item">
              <img src="./images/Librarianpic.jpg" class="d-block w-100" alt="fourth image">
            </div>
            <div class="carousel-item">
              <img src="./images/libstone.jpg" class="d-block w-100" alt="fifth image">
            </div>
        </div>
</div>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $('#imageCarousel').carousel({
        interval:3000,
        pause:'false',
        wrap:true
    });
</script>
</body>
</html>