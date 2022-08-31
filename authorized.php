<?php if(isset($_COOKIE[PHPSESSID])){ ?>

<!doctype HTML>
<html>
  <head>
    <link rel='stylesheet' href='stylemain.css'>
    <script src='script.js'></script>
  </head>
  <body>
    <h1><?='Hello ' . $_COOKIE['name']?></h1>
      <input type='button' id='logout' value='log out' onclick='logout()'>
  </body>
</html>

<?php }else{ header('Location: index.php'); }?>