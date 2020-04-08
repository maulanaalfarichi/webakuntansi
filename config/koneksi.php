<?php

$conn = mysqli_connect 
   (
    "localhost",
    "root",
    "",
    "webakuntansi"
   );
if (mysqli_connect_errno())
 {
  echo "Koneksi Gagal"
  .mysqli_connect_error();
 }
 $base_url="http://localhost/Webakuntansi/";
?>