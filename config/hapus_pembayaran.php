<?php
include "koneksi.php";
 $id = $_GET['id_pembayaran'];
 

 $input = mysqli_query($conn,"delete from pembayaran where id_pembayaran = '$id'");

 echo "<script>document.location.href='../modules/pembayaran.php'</script>";  

?>