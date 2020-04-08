<?php
include "koneksi.php";
 $id = $_GET['id_user'];
 

 $input = mysqli_query($conn,"delete from user where id_user = '$id'");

 echo "<script>document.location.href='../modules/datauser.php'</script>";  

?>