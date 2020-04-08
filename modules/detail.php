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

    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "SELECT * FROM user WHERE id = $id";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>
 
        <!-- MEMBUAT FORM -->
        <form action="proses-edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $baris['id']; ?>">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $baris['username']; ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <textarea class="form-control" rows="5" name="password" ><?php echo $baris['password']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Level</label>
                <textarea class="form-control" rows="5" name="level" ><?php echo $baris['level']; ?></textarea>
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>
 
        <?php } }
    $koneksi->close();
?>