<?php 
session_start();
include "../config/koneksi.php";

	if (isset($_POST['simpan'])) {
		$kode	= $_POST['kode'];
		$nama	= $_POST['nama'];
		$jumlah	= $_POST['jumlah'];
		$bulan	= $_POST['bulan'];
		$tahun	= $_POST['tahun'];

		$sql = "INSERT INTO barang VALUES ('','$kode','$nama','$jumlah','$bulan','$tahun')";
		$query = $konek->query($sql);

		if($query){
			$_SESSION['msg']="Berhasil Menambah Data";
			echo "<script>
				document.location='../home.php';
			</script>";
		}else{ 
			$_SESSION['msg']="Gagal Menambah Data";
			echo "<script>
		self.history.back();
			</script>";
		}
	}

	else if(isset($_POST['ubah'])){
		$kode	= $_POST['kode'];
		$nama	= $_POST['nama'];
		$jumlah	= $_POST['jumlah'];
		$bulan	= $_POST['bulan'];
		$tahun	= $_POST['tahun'];

		$sql = "UPDATE barang SET 
				nama_barang='$nama',
				stok='$jumlah',
				bulan='$bulan',
				tahun='$tahun' 
				WHERE kode_barang='$kode'";

		$query=$konek->query($sql);

		if($query){

			$_SESSION['msg']="Berhasil Mengubah Data";
			echo "<script>
				document.location='../home.php';
			</script>";

		}else{ 
			$_SESSION['msg']="Gagal Mengubah Data";
			echo "<script>
		self.history.back();
			</script>";
		}

	}


	else{
		$id=$_GET['id'];
		$sql = "DELETE FROM barang WHERE id='$id'";
		$query = $konek->query($sql);

		if($query){

			$_SESSION['msg']="Data Telah Dihapus";
			echo "<script>
				document.location='../home.php';
			</script>";

		}else{ 
			$_SESSION['msg']="Data Gagal Dihapus";
			echo "<script>
		self.history.back();
			</script>";
		}

	}

 ?>