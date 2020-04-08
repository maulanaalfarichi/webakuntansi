<?php
include "koneksi.php";
 $tanggal_prive = $_POST['tanggal_prive'];
 $keterangan_prive = $_POST['keterangan_prive'];
 $total_prive = $_POST['total_prive'];
 $akun_prive=$_POST['akun_prive'];
 $id_baganakun = $_POST['id_baganakun'];
 $nama_akun = $_POST['nama_akun'];
 $nomortransaksi_prive = $_POST['nomortransaksi_prive'];


 $input1 = mysqli_query($conn,"INSERT INTO prive VALUES('','$id_baganakun','$nomortransaksi_prive','$tanggal_prive','$keterangan_prive','$total_prive')"); 

 $input2 = mysqli_query($conn,"INSERT into jurnal_umum VALUES('','$tanggal_prive', '$nomortransaksi_prive', '$keterangan_prive', '$id_baganakun','$total_prive', '0' )"); 

 $input3 = mysqli_query($conn,"INSERT into kas VALUES('', '$nomortransaksi_prive', '$tanggal_prive', '$keterangan_prive', '$id_baganakun','0', '$total_prive')");

 echo "<script>document.location.href='../modules/prive.php'</script>";  

?>