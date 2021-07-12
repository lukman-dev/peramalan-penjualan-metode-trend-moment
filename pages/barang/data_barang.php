<div class="breadcrum-custom">
       <h3>Data Barang</h3>
       <!-- <p>
         Lihat data barang dan lakukan aksi hapus ataupun ubah data barang sesuai kebutuhan
       </p> -->
    </div>

<section class="content">
  <div class="container">
    <h4 style="background: ;width: 200px;float: left;">Data Barang</h4> 
    <a href="home.php?r=tambah-barang" class="btn btn-primary" style="float: right;margin-bottom: 10px;"><i class="glyphicon glyphicon-plus"></i>&nbsp; Tambah Data Barang</a>

     <br><br><hr>    

    <?php 
        if(!empty($_SESSION['msg'])){ ?>
          
          <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> <?=$_SESSION['msg']  ?>
          </div>
      <?php  } unset($_SESSION['msg']) ?>
     

    <div class="row">
      <div class="col-md-12">
       <table class="table table-bordered table-striped" id="example">
         <thead>
           <th>No</th>
           <th>Kode Barang</th>
           <th>Waktu Masuk</th> 
           <th>Nama Barang</th>
           <th>Jumlah Stok</th>
           <th>Pilihan</th>
         </thead>
         <tbody>
        <?php 
        $no=1;
         $sql = "SELECT * FROM barang";
         $query = $konek->query($sql);
          while ($r=mysqli_fetch_array($query)) {
         ?>
           <tr>
             <td><?=$no++  ?></td>
             <td><?=$r['kode_barang']  ?></td>
             <td><?=$r['bulan']." ".$r['tahun']  ?></td>
             <td><?=$r['nama_barang']  ?></td>
             <td><?=$r['stok']  ?></td>
            
             <td>
               <a href="home.php?r=ubah-barang&id=<?=$r['id']  ?>" class="btn btn-primary btn-sm">
                 <i class="glyphicon glyphicon-pencil"></i>
               </a>
               <a href="proses/barang.php?id=<?=$r['id']  ?>" class="btn btn-danger btn-sm">
                 <i class="glyphicon glyphicon-trash"></i>
               </a>
             </td>
           </tr>
           <?php } ?>
         </tbody>
       </table>

      </div>
    </div>
  </div>
</section>