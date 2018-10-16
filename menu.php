        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li class="text-center">
                        <img src="assets/img/logo.jpg" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i>&nbsp;&nbsp;&nbsp; Beranda</a>
                    </li>
                    <li>
                        <a  href=""><i class="fa fa-table fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp; Data</a>
                        <ul class="nav nav-second-level">

                            <?php
                                if($_SESSION['level'] != '1'){

                            ?>
                            <li>
                                <a  href="?act=data_siswa">&nbsp;&nbsp;&nbsp; Data Siswa</a>
                            </li>
                            <li>
                                <a  href="?act=data_guru">&nbsp;&nbsp;&nbsp; Data Guru</a>
                            </li>
                            <li>
                                <a  href="?act=data_jadwal">&nbsp;&nbsp;&nbsp; Data Jadwal Pelajaran</a>
                            </li>
                            <li>
                                <a  href="?act=data_kelas">&nbsp;&nbsp;&nbsp; Data Kelas</a>
                            </li>
                            <li>
                                <a  href="?act=data_mata_pelajaran">&nbsp;&nbsp;&nbsp; Data Mata Pelajaran</a>
                            </li>
                            <li>
                                <a  href="?act=data_tata_usaha">&nbsp;&nbsp;&nbsp; Data Tata Usaha</a>
                            </li>
                            <li>
                                <a  href="?act=absen">&nbsp;&nbsp;&nbsp; Data Presensi</a>
                            </li>
                            <li>
                                <a  href="?act=nilai_rekapitulasi">&nbsp;&nbsp;&nbsp; Data Nilai</a>
                            </li>
                            <?php
                                }
                            ?>
                            <?php
                                if($_SESSION['level'] == '1'){

                            ?>
                            <li>
                                <a  href="?act=data_mengajar">&nbsp;&nbsp;&nbsp; Data Jadwal Mengajar</a>
                            </li>
                            <li>
                                <a  href="?act=guru_nilai_rekapitulasi">&nbsp;&nbsp;&nbsp; Data Nilai</a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </li>
                            <?php
                                if($_SESSION['level'] != '1'){

                            ?>
                    <li>
                        <a  href=""><i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;&nbsp;&nbsp; Laporan</a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a  href="?act=laporan_siswa">&nbsp;&nbsp;&nbsp; Laporan Siswa</a>
                            </li>
                            <li>
                                <a  href="?act=laporan_guru">&nbsp;&nbsp;&nbsp; Laporan Guru</a>
                            </li>
                            <li>
                                <a  href="?act=laporan_jadwal">&nbsp;&nbsp;&nbsp; Laporan Jadwal</a>
                            </li>
                            <li>
                                <a  href="?act=laporan_nilai">&nbsp;&nbsp;&nbsp; Laporan Nilai</a>
                            </li>
                            <li>
                                <a  href="?act=laporan_kelas">&nbsp;&nbsp;&nbsp; Laporan Kelas</a>
                            </li>
                            <li>
                                <a  href="?act=laporan_mata_pelajaran">&nbsp;&nbsp;&nbsp; Laporan Mata Pelajaran</a>
                            </li>
                            <li>
                                <a  href="?act=absen_laporan">&nbsp;&nbsp;&nbsp; Laporan Presensi</a>
                            </li>
                            <li>
                                <a  href="?act=laporan_tata_usaha">&nbsp;&nbsp;&nbsp; Laporan Tata Usaha</a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>  