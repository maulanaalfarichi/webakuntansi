<?php
include "koneksi.php";
 $id = $_GET['id_modal'];
 

 $input = mysqli_query($conn,"delete from modal where id_modal = '$id'");

 echo "<script>document.location.href='../modules/modal.php'</script>";  

?>