<?php
include "koneksi.php";
 $username = $_POST['username'];
 $password = $_POST['password'];
 $kontak = $_POST['kontak'];
 $level = $_POST['level'];


 $input = mysqli_query($conn,"INSERT INTO user (username, password, kontak,
  level) values('$username','$password','$kontak','$level')");

 echo "<script>document.location.href='../modules/datauser.php'</script>";  

?>