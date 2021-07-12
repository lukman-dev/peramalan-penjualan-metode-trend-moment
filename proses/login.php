<?php 
session_start();
	include '../config/koneksi.php';

	if (isset($_POST['login'])) {
		$user = $_POST['user'];
		$pass = $_POST['pass'];



		$sql = "SELECT * FROM admin WHERE username='$user'";
		$query = $konek->query($sql);
		$data = mysqli_fetch_array($query);

		$cek = mysqli_num_rows($query);

		if($cek<1){
			$_SESSION['msg']='Username Tidak Terdaftar';
			echo "<script>self.history.back()</script>";

		}else{
			if($data['pass']=="$pass"){
	
				$_SESSION['user']=$user;
				echo "<script>document.location='../home.php'</script>";
			}else{
				$_SESSION['msg']='Password yang Anda Masukan Salah!!';
				echo "<script>self.history.back()</script>";
			}
		}
	}

else{
	session_destroy();
	echo "<script>

	document.location='../index.php'</script>";

}
 ?>


