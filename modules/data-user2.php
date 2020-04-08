<?php
include "config/koneksi.php";
require "modules/savedb.php";
$user = query("SELECT * FROM user");


if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo '<script> alert("Data User Baru Telah Ditambahkan")
                window.location.href="?pages=data-user";
                </script>';
    } else {
        echo "Error : " . $sql . ". " . mysqli_error($config);
    }
}
?>

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">
            <h3 style="color: #42b4ea">Data User</h3>
        </div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-right">
        <li>
            <i style="color: #42b4ea" class="menu-icon mdi mdi-television"></i>
            <a style="color: #42b4ea ; text-decoration:none" href="?pages=home">Dashboard</a>&nbsp;&nbsp;
        </li>

        <li>
            <i style="color: #42b4ea" class="menu-icon mdi mdi-archive"></i>
            <a style="color: #42b4ea ; text-decoration:none" href="#"> Master </a> &nbsp;&nbsp;
        </li>

        <li class="active">
            <i class="menu-icon mdi mdi-account-multiple"></i>
            <a href=""> Data User </a>&nbsp;&nbsp;
        </li>

    </ol>
    <div class="clearfix"></div>
</div>


<hr>


<div class="row">

    <div class="col-md-12 grid-margin">
        <div class="card shadow mb-4">
            <div class="card-header py-3 navbar default-layout">
                <h4 style="color: #ffffff" class="m-0 font-weight-bold">User</h4>

                <!-- MODAL TAMBAH USER -->

                <a href="" class="btn btn-success btn-fw" data-toggle="modal" data-target="#forminsertuser">Tambah</a>
                <!-- Modal -->
                <div class="modal fade" id="forminsertuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <!--Content-->
                        <div class="modal-content form-elegant">
                            <!--Header-->
                            <div class="modal-header text-center">
                                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Tambah User</strong></h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!--Akhir Header-->
                            <!--Body-->
                            <div class="card-body">
                                <form action="" method="post" class="forms-sample">

                                    <div class="form-group">
                                        <h5 for="Nama">Id</h5>
                                        <input type="text" class="form-control" name="id" id="id" readonly placeholder="[Auto]">
                                    </div>

                                    <div class="form-group">
                                        <h5 for="Nama">Nama User</h5>
                                        <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama User" required>
                                    </div>

                                    <div class="form-group">
                                        <h5 for="username">Username</h5>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <h5 for="password">Password</h5>
                                        <input type="text" class="form-control" name="password" id="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <h5 for="telpon">Telpon</h5>
                                        <input type="text" class="form-control" name="Telpon" id="telpon" placeholder="Telpon" required>
                                    </div>
                                    <div class="form-group">
                                        <h5 for="level">Level</h5>
                                        <div>
                                            <select class="form-control" name="Level" id="level">
                                                <option>admin</option>
                                                <option>karyawan</option>
                                                <option>pemilik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer row my-3 d-flex justify-content-center">
                                        <button type="reset" class="btn btn-danger"> Reset </button>
                                        <input type="submit" class="btn btn-success mr-2" name="submit" value="Tambah"></input>
                                    </div>
                                </form>
                            </div>
                            <!--Akhir Body-->
                        </div>
                        <!--Akhir Content-->
                    </div>
                </div>
                <!-- AKHIR MODAL TAMBAH USER -->

            </div>
            <div class=" card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 5px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 150px;">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 100px;">Username</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Password: activate to sort column ascending" style="width: 0px;">Password</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="HP: activate to sort column ascending" style="width: 66px;">Telpon</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Level: activate to sort column ascending" style="width: 50x;">Level</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 50px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i = 1; ?>
                                        <?php foreach ($user as $row) : ?>
                                        <tr role="row" class="odd">
                                            <td><?php echo $i; ?></td>
                                            <td><?= $row["Nama"]; ?></td>
                                            <td><?= $row["username"]; ?></td>
                                            <td><?= $row["password"]; ?></td>
                                            <td><?= $row["Telpon"]; ?></td>
                                            <td><?= $row["Level"]; ?></td>
                                            <td class="align-center">
                                                <span class="btn-group">

                                                    <!-- MODAL VIEW USER -->
                                                    <a onclick="javascript:document.getElementById('viewuser').src='index.php?pages=data-user&id=<?php echo $row['id'];?>" class="xcrud-action btn btn-info btn-sm" title="View" href="#" data-toggle="modal" data-target="#viewuser">
                                                        <i class="mdi mdi-information"></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="viewuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <!--Content-->
                                                            <div class="modal-content form-elegant">
                                                                <!--Header-->
                                                                <div class="modal-header text-center">
                                                                    <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>View User</strong></h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <!--Akhir Header-->
                                                                <!--Body-->
                                                                <div class="card-body">
																	
                                                                    <form action="" class="forms-sample">
																	<?php
																		if(isset($_GET['id'])){
																			$query = mysql_query ("Select * FROM user where id='$_GET[Id]'") or die (mysql_error());
																			$result_edit = mysql_fetch_array($query);
																			}
																			?>
                                                                        <div class="form-group">
                                                                            <h5 for="Nama">Id</h5>
                                                                            <input type="text" class="form-control"  value="<?php echo $result_edit['id'];?>" name="id" id="id" readonly>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <h5 for="Nama">Nama User</h5>
                                                                            <input type="text" class="form-control" value="<?php echo $result_edit['Nama'];?>" name="Nama" id="Nama" readonly>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <h5 for="username">Username</h5>
                                                                            <input type="text" class="form-control" value="<?php echo $result_edit['username'];?>" name="username" id="username" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <h5 for="password">Password</h5>
                                                                            <input type="text" class="form-control" value="<?php echo $result_edit['password'];?>" name="password" id="password" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <h5 for="telpon">Telpon</h5>
                                                                            <input type="text" class="form-control" value="<?php echo $result_edit['Telpon'];?>" name="Telpon" id="telpon" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <h5 for="level">Level</h5>
                                                                            <input type="text" class="form-control" value="<?php echo $result_edit['Level'];?>" name="Level" id="level" readonly>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--Akhir Body-->
                                                            </div>
                                                            <!--Akhir Content-->
                                                        </div>
                                                    </div>
                                                    <!-- AKHIR MODAL VIEW USER -->


                                                    <!-- MODAL EDIT USER -->
                                                    <a onclick="javascript:document.getElementById('edituser').src='index.php?pages=data-user&id=<?php echo $row['id'];?>"  class="xcrud-action btn btn-warning btn-sm" title="Edit" href="#" data-toggle="modal" data-target="#edituser">
                                                        <i class="mdi mdi-table-edit "></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <!--Content-->
                                                            <div class="modal-content form-elegant">
                                                                <!--Header-->
                                                                <div class="modal-header text-center">
                                                                    <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Edit User</strong></h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <!--Akhir Header-->
                                                                <!--Body-->
                                                                <div class="card-body">
                                                                    <form action="" class="forms-sample">

                                                                        <div class="form-group">
                                                                            <h5 for="Nama">Id</h5>
                                                                            <input type="text" class="form-control" value="<?php echo $result_edit['id'];?>" name="id" id="id" readonly placeholder="[Auto]">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <h5 for="Nama">Nama User</h5>
                                                                            <input type="text" class="form-control" value="<?php echo $result_edit['Nama'];?>" name="Nama" id="Nama" placeholder="Nama User" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <h5 for="username">Username</h5>
                                                                            <input type="text" class="form-control" value="<?php echo $result_edit['username'];?>" name="username" id="username" placeholder="Username" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <h5 for="password">Password</h5>
                                                                            <input type="text" class="form-control" value="<?php echo $result_edit['password'];?>" name="password" id="password" placeholder="Password" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <h5 for="telpon">Telpon</h5>
                                                                            <input type="text" class="form-control" value="<?php echo $result_edit['Telpon'];?>" name="Telpon" id="telpon" placeholder="Telpon" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <h5 for="level">Level</h5>
                                                                            <div>
                                                                                <select class="form-control" value="<?php echo $result_edit['Level'];?>" name="Level" id="level" required>
                                                                                    <option>Admin</option>
                                                                                    <option>Owner</option>
                                                                                    <option>Akuntan</option>
                                                                                    <option>Marketing</option>
                                                                                    <option>Konsultan</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer row my-3 d-flex justify-content-center">
                                                                            <button type="reset" class="btn btn-danger"> Reset </button>
                                                                            <input type="submit" class="btn btn-success mr-2" name="submit" value="Simpan"></input>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--Akhir Body-->
                                                            </div>
                                                            <!--Akhir Content-->
                                                        </div>
                                                    </div>
                                                    <!-- AKHIR MODAL EDIT USER -->

                                                    <!-- <a href="modules/hapus.php?id=<?= $row["id"]; ?>" class="xcrud-action btn btn-danger btn-sm" title="Hapus">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a> -->

                                                    <!-- MODAL HAPUS USER -->
                                                    <a class="xcrud-action btn btn-danger btn-sm" title="Hapus" href="" data-toggle="modal" data-target="#hapususer">
                                                        <i class="mdi mdi-delete "></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="hapususer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <!--Content-->
                                                            <div class="modal-content form-elegant">
                                                                <!--Header-->
                                                                <div class="modal-header text-center">
                                                                    <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Konfirmasi Hapus Data</strong></h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <!--Body-->

                                                                <div class="card-body">
                                                                    <form action="" method="post" class="forms-sample">
                                                                        <div class="modal-footer row my-3 d-flex justify-content-center">
                                                                            <button type="submit" class="btn btn-success mr-2"> Hapus </button>
                                                                            <button type="close" class="btn btn-danger"> Batal </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!--/.Content-->
                                                        </div>
                                                    </div>
                                                    <!-- AKHIR MODAL HAPUS USER -->

                                                </span>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 