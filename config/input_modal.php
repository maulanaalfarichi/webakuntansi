<?php
include "koneksi.php";
 $tanggal_modal = $_POST['tanggal_modal'];
 $keterangan_modal = $_POST['keterangan_modal'];
 $total_modal = $_POST['total_modal'];
 $akun_modal=$_POST['akun_modal'];
 $id_baganakun = $_POST['id_baganakun'];
 $nama_akun = $_POST['nama_akun'];
 $nomortransaksi_modal = $_POST['nomortransaksi_modal'];


 $input1 = mysqli_query($conn,"INSERT INTO modal VALUES('','$id_baganakun','$nomortransaksi_modal','$tanggal_modal','$keterangan_modal','$total_modal')"); 

 $input2 = mysqli_query($conn,"INSERT into jurnal_umum VALUES('','$tanggal_modal', '$nomortransaksi_modal', '$keterangan_modal', '$id_baganakun','0','$total_modal')");

 $input3 = mysqli_query($conn,"INSERT into kas VALUES('','$nomortransaksi_modal', '$tanggal_modal', '$keterangan_modal', '$id_baganakun', '$total_modal','0')");

 echo "<script>document.location.href='../modules/modal.php'</script>";  

?>