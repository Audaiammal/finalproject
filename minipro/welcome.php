<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="nav.css">
<div class="navbox">
  <p>Welcome to SPKC Library</p>
  <div class="date">
    <i class="icon-calendar"></i>
    <?php
    $Today=date('y:m:d');
    $new=date('l,F,d,Y',strtotime($Today));
    echo $new;
    ?>
  </div>
</div>
</body>
</html>