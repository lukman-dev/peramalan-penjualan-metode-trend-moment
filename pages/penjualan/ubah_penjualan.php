<?php 
  $sql = "SELECT * FROM penjualan WHERE id='$_GET[id]'";
  $query = $konek->query($sql);
  $r = mysqli_fetch_object($query);
 ?>


<div class="breadcrum-custom">
       <h3><span class="p-blue">
          <a href="home.php?r=data-penjualan">Data Penjualan</a> </span> / Ubah Penjualan</h3>
       <p>
         Ubah data penjualan sesuai dengan kebutuhan perusahaan
       </p>
    </div>


<section class="content">
  <div class="container">
    <h4 style="">Ubah Penjualan </h4>
    <hr>
    
    <div class="row">
      <div class="col-md-5 col-sm-12 col-xs-12">
       <?php 
        if(!empty($_SESSION['msg'])){ ?>      
          <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error !</strong> <?=$_SESSION['msg']  ?>
          </div>
        <?php  } unset($_SESSION['msg']) ?>

        <form action="proses/penjualan.php" method="POST">
        <div class="form-group">
          <input type="text" name="kode" value="<?=$r->kode_barang ?>" hidden/>
          <input type="text" name="id" value="<?=$r->id ?>" hidden/>
          <label for="kode">Kode Barang</label>
          <input type="text"  class="form-control" placeholder="Kode Barang" value="<?=$r->kode_barang ?>" disabled/>
        </div>

        <div class="form-group">
          <label for="nama">Nama Barang</label>
          <input type="text" class="form-control" placeholder="Nama Barang" value="<?=$r->nama_barang ?>" disabled/>
        </div> 

        <div class="form-group">
          <label for="jumlah">Jumlah Penjualan</label>
          <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Penjualan" value="<?=$r->jumlah ?>">

          <input type="number" name="jumlah_lama" value="<?=$r->jumlah ?>" hidden/>
        </div>

        <div class="form-group">
          <label for="bulan">Bulan</label>
          <select name="bulan" class="form-control">
            <?php  for ($i=0; $i<count($bulan) ; $i++) { ?>
              <option value="<?=$bulan[$i] ?>" <?=$r->bulan==$bulan[$i] ? 'selected' :'' ?>><?=$bulan[$i]  ?></option>
            <?php  } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="tahun">Tahun</label>
          <select name="tahun" class="form-control">
            <?php  for ($i=date('Y'); $i>date('Y')-2 ; $i--) { ?>
              <option value="<?=$i ?>"  <?=$r->tahun==$i ? 'selected' :'' ?>><?=$i  ?></option>
            <?php  } ?>
          </select>
        </div>      


        <button class="btn btn-primary" name="ubah">Ubah</button>
        <button class="btn btn-danger" type="button" onclick="self.history.back()">Kembali</button>
      </form>
      </div>
    </div>
  </div>
</section>