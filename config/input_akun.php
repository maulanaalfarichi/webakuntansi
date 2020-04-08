<?php
include "koneksi.php";
 $kode_akun = $_POST['kode_akun'];
 $nama_akun = $_POST['nama_akun'];
 
 $input = mysqli_query($conn,"INSERT INTO bagan_akun (kode_akun, nama_akun) values('$kode_akun','$nama_akun')");

 echo "<script>document.location.href='../modules/dataakun.php'</script>";  

?>