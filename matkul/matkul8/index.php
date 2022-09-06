<?php 
session_start();
require '../../functions.php';

//cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn,"SELECT Username FROM data_user WHERE ID = $id");

    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if($key === hash('sha256',$row['Username'])){
        $_SESSION['login'] = true;
        $_SESSION['id'] = $id;
    }
}

// Cek Login
if(!isset($_SESSION["login"])){
    header("Location: ../../login");
    exit;
}

$id = $_SESSION['id'];
$matkul= 'Komputer Grafik *)#)';

$tugasAktif = query("SELECT * FROM data_tugas WHERE (Status='aktif' AND Matkul = '$matkul') ORDER BY id DESC");
$tugasKelompok = query("SELECT * FROM data_tugas WHERE (Status='kelompok' AND Matkul = '$matkul') ORDER BY id DESC");
$tugasNon = query("SELECT * FROM data_tugas WHERE (Status='non' AND Matkul = '$matkul') ORDER BY id DESC");

$totalaktif = mysqli_num_rows($tugasAktif);
$totalKelompok = mysqli_num_rows($tugasKelompok);
$totalSelesai = mysqli_num_rows($tugasNon);

if ($totalaktif == '0'){
    $tugasaktifkosong = true;
}
if ($totalKelompok == '0'){
    $tugaskelompokkosong = true;
}
if ($totalSelesai == '0'){
    $tugasselesaikosong = true;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../assets/logo-biru-100px.png"/>
    <title>R5CLASS | KOMUNITAS</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="../../warna.css">
    <link rel="stylesheet" href="../../navbar.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
        <?php require '../../navbar3.php'; ?>
        <div class="row row-judul">
            <!-- Kalo mau ganti paling Asset sama tulisannya aja za -->
            <div class="col-lg-1 kolom-kiri">
                <img src="../../assets/Matkul/CPU_light.svg" width="60px">
            </div>
            <div class="col-lg kolom-kanan">
                <div>
                    <h1>Komputer Grafik *)#)</h1>
                    <p>Siti Anisah, S.Si., M.Kom | Jumat,15:30 - 18:00 WIB</p>
                </div>
            </div>
            <!-- Kalo mau ganti paling Asset sama tulisannya aja za -->
        </div>
        <div class="row row-nav-konten">
            <!-- Ini Tab Panel Atas -->
            <ul class="nav nav-tabs justify-content-center" id="myTab">
                <li class="nav-item">
                    <a href="#materi" class="nav-link active" data-bs-toggle="tab">Materi</a>
                </li>
                <li class="nav-item">
                    <a href="#tugas_mandiri" class="nav-link" data-bs-toggle="tab">Latihan</a>
                </li>
                <li class="nav-item">
                    <a href="#tugas_kelompok" class="nav-link" data-bs-toggle="tab">Tugas Kelompok</a>
                </li>
            </ul>
            <!-- Ini Tab Panel Atas -->

            <!-- Ini Tab Content Bawah -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="materi">
                    <h4 class="mt-2"></h4>
                    <div class="row">
                        <div class="kartutim col-lg-4">
                            <a href="">
                                <div class="card">
                                    <div class="kartu">
                                        <img src="../../assets/Matkul/image/Keamanan Komputer Image.webp">
                                        <div class="ket-materi">
                                            <h3>Materi 1</h3>
                                            <p>Persamaan Variabel</p>
                                            <p>14 Agustus 2022</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="kartutim col-lg-4">
                            <a href="">
                                <div class="card">
                                    <div class="kartu">
                                        <img src="../../assets/Matkul/image/Keamanan Komputer Image.webp">
                                        <div class="ket-materi">
                                            <h3>Materi 1</h3>
                                            <p>Persamaan Variabel</p>
                                            <p>14 Agustus 2022</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="kartutim col-lg-4">
                            <a href="">
                                <div class="card">
                                    <div class="kartu">
                                        <img src="../../assets/Matkul/image/Keamanan Komputer Image.webp">
                                        <div class="ket-materi">
                                            <h3>Materi 1</h3>
                                            <p>Persamaan Variabel</p>
                                            <p>14 Agustus 2022</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="kartutim col-lg-4">
                            <a href="">
                                <div class="card">
                                    <div class="kartu">
                                        <img src="../../assets/Matkul/image/Keamanan Komputer Image.webp">
                                        <div class="ket-materi">
                                            <h3>Materi 1</h3>
                                            <p>Persamaan Variabel</p>
                                            <p>14 Agustus 2022</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="kartutim col-lg-4">
                            <a href="">
                                <div class="card">
                                    <div class="kartu">
                                        <img src="../../assets/Matkul/image/Keamanan Komputer Image.webp">
                                        <div class="ket-materi">
                                            <h3>Materi 1</h3>
                                            <p>Persamaan Variabel</p>
                                            <p>14 Agustus 2022</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tugas_mandiri">
                    <h4 class="mt-2"></h4>
                    <div class="row row-tugas-aktif">
                        <h1>TUGAS AKTIF</h1>
                        <p class="ket-judul">Tugas yang belum melewati batas akhir pengumpulan (Deadline)</p>
                        <?php if(isset($tugasaktifkosong)) :  ?>
                            <div class="col-12 tugas-matkul-kosong">
                                <h3>Tugas Belum Tersedia</h3>
                            </div>
                        <?php endif; ?>
                        <?php if(!isset($tugasaktifkosong)) :  ?>
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
                                        <a href="<?= $row['Link'] ?>"><button><img src="../../assets/Tugas/Edit.svg"> Ngerjain Kuy</button></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="row row-tugas-nonaktif">
                        <h1>TUGAS NON-AKTIF</h1>
                        <p class="ket-judul">Tugas yang telah melewati batas akhir pengumpulan (Deadline)</p>
                        <?php if(isset($tugasselesaikosong)) :  ?>
                            <div class="col-12 tugas-matkul-kosong">
                                <h3>Tugas Belum Tersedia</h3>
                            </div>
                        <?php endif; ?>
                        <?php if(!isset($tugasselesaikosong)) :  ?>
                            <?php foreach( $tugasNon as $row) : ?>
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
                                        <a href="<?= $row['Link'] ?>"><button><img src="../../assets/Tugas/Eye.svg"> Lihat Tugas</button></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="tugas_kelompok">
                    <h4 class="mt-2"></h4>
                    <?php if(isset($tugaskelompokkosong)) :  ?>
                        <div class="col-12 tugas-matkul-kosong">
                            <h3>Tugas Belum Tersedia</h3>
                        </div>
                    <?php endif; ?>
                    <?php if(!isset($tugaskelompokkosong)) :  ?>
                        <?php foreach( $tugasKelompok as $row) : ?>
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
                                <div class="ngerjain sub-tugas">
                                    <a href="<?= $row['Link'] ?>"><button><img src="../../assets/Tugas/File_dock_search.svg"> Lihat Penjelasan Tugas</button></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Ini Tab Content Bawah -->
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS -->
    <script src="../../navbar.js"></script>
  </body>
</html>