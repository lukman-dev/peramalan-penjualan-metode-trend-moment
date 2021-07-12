<div class="breadcrum-custom">
       <h3>Data Penjualan</h3>
       <!-- <p>
         Lihat data penjualan dan lakukan aksi hapus ataupun ubah data penjualan sesuai kebutuhan
       </p> -->
    </div>


<section class="content">
  <div class="container">
    <h4 style="background: ;width: 200px;float: left;">Data Penjualan</h4> 
    <a href="home.php?r=tambah-penjualan" class="btn btn-primary" style="float: right;margin-bottom: 10px;"><i class="glyphicon glyphicon-plus"></i>&nbsp; Tambah Data Penjualan</a>

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
           <th>Nama Barang</th>
           <th>Jumlah Penjualan</th>
           <th>Bulan</th>
           <th>Tahun</th>
           <th>Pilihan</th>
         </thead>
         <tbody>
        <?php 
        $no=1;

        $sql = "SELECT * FROM penjualan ORDER BY id ASC";
        $query = $konek->query($sql);

          while ($r=mysqli_fetch_array($query)) { ?>
           <tr>
             <td><?=$no++  ?></td>
             <td><?=$r['kode_barang']  ?></td>
             <td><?=$r['nama_barang']  ?></td>
             <td><?=$r['jumlah']  ?> </td>
             <td><?=$r['bulan'] ?></td>
             <td><?=$r['tahun'] ?></td>
             <td>
               <a href="home.php?r=ubah-penjualan&id=<?=$r['id'] ?>" class="btn btn-primary btn-sm">
                 <i class="glyphicon glyphicon-pencil"></i>
               </a>
               <a href="proses/penjualan.php?id=<?=$r['id'] ?>" class="btn btn-danger btn-sm">
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