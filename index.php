<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ./login");
    exit;
}

require 'functions.php';
$id = $_SESSION['id'];

// AMBIL DATA USER YANG LOGIN
$user_id = mysqli_query($conn, "SELECT * FROM data_user WHERE ID = '$id'");

// AMBIL DATA SEMUA USER DAN DIURUTKAN BERDASARKAN POIN TERBESAR KE TERKECIL
$userrank = mysqli_query($conn, "SELECT * FROM data_user ORDER BY Poin DESC");

// AMBIL DATA 8 USER DAN DIURUTKAN BERDASARKAN POIN TERBESAR KE TERKECIL
$leaderboard = mysqli_query($conn, "SELECT * FROM data_user ORDER BY Poin DESC LIMIT 8");

// UNTUK MENGHITUNG RANK KEBERAPA USER YANG LOGIN
$ranknum = 1;
foreach ($userrank as $value) {
    if($value['ID'] == $id){
        $rank = $ranknum;
    }
    $ranknum = $ranknum + 1;
}

$row = mysqli_fetch_assoc($user_id);
$nomor = 1;

// Evolusi Pokemon
if ($row['Poin'] < 100){
    $evolusi = "1.png";
}else if($row['Poin'] < 200){
    $evolusi = "2.png";
}else {
    $evolusi = "3.png";
}

// AKTIVITAS
$usernameaktivitas = $row['Username'];
$aktivitas = mysqli_query($conn, "SELECT * FROM data_aktivitas WHERE Username = '$usernameaktivitas'");

$totalaktivitas = mysqli_num_rows($aktivitas);

