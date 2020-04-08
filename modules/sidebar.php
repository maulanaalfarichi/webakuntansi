<?Php
if(@$_SESSION['level']=="admin"){?>
        <nav id="sidebar" class="">
        <div class="menu-list">
	            <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="index.php">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dataakun.php"  aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-address-card"></i>Data Akun</a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="datauser.php"  aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-address-card"></i>Data User</a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-2"><i class="fas fa-fw fa-inbox"></i>Pengeluaran</a>
								<div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pembelian.php">Pembelian</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pembayaran.php">Pembayaran</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="prive.php">Prive</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-fw fa-inbox"></i>Pemasukan</a>
								<div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="hutang.php">Hutang</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="modal.php">Modal</a>
                                        </li>
										<li class="nav-item">
                                            <a class="nav-link" href="pendapatan.php">Pendapatan</a>
                                        </li>
                                    </ul>
                                    <li class="nav-item">
                                <a class="nav-link" href="jurnalumum.php"  aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-file-alt"></i>Jurnal Umum</a>
                            </li>
							 <li class="nav-item">
                                <a class="nav-link" href="bukubesar.php"  aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-file-alt"></i>Buku Besar</a>
                            </li>
							 <li class="nav-item">
                                <a class="nav-link" href="neraca.php"  aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-file-alt"></i>Neraca</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="laporanlabarugi.php"  aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-file-alt"></i>Laporan Laba Rugi</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="laporanperubahanmodal.php"  aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-file-alt"></i>Laporan Perubahan Modal</a>
                            </li>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
	        </div>
<?php }
 else if (@$_SESSION['level']=="karyawan"){?>
    <nav id="sidebar" class="">
    <div class="menu-list">
	            <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="index.php">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="index.php" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-2"><i class="fas fa-fw fa-inbox"></i>Pengeluaran</a>
								<div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pembelian.php">Pembelian</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pembayaran.php">Pembayaran</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-fw fa-inbox"></i>Pemasukan</a>
								<div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="hutang.php">Hutang</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="modal.php">Modal</a>
                                        </li>
										<li class="nav-item">
                                            <a class="nav-link" href="pendapatan.php">Pendapatan</a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
	        </div>
    <?php } else {?>
        <nav id="sidebar" class="">
        <div class="menu-list">
	            <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="index.php">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="index.php" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                            </li>
                                    <li class="nav-item">
                                <a class="nav-link" href="jurnalumum.php"  aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-file-alt"></i>Jurnal Umum</a>
                            </li>
							 <li class="nav-item">
                                <a class="nav-link" href="bukubesar.php"  aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-file-alt"></i>Buku Besar</a>
                            </li>
							 <li class="nav-item">
                                <a class="nav-link" href="neraca.php"  aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-file-alt"></i>Neraca</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="laporanlabarugi.php"  aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-file-alt"></i>Laporan laba Rugi</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="laporanperubahanmodal.php"  aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-file-alt"></i>Laporan Perubahan Modal</a>
                            </li>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
	        </div>
    <?php }?>