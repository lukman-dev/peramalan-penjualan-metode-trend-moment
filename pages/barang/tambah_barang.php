<div class="breadcrum-custom">
       <h3><span class="p-blue">
          <a href="home.php?r=data-barang">Data Barang</a> </span> / Tambah Barang</h3>
       <p>
         Tambah data barang sesuai dengan kebutuhan perusahaan
       </p>
    </div>


<section class="content">
  <div class="container">
    <h4 style="">Tambah Barang </h4>
    <hr>
    
    <form action="proses/barang.php" method="POST">
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

        <div class="form-group">
          <label for="kode">Kode Barang</label>
          <input type="text" class="form-control" name="kode" placeholder="Kode Barang">
        </div>

        <div class="form-group">
          <label for="nama">Nama Barang</label>
          <input type="text" class="form-control" name="nama" placeholder="Nama Barang">
        </div> 

        <div class="form-group">
          <label for="jumlah">Jumlah Barang</label>
          <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Barang">
        </div>

        <div class="form-group">
          <label for="bulan">Bulan</label>
          <select name="bulan" class="form-control">
            <?php  for ($i=0; $i<count($bulan) ; $i++) { ?>
              <option value="<?=$bulan[$i] ?>"><?=$bulan[$i]  ?></option>
            <?php  } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="tahun">Tahun</label>
          <select name="tahun" class="form-control">
            <?php  for ($i=date('Y'); $i>date('Y')-2 ; $i--) { ?>
              <option value="<?=$i ?>"><?=$i  ?></option>
            <?php  } ?>
          </select>
        </div>      

      

        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <button class="btn btn-danger" type="button" onclick="self.history.back()">Kembali</button>
  <br><br>
        

      </div>
    </div>
    </form>
  </div>
</section>