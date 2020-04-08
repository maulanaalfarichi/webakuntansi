<?php
	session_start();
	include '../config/koneksi.php';
	
	$user = @$_POST['username'];
	$pass = @$_POST['password'];
	
	$query=mysqli_query($conn,"select * from user where username='$user' and password='$pass'");
	$jumlahdata =mysqli_num_rows($query);
	
	if ($jumlahdata == 0 ) {
		echo "<script>alert('Username dan password tidak sesuai!');
				window.location.href='login.php';</script>";

				
	} else{
		$data= mysqli_fetch_array($query);

		// cek jika user login sebagai admin
		if($data['level']=="1"){
	 
			// buat session login dan username
			$_SESSION['username'] = $user;
			$_SESSION['level'] = "admin";
			// alihkan ke halaman dashboard admin
			header("location:index.php");
				 
		// cek jika user login sebagai pegawai
		}else if($data['level']=="2"){
			// buat session login dan username
			$_SESSION['username'] = $user;
			$_SESSION['level'] = "karyawan";
			// alihkan ke halaman dashboard pegawai
			header("location:index.php");
			
		}
		else{
			// buat session login dan username
			$_SESSION['username'] = $user;
			$_SESSION['level'] = "pemilik";
			// alihkan ke halaman dashboard pegawai
			header("location:index.php");
			
		}
		
	}
?>
<meta http-equiv="refresh">