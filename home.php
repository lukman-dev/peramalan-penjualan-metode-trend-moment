<?php 
  session_start();
  if(empty($_SESSION['user'])){
  header("Location:index.php");
}
  include "config/array.php";
  include "config/koneksi.php";

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peramalan</title>

    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/data-tables/dataTables.bootstrap.css">
    
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/bootstrap/js/jquery-3.1.1.min.js"></script>
  </head>
  <body>

    <nav class="hidden-xs hidden-sm ">
      <div class="logo"><span class="p-blue">PERAMALAN</span> - PENJUALAN</div>
    
      <div class="dropdown dropdown-custom">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrator <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="proses/login.php">Keluar</a></li>
            </ul>
      </div>

      <div class="menu">
        <ul style="margin-bottom: 0px !important">
          <li>
            <a href="home.php?r=data-barang" class="
            <?php echo $_GET['r']=="data-barang" ? "p-blue" : $_GET['r']=="" ? "p-blue": $_GET['r']=="tambah-barang" ? "p-blue": $_GET['r']=="ubah-barang" ? "p-blue": ""  ?>">
              <i class="glyphicon glyphicon-hdd"></i> &nbsp;Data Barang</a>
          </li>
          <li>
            <a href="home.php?r=data-penjualan" class="<?php echo $_GET['r']=="data-penjualan" ? "p-blue" : $_GET['r']=="tambah-penjualan" ? "p-blue": $_GET['r']=="ubah-penjualan" ? "p-blue": ""  ?>">
              <i class="glyphicon glyphicon-shopping-cart"></i> &nbsp;Data Penjualan
            </a>
          </li>
          <li>
            <a href="home.php?r=peramalan" class="<?php echo $_GET['r']=="peramalan" ? "p-blue" : "" ?>">
              <i  class="glyphicon glyphicon-ok"></i>&nbsp; Peramalan
            </a>
          </li>
        </ul>
      </div>
    </nav>



   <nav class="hidden-md hidden-lg">
      <div class="logo">
        <span class="p-blue">PERAMALAN</span> - PENJUALAN
      </div>
      <div class="dropdown dropdown-custom">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="glyphicon glyphicon-align-justify"></i>
        </a>
            <ul class="dropdown-menu dropdown-menu-custom" style="margin-right: 120px">
              <li>
                <a href="home.php?r=data-barang" class="p-blue">
                  <i class="glyphicon glyphicon-hdd"></i> &nbsp;Data Barang
                </a>
              </li>
              <li>
                <a href="home.php?r=data-penjualan">
                  <i class="glyphicon glyphicon-shopping-cart"></i> &nbsp;Data Penjualan
                </a>
              </li>
              <li>
                <a href="home.php?r=peramalan">
                  <i  class="glyphicon glyphicon-ok"></i>&nbsp; Peramalan</a>
              </li>
              <li><a href="#">Keluar</a></li>
            </ul>
      </div>
    </nav>




  <?php include "routes.php"; ?>
    

   
<footer>
   Copyright &copy; 2019 Sistem Peramalan Penjualan
</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/bootstrap/js/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/datatables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>

     

  </body>
</html>