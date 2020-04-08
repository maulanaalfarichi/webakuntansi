<?php
include "koneksi.php";
 $tanggal_pembelian = $_POST['tanggal_pembelian'];
 $keterangan_pembelian = $_POST['keterangan_pembelian'];
 $total_pembelian = $_POST['total_pembelian'];
 $id_baganakun = $_POST['id_baganakun'];
 
 $nomortransaksi_pembelian = $_POST['nomortransaksi_pembelian'];


 $input1 = mysqli_query($conn,"INSERT INTO pembelian VALUES('','$id_baganakun','$nomortransaksi_pembelian','$tanggal_pembelian','$keterangan_pembelian','$total_pembelian')"); 

 $input2 = mysqli_query($conn,"INSERT into jurnal_umum VALUES('','$tanggal_pembelian', '$nomortransaksi_pembelian', '$keterangan_pembelian', '$id_baganakun','$total_pembelian', '0' )"); 

 $input3 = mysqli_query($conn,"INSERT into kas VALUES('', '$nomortransaksi_pembelian', '$tanggal_pembelian', '$keterangan_pembelian', '$id_baganakun','0','$total_pembelian' )"); 

 echo "<script>document.location.href='../modules/pembelian.php'</script>";  

?>