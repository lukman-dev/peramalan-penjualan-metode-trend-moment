<?php 
  $sql = "SELECT * FROM barang";
  $query = $konek->query($sql);
 ?>
 <?php 
  $sql2 = "SELECT * FROM barang";
  $query2 = $konek->query($sql2);
 ?>

<div class="breadcrum-custom">
       <h3><span class="p-blue">
          <a href="home.php?r=data-penjualan">Data Penjualan</a> </span> / Tambah Penjualan</h3>
       <p>
         Tambah data Penjualan sesuai dengan kebutuhan perusahaan
       </p>
    </div>


<section class="content">
  <div class="container">
    <h4 style="">Tambah Penjualan </h4>
    <hr>
    
    <div class="row">
      <div class="col-md-5 col-sm-12 col-xs-12">
        <?php if(!empty($_SESSION['msg'])) { ?>
        <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error!</strong> <?=$_SESSION['msg']  ?>
        </div>
    <?php }
      unset($_SESSION['msg']);
     ?>
      <form action="proses/penjualan.php" method="POST">
       <div class="form-group">
          <label for="kode">Kode Barang</label>
          
          <input list="kode" name="kode" class="form-control" placeholder="Kode Barang">
          <datalist id="kode">
            <?php while ($r = mysqli_fetch_array($query)) { ?>
            <option value="<?=$r['kode_barang']  ?>"> <?=$r['nama_barang']  ?>
            <?php } ?>
          </datalist>
        </div>

        <div class="form-group">
          <label for="nama">Nama Barang</label>
          <input list="nama" name="nama"  class="form-control" placeholder="Nama Barang">
          <datalist id="nama">
            <?php while($r=mysqli_fetch_array($query2)) { ?>
            <option value="<?=$r['nama_barang']  ?>"><?=$r['kode_barang'] ?></option>
            <?php } ?>       
          </datalist>
        </div> 

        <div class="form-group">
          <label for="jumlah">Jumlah Penjualan</label>
          <input type="number" class="form-control"  name="jumlah" placeholder="Jumlah Barang" oninvalid="this.setCustomValidity('Stok Tidak Mencukupi')" oninput="setCustomValidity('')">
        </div>

        <div class="form-group">
          <label for="bulan">Bulan</label>
          <select name="bulan" class="form-control">
              <option value="desember">Desember</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tahun">Tahun</label>
          <select name="tahun" class="form-control">
            <?php  for ($i=date('Y'); $i>date('Y')-6 ; $i--) { ?>
              <option value="<?=$i ?>"><?=$i  ?></option>
            <?php  } ?>
          </select>
        </div>      


        <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
        <button class="btn btn-danger" type="button" onclick="self.history.back()">Kembali</button>
      </form>
      </div>
    </div>
  </div>
</section>