<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$nama            = $_POST['nama'];
$username           = $_POST['username'];
$password        = $_POST['password'];
$alamat  = $_POST['alamat'];
$email         = $_POST['email'];
$nomor_hp         = $_POST['nomor_hp'];
$jenis_kelamin        = $_POST['jenis_kelamin'];
$level         = $_POST['level'];
// query SQL untuk insert data
$query="INSERT INTO user SET nama='$nama',username='$username',password='$password',jenis_kelamin='$jenis_kelamin',alamat='$alamat',email'$email',nomor_hp='$nomor_hp',level='$level'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:datauser.php");
?>