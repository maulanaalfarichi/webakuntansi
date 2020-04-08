<?php
include "../config/koneksi.php";

$status = @$_POST['status'];
$user 	= @$_POST['txtuser'];
$email 	= @$_POST['txtemail'];
$pass	= @$_POST['txtpass'];
$nama	= @$_POST['txtnama'];
$level	= @$_POST['txtlevel'];
	
switch($status) {
	case 'add':
		$tambah	= mysqli_query ($conn,"INSERT INTO user VALUES ('$nama','$email','$user','$pass','$level')")or die (mysqli_error());
		if ($tambah=true){
			echo"<script>alert('Tambah Data Berhasil');</script>";
		}else {
			echo"<script>alert('Tambah Data Tidak Berhasil');</script>";
		}
	break;
	
	case 'edit':
		$edit	= "UPDATE user SET Username='$user',Password='$pass',Email='$email', Nama='$nama',Level='$level'";
		$edit .="WHERE Username='$user'";
		$edit	= mysqli_query($conn,$edit) or die (mysqli_error());
		if ($edit=true){
			echo"<script>alert('Update Data Berhasil');</script>";
		}else {
			echo"<script>alert('Update Data Tidak Berhasil');</script>";
		}
	break;
	
	default:
	$id =$_GET['username'];
	$tambah	= mysqli_query ($conn,"DELETE FROM user WHERE Username ='$id'")or die (mysql_error());
		if ($tambah=true){
			echo"<script>alert('Delete Data Berhasil');</script>";
		}else {
			echo"<script>alert('Delete Data Tidak Berhasil');</script>";
		}
	break;
}
?>
<meta http-equiv="refresh" content="0; url=index.php?pages=data-user">