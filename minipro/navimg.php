<!DOCTYPE html>
<html>
  <head>
    <style>
  .container{
    position:relative;
    width:100%;
    height:250px;
    display:inline-block;
    text-align: center;
    margin-top:30px;
    border:2px navy solid;
 
}
.Background-image{
    height:250px;
    width:100%;
}
.overlay-image{
    position:absolute;
    top:0%;
    right:0%;
    width:10%;
    height:250px;
}
.text-overlay{
    position:absolute;
    top: 50%;
    left:50%;
    transform: translate(-50%,-50%);
    color: white;
    font-size:30px;
    font-weight:800px;
    text-shadow:2px 2px 4px rgba(216,212,223,0.7);
}
.logo-image{
    position:absolute;
    top:0%;
    left:0%;
    width:10%;
    height:250px;
}
</style>
</head>

<body>
<div class="container">
  <img src="./images/backgound.jpg" alt="Background-image" class="Background-image">
  <img src="./images/book.jpg" alt="overlay-image" class="overlay-image">
  <img src="./images/spkclogo.jpg" alt="logo-image" class="logo-image">
  <div class="text-overlay" class="text-overlay">SPKC LIBRARY</div>
</div>
</body>
</html>