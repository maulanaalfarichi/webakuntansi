<?php
include "koneksi.php";
 $id = $_GET['id_pembelian'];
 

 $input = mysqli_query($conn,"delete from pembelian where id_pembelian = '$id'");

 echo "<script>document.location.href='../modules/pembelian.php'</script>";  

?>