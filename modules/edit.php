<?php
include "../config/koneksi.php";

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: datauser.php');}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * from user WHERE id=$id";
$query = mysqli_query($db, $sql);
$user = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");}
?>

                    <!-- !!! MODAL !!! EDIT -->
                    <!-- ============================================================== -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <form action="../config/input_user.php" method="POST">
                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Username</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="" name="username" class="form-control" value="<?php echo $user['username'] ?>">
                                            </div>
                                        </div>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="password" required="" placeholder="" name="password" class="form-control" value="<?php echo $user['password'] ?>">
                                            </div>
                                        </div>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Level</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="level" checked="" class="custom-control-input"><span class="custom-control-label">Karyawan</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="level" checked="" class="custom-control-input"><span class="custom-control-label">Pemilik</span>
                                            </label>
                                            </div>
                                        </div>
                                       

                                                            <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-3">
                                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                
                                            </div>
                                      </div>
                                      </form>      
                                        </div>
                                        </div>
                                                </div>
                                            </div>
                    <!-- ============================================================== -->
                    <!-- !!! END MODAL !!! EDIT -->
                    <!-- ============================================================== -->