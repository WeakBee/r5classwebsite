<?php 
    require '../functions.php';
    // ambil data dengan query
    $tugas = query("SELECT * FROM tugas");
    $tugasAktif = query("SELECT * FROM tugas WHERE Status='aktif'");
    $tugasKelompok = query("SELECT * FROM tugas WHERE Status='kelompok'");
    $tugasNon = query("SELECT * FROM tugas WHERE Status='non'");

    $total = mysqli_num_rows($tugas);
    $totalKelompok = mysqli_num_rows($tugasKelompok);
    $totalSelesai = mysqli_num_rows($tugasNon);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/logo-biru-100px.png"/>
    <title>R5CLASS | TUGAS</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="../warna.css">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
        <div class="nav-bar">
            <div class="logo">
                <img src="../assets/Navbar/icon-white.png" width="30px">
                <span>R5CLASS</span>
            </div>
            <a href="../">
                <div>
                    <img src="../assets/Navbar/dashboard.png">
                    <span>Dashboard</span>
                </div>
            </a>
            <a href="../komunitas/">
                <div>
                    <img src="../assets/Navbar/komunitas.png">
                    <span>Komunitas</span>
                </div>
            </a>
            <a href="../tugas/">
                <div>
                    <img src="../assets/Navbar/tugas.png">
                    <span>Tugas</span>
                </div>
            </a>
            <a href="../hubungi-kami/">
                <div>
                    <img src="../assets/Navbar/hubungikami.png">
                    <span>Hubungi Kami</span>
                </div>
            </a>
            <a href="../pengaturan/">
                <div>
                    <img src="../assets/Navbar/pengaturan.png">
                    <span>Pengaturan</span>
                </div>
            </a>
            <a href="../matkul/">
                <div>
                    <img src="../assets/Navbar/matkul.png">
                    <span>Kelas</span>
                </div>
            </a>
            <a href="../login/">
                <div>
                    <img src="../assets/Navbar/Sign_out_squre.png">
                    <span>Logout</span>
                </div>
            </a>
        </div>
        <div class="row row-judul">
            <div class="col-lg-8 kolom-kiri">
                <h1>TUGAS</h1>
                <p>Pastikan anda telah membaca instruksi atau petunjuk pengerjaan tugas ,sebelum membuka dokumen tugas yang tersedia di bawah agar tidak menyulitkan yang lain</p>
            </div>
            <div class="col-lg kolom-kanan">
                <button class="button-intruksi"><img src="../assets/Tugas/archives_group_docks.png"> Instruksi Pengerjaan Tugas</button>
            </div>
        </div>
        <div class="row row-rangkuman">
            <div class="row-inside-rangkuman">
                <div class="kolom-kiri">
                    <div class="judul-rangkuman"><img src="../assets/Tugas/desk_alt.png"><span>Rangkuman Estimasi Tugas</span></div>
                    <div class="dek-kartu">
                        <div class="kartu kartu1">
                            <img src="../assets/Tugas/paper.png">
                            <p>Total<br>Tugas</p>
                            <h1><?= $total?></h1>
                        </div>
                        <div class="kartu kartu2">
                            <img src="../assets/Tugas/group.png">
                            <p>Tugas<br>Kelompok</p>
                            <h1><?= $totalKelompok?></h1>
                        </div>
                        <div class="kartu kartu3">
                            <img src="../assets/Tugas/checklist.png">
                            <p>Tugas<br>Terselesaikan</p>
                            <h1><?= $totalSelesai?></h1>
                        </div>
                    </div>
                </div>
                <div class="kolom-kanan">
                    <p class="peserta-terbaik">Peserta Terbaik</p>
                    <div class="profil-box">
                        <div class="rank">#1</div>
                        <div class="data-profil">
                            <p>Irsyad Sunarko</p>
                            <p><span>@aksara <img src="../assets/icon-filter/bulbasaur/venusaur.png"></span></p>
                        </div>
                    </div>
                    <div class="profil-box">
                        <div class="rank">#2</div>
                        <div class="data-profil">
                            <p>Ichwanul Muslim</p>
                            <p><span>@weakbee <img src="../assets/icon-filter/caterpie/butterfree.png"></span></p>
                        </div>
                    </div>
                    <div class="profil-box">
                        <div class="rank">#3</div>
                        <div class="data-profil">
                            <p>Batara Putra</p>
                            <p><span>@ryouma <img src="../assets/icon-filter/charmender/charizard.png"></span></p>
                        </div>
                    </div>
                    <div class="profil-box">
                        <div class="rank">#4</div>
                        <div class="data-profil">
                            <p>Abima Putra</p>
                            <p><span>@renzen <img src="../assets/icon-filter/pikachu/raichu.png"></span></p>
                        </div>
                    </div>
                    <div class="profil-box">
                        <div class="rank">#5</div>
                        <div class="data-profil">
                            <p>Baihaqi Yulian</p>
                            <p><span>@qqoi <img src="../assets/icon-filter/squirtle/blastoise.png"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-judul-tugas">
            <div class="col-lg-8 kolom-kiri">
                <h1>TUGAS AKTIF</h1>
                <p>Tugas yang belum melewati batas akhir pengumpulan (Deadline)</p>
            </div>
            <div class="col-lg-4 kolom-kanan">
                <a href="./lihat-semua-tugas/">Lihat Semua Tugas <img src="../assets/Tugas/Expand_right.png"></a>
            </div>
        </div>
        <div class="row row-tugas">
            <?php foreach( $tugasAktif as $row) : ?>
                <div class="col-12 tugas-matkul">
                <div class="matkul sub-tugas">
                    <p><b><?= $row['Matkul'] ?> </b></p>
                    <p><?= $row['Keterangan'] ?></p>
                </div>
                <div class="diberikan sub-tugas">
                    <p>Diberikan :</p>
                    <p><b><?= $row['Diberikan'] ?></b></p>
                </div>
                <div class="dikumpulkan sub-tugas">
                    <p>Dikumpulkan :</p>
                    <p><b><?= $row['Dikumpulkan'] ?></b></p>
                </div>
                <div class="selesai sub-tugas">
                    <p><b><?= $row['Persentase'] ?>%</b> Selesai</p>
                    <div class="persentase">
                        <div class="fill" style="width: <?= $row['Persentase'] ?>%;"></div>
                    </div>
                </div>
                <div class="ngerjain sub-tugas">
                    <a href="<?= $row['Link'] ?>"><button><img src="../assets/Tugas/edit.png"> Ngerjain Kuy</button></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS -->
  </body>
</html>