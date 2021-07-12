
<?php 
  $sql = "SELECT * FROM barang WHERE id=$_GET[id]";
  $query = $konek->query($sql);
  $r= mysqli_fetch_array($query);


 ?>



<div class="breadcrum-custom">
       <h3><span class="p-blue">
          <a href="home.php?r=data-barang">Data Barang</a> </span> / Ubah Barang</h3>
       <p>
         Ubah data barang sesuai dengan kebutuhan perusahaan
       </p>
    </div>


<section class="content">
  <div class="container">
    <h4 style="">Ubah Barang </h4>
    <hr>

    <div class="row">
      <div class="col-md-5 col-sm-12 col-xs-12">
      <form action="proses/barang.php" method="POST">
        <input type="text" name="kode" value="<?=$r['kode_barang']  ?>" hidden/>
        <div class="form-group">
          <label for="kode">Kode Barang</label>
          <input type="text" class="form-control"  placeholder="Kode Barang" value="<?=$r['kode_barang'] ?>" disabled/>
        </div>

        <div class="form-group">
          <label for="nama">Nama Barang</label>
          <input type="text" class="form-control" name="nama" placeholder="Nama Barang" value="<?=$r['nama_barang'] ?>">
        </div> 

        <div class="form-group">
          <label for="jumlah">Jumlah Barang</label>
          <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Barang" value="<?=$r['stok'] ?>">
        </div>

        <div class="form-group">
          <label for="bulan">Bulan</label>
          <select name="bulan" class="form-control">
            <?php  for ($i=0; $i<count($bulan) ; $i++) { ?>
              <option value="<?=$bulan[$i] ?>" <?=$r['bulan']==$bulan[$i] ? 'selected' :'' ?>><?=$bulan[$i]  ?></option>
            <?php  } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="tahun">Tahun</label>
          <select name="tahun" class="form-control">
            <?php  for ($i=date('Y'); $i>date('Y')-2 ; $i--) { ?>
              <option value="<?=$i ?>" <?=$r['tahun']==$i ? 'selected' :'' ?>><?=$i  ?></option>
            <?php  } ?>
          </select>
        </div>      


        <button class="btn btn-primary" type="submit" name="ubah">Simpan</button>
        <button class="btn btn-danger" type="button" onclick="self.history.back()">Kembali</button>
      </form>
      </div>
    </div>
  </div>
</section>