<?php 
session_start();
require '../functions.php';

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
    header("Location: ../login");
    exit;
}

$id = $_SESSION['id'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/logo-biru-100px.png"/>
    <title>R5CLASS | KOMUNITAS</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="../warna.css">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
        <?php require '../navbar2.php'; ?>
        <div class="row row-judul">
            <h1>KOMUNITAS</h1>
            <p>Ayo Ngobrol Bareng di Meet yang kamu pilih</p>
        </div>
        <div class="row row-motivasi">
            <div class="center-row">
                <!-- Disini gam lanjutin Card Motivasinya -->
                <div class="card-motivasi text-center">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h2>Motivasi Hari ini</h2>
                                <p>Proses Tidak Akan Mengkhianati Hasil.</p>
                            </div>
                            <div class="carousel-item">
                                <h2>Motivasi Hari ini</h2>
                                <p>Jika Anda berpikir pendidikan itu mahal, coba perkirakan biaya ketidaktahuan.</p>
                            </div>
                            <div class="carousel-item">
                                <h2>Motivasi Hari ini</h2>
                                <p>Masa depan adalah milik mereka yang menyiapkan hari ini.</p>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <p class="nyumbang">Mau nyumbang Motivasi? <a class="link-motivasi" href="">Klik Disini</a></p>
                <!-- Disini gam lanjutin Card Motivasinya -->
            </div>
        </div>
        <div class="row-row-meet">
            <!-- Lanjutin Disini Gam , nanti copy sampe card nya ada 9 -->
            <a href="">
                <div class="card-meet">
                    <div class="card-meet-keterangan">
                        <h3>K. Komputer</h3>
                        <p>Setiap Senin</p>
                        <p>12:30 - 14:10</p>
                    </div>
                    <img class="gambar-card" src="../assets/Komunitas/rkuliah.webp">
                </div>
            </a>
            <!-- Lanjutin Disini Gam -->
            <a href="">
                <div class="card-meet">
                    <div class="card-meet-keterangan">
                        <h3>Filsafat Ilmu</h3>
                        <p>Setiap Senin</p>
                        <p>14:10 - 15:50</p>
                    </div>
                    <img class="gambar-card" src="../assets/Komunitas/rkuliah2.webp">
                </div>
            </a>
            <a href="">
                <div class="card-meet">
                    <div class="card-meet-keterangan">
                        <h3>E-Commerce</h3>
                        <p>Setiap Selasa</p>
                        <p>12:30 - 14:10</p>
                    </div>
                    <img class="gambar-card" src="../assets/Komunitas/rkuliah3.webp">
                </div>
            </a>           
            <a href="">
                <div class="card-meet">
                    <div class="card-meet-keterangan">
                        <h3>Riset Operasional</h3>
                        <p>Setiap Selasa</p>
                        <p>14:10 - 16:40</p>
                    </div>
                    <img class="gambar-card" src="../assets/Komunitas/rkuliah4.webp">
                </div>
            </a>
            <a href="">
                <div class="card-meet">
                    <div class="card-meet-keterangan">
                        <h3>SBP</h3>
                        <p>Setiap Kamis</p>
                        <p>12:30 - 14:10</p>
                    </div>
                    <img class="gambar-card" src="../assets/Komunitas/rkuliah5.webp">
                </div>
            </a>
            <a href="">
                <div class="card-meet">
                    <div class="card-meet-keterangan">
                        <h3>Etika Profesi</h3>
                        <p>Setiap Kamis</p>
                        <p>14:10 - 15:50</p>
                    </div>
                    <img class="gambar-card" src="../assets/Komunitas/rkuliah6.webp">
                </div>
            </a>
            <a href="">
                <div class="card-meet">
                    <div class="card-meet-keterangan">
                        <h3>RPL</h3>
                        <p>Setiap Jum'at</p>
                        <p>13:00 - 15:30</p>
                    </div>
                    <img class="gambar-card" src="../assets/Komunitas/rkuliah7.webp">
                </div>
            </a>
            <a href="">
                <div class="card-meet">
                    <div class="card-meet-keterangan">
                        <h3>Komp Grafik</h3>
                        <p>Setiap Jum'at</p>
                        <p>15:30 - 18:00</p>
                    </div>
                    <img class="gambar-card" src="../assets/Komunitas/rkuliah8.webp">
                </div>
            </a>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS -->
    <script src="../navbar.js"></script>
  </body>
</html>