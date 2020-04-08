<?php
include 'koneksi.php';

    $id = $_POST['id'];
    $tanggal_pembelian  = $_POST['tanggal_pembelian'];
    $keterangan_pembelian = $_POST['keterangan_pembelian'];
    $total_pembelian = $_POST['total_pembelian'];
    $akun_pembelian = $_POST['akun_pembelian'];

    $edit = "UPDATE pembelian SET tanggal_pembelian='$tanggal_pembelian',keterangan_pembelian='$keterangan_pembelian',total_pembelian='$total_pembelian', akun_pembelian='$akun_pembelian' WHERE id='$id'";

  $edit = mysqli_query($conn,$edit);
  if ($edit=true){
            echo "<script>document.location.href='../modules/pembelian.php'</script>";

  }else {
   echo"<script>alert('Update Data Tidak Berhasil');</script>";
  }

?>