// JIKA USER BLM MEMILIKI AKTIVITAS
if ($totalaktivitas == '0'){
    $aktivitaskosong = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- BOOTSTRAP CSS -->
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- JQUERY -->
    <link rel="stylesheet" href="warna.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/logo-biru-100px.png">
    <title>R5CLASS | DASHBOARD</title>
</head>

<body>
    <div class="container">
        <?php require './navbar.php'; ?>
        <div class="row">
            <!-- KOLOM KIRI -->
            <div class="col-lg-9 kolom-kiri">
                <!-- WAKTU -->
                <div class="greeting-box">   
                    <h3 id="greeting"><span class="greetspan"></span> <span><?php echo $row['NamaDepan'] ?></span></h3>
                    <p id="time"></p>
                </div>

                <!-- AKTIVITAS -->
                <div class="aktivitas">
                    <h4 class="judul"><u>A</u>KTIVITAS</h4>
                    <div class="scroll">
                        <?php if(isset($aktivitaskosong)) :  ?>
                            <div class="list-kosong align-items-center">
                                <h3>Anda Belum Memiliki Aktivitas</h3>
                            </div>
                        <?php endif; ?>
                        <?php foreach( $aktivitas as $rowaktiv) : ?>
                            <div class="list align-items-center">
                                <div class="poin">+<?= $rowaktiv['Poin'] ?></div> 
                                <div class="ket-poin">Mengerjakan Soal no <?= $rowaktiv['Nomor'] ?> , Mata Kuliah <?= $rowaktiv['Matkul'] ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- AKTIVITAS -->

                <!-- MATKUL -->
                <h4 class="judul"><u>M</u>ATKUL HARI INI</h4>
                <!-- Senin -->
                <div class="matkul senin">
                    <a href="./matkul/matkul1">
                        <div class="card">
                            <img src="./assets/Matkul/image/Keamanan Komputer Image.webp">
                            <div class="content">
                                <h5 class="card-title">Keamanan Komputer</h5>
                                <p>12:30 - 14:10 WIB</p>
                                <p>Pertemuan 1</p>
                            </div>
                        </div>
                    </a>
                    <a href="./matkul/matkul6">
                        <div class="card">
                            <img src="./assets/Matkul/image/Filsafat Ilmu Image.webp">
                            <div class="content">
                                <h5 class="card-title">Filsafat Ilmu</h5>
                                <p>14:10 - 15:50 WIB</p>
                                <p>Pertemuan 1</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Senin -->
                <!-- Selasa -->
                <div class="matkul selasa">
                    <a href="./matkul/matkul7">
                        <div class="card">
                            <img src="./assets/Matkul/image/E Commerce Image.webp">
                            <div class="content">
                                <h5 class="card-title">E-Commerce</h5>
                                <p>12:30 - 14:10 WIB</p>
                                <p>Pertemuan 1</p>
                            </div>
                        </div>
                    </a>
                    <a href="./matkul/matkul4">
                        <div class="card">
                            <img src="./assets/Matkul/image/Riset Operasional Image.webp">
                            <div class="content">
                                <h5 class="card-title">Riset Operasional</h5>
                                <p>14:10 - 16:40 WIB</p>
                                <p>Pertemuan 1</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Selasa -->
                <!-- Kamis -->
                <div class="matkul kamis">
                    <a href="./matkul/matkul8">
                        <div class="card">
                            <img src="./assets/Matkul/image/Sistem Berbasis Pengetahuan Image.webp">
                            <div class="content">
                                <h5 class="card-title">Sistem Berbasis Pengetahuan</h5>
                                <p>12:30 - 14:10 WIB</p>
                                <p>Pertemuan 1</p>
                            </div>
                        </div>
                    </a>
                    <a href="./matkul/matkul5">
                        <div class="card">
                            <img src="./assets/Matkul/image/Etika Profesi Image.webp">
                            <div class="content">
                                <h5 class="card-title">Etika Profesi</h5>
                                <p>14:10 - 15:50 WIB</p>
                                <p>Pertemuan 1</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Kamis -->
                <!-- Jumat -->
                <div class="matkul jumat">
                    <a href="./matkul/matkul3">
                        <div class="card">
                            <img src="./assets/Matkul/image/Rekayasa Perangkat Lunak Image.webp">
                            <div class="content">
                                <h5 class="card-title">Rekayasa Perangkat Lunak</h5>
                                <p>13:00 - 15:30 WIB</p>
                                <p>Pertemuan 1</p>
                            </div>
                        </div>
                    </a>
                    <a href="./matkul/matkul2">
                        <div class="card">
                            <img src="./assets/Matkul/image/Komputer Grafik Image.webp">
                            <div class="content">
                                <h5 class="card-title">Komputer Grafik</h5>
                                <p>15:30 - 18:00 WIB</p>
                                <p>Pertemuan 1</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Jumat -->
                <!-- ELSE -->
                <div class="matkul else">
                    <div class="card">
                        <img src="./assets/Matkul/image/nothing.jpg">
                        <div class="content">
                            <h5 class="card-title">Tidak Ada Matkul Hari ini</h5>
                        </div>
                    </div>
                </div>
                <!-- ELSE -->
            </div>
            <!-- KOLOM KIRI -->

            <!-- KOLOM KANAN -->
            <div class="col-lg-3 kolom-kanan">
                <h5 class="profile text-center">Profile</h5>
                <div class="">
                    <img src="./assets/starter-pokemon/<?= $row['Icon'] ?>/<?= $evolusi ?>" class="profile-image">
                </div>
                <div class="name">
                    <h4 class="text-center"><?php echo $row['NamaDepan'] . " " . $row['NamaBelakang'] ?> </h4>
                    <p class="text-center">@<?= $row['Username'] ?> </p>
                </div>
                <div class="stats mb-3">
                    <div class="d-flex justify-content-center stats-judul">
                        <div>Rank</div>
                        <div>Poin</div>
                        <div>Matkul</div>
                    </div>
                    <div class="d-flex justify-content-center stats-angka">
                        <div><?= $rank ?></div>
                        <div><?= $row['Poin'] ?></div>
                        <div>8</div>
                    </div>
                </div>
                <div class="leaderboard pt-3">
                    <h5 class="text-center mb-3">Leaderboard</h5>
                    <?php foreach( $leaderboard as $rowleader) : ?>
                        <div class="list-leaderboard d-flex justify-content-evenly">
                            <div class="rank p-2"><?= $nomor ?>.</div>
                            <div class="user p-2">@<?= $rowleader['Username'] ?> </div>
                            <div class="point p-2"><?= $rowleader['Poin'] ?></div>
                        </div>
                        <?php $nomor = $nomor + 1; ?>
                    <?php endforeach; ?>
                    <a href="" class="lihat-semua"><p>Lihat Semua</p></a>
                </div>
                <div class="btn-setting">
                    <a href="./pengaturan/">
                        <button class="">Pengaturan</button>
                    </a>
                </div>
            </div>
            <!-- KOLOM KANAN -->
        </div>

        <div class="button-responsive">
            <img src="./assets/Dashboard/User_cicrle.svg" width="90px">
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS -->

    <script src="app.js"></script>
    <script src="navbar.js"></script>
</body>

</html>

<!-- Jangan dihapus ya -->

<!-- <div class="leaderboard">
                    <ul class="list-group">
                        <li class="list-group-item disabled text-center">Leaderboards</li>
                        <li class="satu list-group-item">aksara</li>
                        <li class="dua list-group-item">weakbee</li>
                        <li class="tiga list-group-item">renzeen</li>
                        <li class="list-group-item">qqoi</li>
                        <li class="list-group-item">johan</li>
                    </ul>
                </div> -->