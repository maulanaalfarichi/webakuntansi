<?php
include "koneksi.php";
 $tanggal_hutang = $_POST['tanggal_hutang'];
 $keterangan_hutang = $_POST['keterangan_hutang'];
 $total_hutang = $_POST['total_hutang'];
 $akun_hutang=$_POST['akun_hutang'];
 $id_baganakun = $_POST['id_baganakun'];
 $nama_akun = $_POST['nama_akun'];
 $nomortransaksi_hutang = $_POST['nomortransaksi_hutang'];


 $input1 = mysqli_query($conn,"INSERT INTO hutang VALUES('','$id_baganakun','$nomortransaksi_hutang','$tanggal_hutang','$keterangan_hutang','$total_hutang')"); 

 $input2 = mysqli_query($conn,"INSERT into jurnal_umum VALUES('','$tanggal_hutang', '$nomortransaksi_hutang', '$keterangan_hutang', '$id_baganakun', '0', '$total_hutang' )");

 $input3 = mysqli_query($conn,"INSERT into kas VALUES('', '$nomortransaksi_hutang', '$tanggal_hutang', '$keterangan_hutang', '$id_baganakun', '$total_hutang','0' )");

 echo "<script>document.location.href='../modules/hutang.php'</script>";  

?>