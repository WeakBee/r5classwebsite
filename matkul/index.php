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
    <link rel="shortcut icon" href="../assets/logo-biru-100px.png">
    <title>R5CLASS | KELAS</title>
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
            <div class="col-lg-1 kolom-kiri">
                <img src="../assets/Matkul/Folder_alt.svg" width="50px">
            </div>
            <div class="col-lg kolom-kanan">
                <div>
                    <h1>KELAS</h1>
                    <p>Pilih Mata Kuliah yang ingin kamu cari</p>
                </div>
            </div>
        </div>
        <div class="row row-card-matkul">
            <div class="col-12">
                <a href="./matkul1/">
                    <div class="card-matkul">
                        <img class="background-image" src="../assets/Matkul/image/Keamanan Komputer Image.webp">
                        <div><img class="image-icon" src="../assets/Matkul/CPU_light.svg"></div>
                        <p class="judul-matkul">Keamanan Komputer</p>
                        <p class="hari-matkul">Setiap Hari Senin</p>
                        <p class="jam-matkul">08:30 - 10:00</p>
                    </div>
                </a>
                <a href="./matkul2/">
                    <div class="card-matkul">
                        <img class="background-image" src="../assets/Matkul/image/Komputer Grafik Image.webp">
                        <div><img class="image-icon" src="../assets/Matkul/Edit_alt.svg"></div>
                        <p class="judul-matkul">Komputer Grafik</p>
                        <p class="hari-matkul">Setiap Hari Senin</p>
                        <p class="jam-matkul">08:30 - 10:00</p>
                    </div>
                </a>
                <a href="./matkul3/">
                    <div class="card-matkul">
                        <img class="background-image" src="../assets/Matkul/image/Rekayasa Perangkat Lunak Image.webp">
                        <div><img class="image-icon" src="../assets/Matkul/Server.svg"></div>
                        <p class="judul-matkul">Rekayasa Perangkat Lunak</p>
                        <p class="hari-matkul">Setiap Hari Senin</p>
                        <p class="jam-matkul">08:30 - 10:00</p>
                    </div>
                </a>
            </div>
            <div class="col-12">
                <a href="./matkul4/">
                    <div class="card-matkul">
                        <img class="background-image" src="../assets/Matkul/image/Riset Operasional Image.webp">
                        <div><img class="image-icon" src="../assets/Matkul/Search_alt.svg"></div>
                        <p class="judul-matkul">Riset Operasional</p>
                        <p class="hari-matkul">Setiap Hari Senin</p>
                        <p class="jam-matkul">08:30 - 10:00</p>
                    </div>
                </a>
                <a href="./matkul5/">
                    <div class="card-matkul">
                        <img class="background-image" src="../assets/Matkul/image/Etika Profesi Image.webp">
                        <div><img class="image-icon" src="../assets/Matkul/Tie_light_light.svg"></div>
                        <p class="judul-matkul">Etika Profesi</p>
                        <p class="hari-matkul">Setiap Hari Senin</p>
                        <p class="jam-matkul">08:30 - 10:00</p>
                    </div>
                </a>
                <a href="./matkul6/">
                    <div class="card-matkul">
                        <img class="background-image" src="../assets/Matkul/image/Filsafat Ilmu Image.webp">
                        <div><img class="image-icon" src="../assets/Matkul/Mortarboard_alt_light.svg"></div>
                        <p class="judul-matkul">Filsafat Ilmu</p>
                        <p class="hari-matkul">Setiap Hari Senin</p>
                        <p class="jam-matkul">08:30 - 10:00</p>
                    </div>
                </a>
            </div>
            <div class="col-12">
                <a href="./matkul7/">
                    <div class="card-matkul">
                        <img class="background-image" src="../assets/Matkul/image/E Commerce Image.webp">
                        <div><img class="image-icon" src="../assets/Matkul/Shop.svg"></div>
                        <p class="judul-matkul">E-Commerce</p>
                        <p class="hari-matkul">Setiap Hari Senin</p>
                        <p class="jam-matkul">08:30 - 10:00</p>
                    </div>
                </a>
                <a href="./matkul8/">
                    <div class="card-matkul">
                        <img class="background-image" src="../assets/Matkul/image/Sistem Berbasis Pengetahuan Image.webp">
                        <div><img class="image-icon" src="../assets/Matkul/Atom_light.svg"></div>
                        <p class="judul-matkul">Sistem Berbasis Pengetahuan</p>
                        <p class="hari-matkul">Setiap Hari Senin</p>
                        <p class="jam-matkul">08:30 - 10:00</p>
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