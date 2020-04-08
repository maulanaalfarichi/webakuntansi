<?php
include "koneksi.php";
 $id = $_GET['id_hutang'];
 

 $input = mysqli_query($conn,"delete from hutang where id_hutang = '$id'");

 echo "<script>document.location.href='../modules/hutang.php'</script>";  

?>