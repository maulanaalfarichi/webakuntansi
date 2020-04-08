<?php
include "koneksi.php";
 $tanggal_pendapatan = $_POST['tanggal_pendapatan'];
 $keterangan_pendapatan = $_POST['keterangan_pendapatan'];
 $total_pendapatan = $_POST['total_pendapatan'];
 $akun_pendapatan=$_POST['akun_pendapatan'];
 $id_baganakun = $_POST['id_baganakun'];
 $nama_akun = $_POST['nama_akun'];
 $nomortransaksi_pendapatan = $_POST['nomortransaksi_pendapatan'];


 $input1 = mysqli_query($conn,"INSERT INTO pendapatan VALUES('','$id_baganakun','$nomortransaksi_pendapatan','$tanggal_pendapatan','$keterangan_pendapatan','$total_pendapatan')"); 

 $input2 = mysqli_query($conn,"INSERT into jurnal_umum VALUES('','$tanggal_pendapatan', '$nomortransaksi_pendapatan', '$keterangan_pendapatan', '$id_baganakun','0','$total_pendapatan')"); 

$input3 = mysqli_query($conn,"INSERT into kas VALUES('', '$nomortransaksi_pendapatan','$tanggal_pendapatan', '$keterangan_pendapatan', '$id_baganakun', '$total_pendapatan', '0')");

 echo "<script>document.location.href='../modules/pendapatan.php'</script>";  

?>