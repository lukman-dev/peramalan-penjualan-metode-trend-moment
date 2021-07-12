<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>


<div class="container">
  <div class="row" style="margin-top: 200px;">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div style="font-size: 14pt;text-align: center;">
        <span class="p-blue">PERAMALAN</span> - PENJUALAN
      </div>
      <br>
      <form action="proses/login.php" method="POST">
        <div class="form-group">
          <!-- <label for="username">Username</label> -->
          <input type="text" name="user" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
          <!-- <label for="password">Password</label> -->
          <input type="password" name="pass" class="form-control" placeholder="Password">
        </div>
        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
      </form>
        <br>
        <?php if (!empty($_SESSION['msg'])){ ?>
          <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error! <br></strong> <?=$_SESSION['msg']  ?>
          </div>          
        <?php } unset($_SESSION['msg'])  ?>

    </div>

   
    <div class="col-md-4"></div>
  </div>
  </div>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/bootstrap/js/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>