<?php
include "koneksi.php";
 $id = $_GET['id_baganakun'];
 

 $input = mysqli_query($conn,"delete from bagan_akun where id_baganakun = '$id'");

 echo "<script>document.location.href='../modules/dataakun.php'</script>";  

?>