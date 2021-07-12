<div class="breadcrum-custom">
       <h3>Data Peramalan</h3>
      <!--  <p>
         Proses peramalan untuk menentukan banyak penjualan selanjutnya
       </p -->
    </div>


<section class="content">
  <div class="container">
    <h4 style="">Data Peramalan </h4>
    <hr>

    <div class="row">
      <div class="col-md-5 col-sm-12 col-xs-12">
        <!-- <div class="form-group">
          <label for="nama">Nama Barang</label>
          <input type="text" class="form-control" placeholder="Nama Barang">
        </div> --> 
        <form action="proses/peramalan.php" method="POST">

        <div class="form-group">
          <label for="bulan">Bulan</label>
          <select name="bulan" class="form-control">
              <option value="desember">Desember</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tahun">Tahun</label>
          <select name="tahun" class="form-control">
            <?php  for ($i=date('Y')+2; $i>date('Y')-5 ; $i--) { ?>
              <option value="<?=$i ?>"><?=$i  ?></option>
            <?php  } ?>
          </select>
        </div>      


        <button class="btn btn-primary" type="submit" name="ramal">Hasil</button>
        <a href="proses/peramalan.php" class="btn btn-danger">Reset</a>
      </form>
   
      <br><br>


      <?php

      // if($_SESSION['show']=="true"){ ?>


      </div>

  <div class="col col-md-1"></div>
      <div class="col col-md-6">
         <table class="table table-bordered table-striped">
            <tr style="background: #20a8d8;color: white;text-align: center;">
              <td>No</td>
              <td>Bulan</td>
              <td>Tahun</td>
              <td>Hasil Penjualan</td>
            </tr>

            <?php 
            include "config/koneksi.php";
            $no=1;
              $query = mysqli_query($konek,"SELECT  * FROM penjualan");
              while ($data = mysqli_fetch_array($query)) { ?>
              <tr>
                <td width="90"> <center><?=$no++  ?></center></td>
                <td><?=ucwords($data['bulan'])  ?></td>
                <td width="100"><center><?=$data['tahun']  ?></center></td>
                <td width="120"><center><?=$data['jumlah']  ?></center></td>
              </tr>

              <?php } ?>

              <?php 
              if(!empty($_SESSION['sts']) AND !empty($_SESSION['ramal']) ){ ?> 
                <tr style="background: #20a8d8;color: white;text-align: center;">
                  <td>No</td>
                  <td>Bulan</td>
                  <td>Tahub</td>
                  <td>Hasil Peramalan</td>
                </tr>
                <?php if($_SESSION['sts']=="1"){ ?>
                <tr>
                  <td colspan="4"><?=$_SESSION['ramal'];  ?></td>
                </tr>
                <?php } else{ ?>
                
                <tr>
                  <td><center>6</center></td>
                  <td>Desember</td>
                  <td><center><?=date("Y")  ?></center></td>
                  <td>
                    <center><?=$_SESSION['ramal'];  ?></center>
                  </td>
                </tr>
            <?php } } ?>
          </table>
      </div>
    </div>
  </div>
</section>