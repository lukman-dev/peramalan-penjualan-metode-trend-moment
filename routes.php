<?php 

	if(isset($_GET['r'])){

		switch ($_GET['r']) {
			case 'data-barang':
				include "pages/barang/data_barang.php";
				break;

			case 'tambah-barang':
				include "pages/barang/tambah_barang.php";
				break;
			
			case 'ubah-barang':
				include "pages/barang/ubah_barang.php";
				break;



			case 'data-penjualan':
				include "pages/penjualan/data_penjualan.php";
				break;

			case 'tambah-penjualan':
				include "pages/penjualan/tambah_penjualan.php";
				break;
			
			case 'ubah-penjualan':
				include "pages/penjualan/ubah_penjualan.php";
				break;


			case 'peramalan':
				include "pages/peramalan/peramalan.php";
				break;


			default:
				include "pages/error/404.php";
				break;
		}
	}else{
		include "pages/barang/data_barang.php";
	}

 ?>