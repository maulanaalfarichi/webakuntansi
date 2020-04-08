<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webakuntansi";
 
    // membuat koneksi
    $koneksi = new mysqli($servername, $username, $password, $dbname);
 
    // melakukan pengecekan koneksi
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 
 
    //menangkap parameter yang dikirimkan dari detail.php
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $kontak = $_POST['kontak'];
    $level=$_POST['level'];
 
    //perintah untuk melakukan update
    //melakukan update data berdasarkan ID
    $sql = "UPDATE user SET username = '$username', password = '$password', kontak='kontak', level='level' WHERE id_user=$id_user";
 
    if ($koneksi->query($sql) === TRUE) {
        //jika  berhasil tampil ini
        echo "Data Berhasil Diubah"."</br>";
        echo "<a href='datauser.php'>Kembali Ke Halaman Depan</a>";
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: " . $koneksi->error;
    }
 
 
 
    $koneksi->close();
?>