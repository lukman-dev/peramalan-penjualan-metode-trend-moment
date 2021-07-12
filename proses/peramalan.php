<?php 
session_start();

include "../config/koneksi.php";
include "../config/array.php";
if (isset($_POST['ramal'])) {
	
	// $bln = $_POST['bulan'];
	
	// $m = array_search($bln, $bulan);
	// $m+=1;
	// $cari = $tahun."-".$m;
	// $m_now = date("n")+1;

	// if($m_now<13) $m_next=$m_now;
	// else $m_next=1;

	// $now = date("Y")."-".$m_next;

	// $cari_timestamp = strtotime($cari);
	// $now_timestamp 	= strtotime($now);

	// echo "$cari_timestamp<br>$now_timestamp<br>";

	$tahun = $_POST['tahun'];
	$now = date("Y");



	if($tahun>$now){
		// echo "";
		$_SESSION['ramal']="Peramalan anda  1 Tahun setelah Tahun ini";
		$_SESSION['sts']="1";
		echo "<script>self.history.back()</script>";

	}else{

		$Y 	= 0; 
    	$XY 	= 0;
	    $sql 	= "SELECT * FROM penjualan ORDER BY id desc LIMIT 5";
	    $query 	= $konek->query($sql);
	    $x 		= 4;

      	while ($r=mysqli_fetch_array($query)) {
	        $Y+=$r['jumlah'];
	        $XY+=$r['jumlah']*$x;
	        $x--;
      	}

      	$sigY  = $Y;
      	$sigXY = $XY;

      	$sigYXY=($sigY*2)-($sigXY*1);

      	$b = $sigYXY/(-10);

      	$a = $sigY-(10*$b);
      	$a/=5;

      	$y = $a+($b*5);

      	$_SESSION['show']="true";
      	$_SESSION['sts']="2";
      	$_SESSION['ramal']=$y;

      	echo "<script>document.location='../home.php?r=peramalan'</script>";
		
	}

}


else{
	unset($_SESSION['ramal']);
	unset($_SESSION['sts']);
	echo "<script>document.location='../home.php?r=peramalan'</script>";
}



 ?>