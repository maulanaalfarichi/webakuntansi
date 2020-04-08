<?php
include "koneksi.php";
 $id = $_GET['id_pendapatan'];
 

 $input = mysqli_query($conn,"delete from pendapatan where id_pendapatan = '$id'");

 echo "<script>document.location.href='../modules/pendapatan.php'</script>";  

?>