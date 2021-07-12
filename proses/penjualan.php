<?php 
session_start();
include "../config/koneksi.php";

	if (isset($_POST['simpan'])) {
		$kode	= $_POST['kode'];
		$nama	= $_POST['nama'];
		$jumlah	= intval($_POST['jumlah']);
		$bulan	= $_POST['bulan'];
		$tahun	= $_POST['tahun'];


		// echo "$kode<br>$nama<br>$jumlah<br>$bulan<br>$tahun";
		// die();

		$cek = "SELECT * FROM barang WHERE kode_barang='$kode' AND nama_barang='$nama'";
		$query2 = $konek->query($cek);
		$r=mysqli_fetch_array($query2);
		$TotalStok = intval($r['stok'])-intval($jumlah);
		// echo $TotalStok; 


		if(mysqli_num_rows($query2)<1){
			// VALIDASI KODE BARANG DAN NAMA BARANG SAMA ATAU TIDAK, DAN DATA ADA ATAU TIDAK DI TB BATANG
			$_SESSION['msg']="<br>Kode Barang dan Data Barang tidak Cocok, Atau Tidak Terdaftar";
			echo "<script>
				self.history.back();
			</script>";
		}
		else{
			if($TotalStok<0){
				// VALIDASI JUMLAH STOK MENCUKUPI ATAU TIDAK
				$_SESSION['msg']="<br>Jumlah Stok Tidak Mencukupi, Jumlah Stok Saat ini : ".$r['stok'];
					echo "<script>
						self.history.back();
					</script>";
			}
			else{
				$sql = "INSERT INTO penjualan VALUES ('','$kode','$nama','$jumlah','$bulan','$tahun')";
				$query = $konek->query($sql);

				if ($query) {
					$barang_sql ="UPDATE barang SET stok=stok-$jumlah WHERE kode_barang='$kode'";
					$barang_query = $konek->query($barang_sql);				
					if($barang_query){
						$_SESSION['msg']="Berhasil Menambah Data Penjualan";
						echo "<script>
							document.location='../home.php?r=data-penjualan';
						</script>";
					}
					else{
						// CEK BERHASIL UPDATE STOK ATAU TIDAK, KALAU TIDAK ROLL BACK STOK BARANG
						$del = "DELETE FROM penjualan ORDER BY id DESC LIMIT 1";
						$barang_query = $konek->query($del);
						$_SESSION['msg']="Gagal Menambah Data Penjualan";
						echo "<script>
						self.history.back();
						</script>";
					}
				}
			}

		}
	}





	//EDIT DATA PENJUALAN

	else if(isset($_POST['ubah'])){
		$id 			= $_POST['id'];
		$kode			= $_POST['kode'];
		$jumlah			= $_POST['jumlah'];
		$bulan			= $_POST['bulan'];
		$tahun			= $_POST['tahun'];
		$jumlah_lama	= $_POST['jumlah_lama'];

		// echo "$id<br>$kode<br>$jumlah<br>$bulan<br>$tahun<br>$jumlah_lama";
		// die();


		$cek = "SELECT * FROM barang WHERE kode_barang='$kode'";
		$query2 = $konek->query($cek);
		$r=mysqli_fetch_array($query2);
		$lama = intval($r['stok'])+intval($jumlah_lama);
		$TotalStok = $lama-intval($jumlah);
		
		if($TotalStok<0){
			// VALIDASI JUMLAH STOK MENCUKUPI ATAU TIDAK
			$_SESSION['msg']="<br>Jumlah Stok Tidak Mencukupi, Jumlah Stok Saat ini : ".$r['stok'];
				echo "<script>
					self.history.back();
				</script>";
		}
		else{

			$sql_barang = "UPDATE barang SET stok='$TotalStok' WHERE kode_barang='$kode'";
			$query_barang=$konek->query($sql_barang);

			if($query_barang){
				$sql = "UPDATE penjualan SET jumlah='$jumlah', bulan='$bulan',
					tahun='$tahun' 
					WHERE id='$id'";
					$query=$konek->query($sql);

				if($query){

					$_SESSION['msg']="Berhasil Mengubah Data";
					echo "<script>
						document.location='../home.php?r=data-penjualan';
					</script>";

				}else{ 
					$_SESSION['msg']="Gagal Mengubah Data";
					echo "<script>
				self.history.back();
					</script>";
				}

			}
		}

	}
















	else{
		$id=$_GET['id'];
		$sql = "DELETE FROM penjualan WHERE id='$id'";
		$query = $konek->query($sql);

		if($query){

			$_SESSION['msg']="Data Telah Dihapus";
			echo "<script>
				document.location='../home.php?r=data-penjualan';
			</script>";

		}else{ 
			$_SESSION['msg']="Data Gagal Dihapus";
			echo "<script>
		self.history.back();
			</script>";
		}

	}

 ?>