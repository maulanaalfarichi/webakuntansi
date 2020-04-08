<?php
include "koneksi.php";
 $tanggal_pembayaran = $_POST['tanggal_pembayaran'];
 $keterangan_pembayaran = $_POST['keterangan_pembayaran'];
 $total_pembayaran = $_POST['total_pembayaran'];
 $akun_pembayaran=$_POST['akun_pembayaran'];
 $id_baganakun = $_POST['id_baganakun'];
 $nama_akun = $_POST['nama_akun'];
 $nomortransaksi_pembayaran = $_POST['nomortransaksi_pembayaran'];


 $input1 = mysqli_query($conn,"INSERT INTO pembayaran VALUES('','$id_baganakun','$nomortransaksi_pembayaran','$tanggal_pembayaran','$keterangan_pembayaran','$total_pembayaran')"); 

 $input2 = mysqli_query($conn,"INSERT into jurnal_umum VALUES('','$tanggal_pembayaran', '$nomortransaksi_pembayaran', '$keterangan_pembayaran', '$id_baganakun','$total_pembayaran', '0' )"); 

$input3 = mysqli_query($conn,"INSERT into kas VALUES('', '$nomortransaksi_pembayaran', '$tanggal_pembayaran', '$keterangan_pembayaran', '$id_baganakun','0','$total_pembayaran')");

 echo "<script>document.location.href='../modules/pembayaran.php'</script>";  

?>