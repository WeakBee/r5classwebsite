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

    // CEK LOGIN
    if(!isset($_SESSION["login"])){
        header("Location: ../login");
        exit;
    }

    $id = $_SESSION['id'];
    // ambil data dengan query
    $tugas = query("SELECT * FROM data_tugas");
    $tugasAktif = query("SELECT * FROM data_tugas WHERE Status='aktif' ORDER BY id DESC");
    $tugasKelompok = query("SELECT * FROM data_tugas WHERE Status='kelompok'");
    $tugasNon = query("SELECT * FROM data_tugas WHERE Status='non'");

    $total = mysqli_num_rows($tugas);
    $totalaktif = mysqli_num_rows($tugasAktif);
    $totalKelompok = mysqli_num_rows($tugasKelompok);
    $totalSelesai = mysqli_num_rows($tugasNon);

    if ($totalaktif == '0'){
        $tugasaktifkosong = true;
    }

    // AMBIL DATA 5 USER DAN DIURUTKAN BERDASARKAN POIN TERBESAR KE TERKECIL
    $leaderboard = mysqli_query($conn, "SELECT * FROM data_user ORDER BY Poin DESC LIMIT 5");
    $nomor = 1;

    // Evolusi Pokemon
    function evolusi($poin){
        if ($poin < 100){
            echo "1.png";
        }else if($poin < 200){
            echo "2.png";
        }else{
            echo "3.png";
        }
    }
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
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- JQUERY -->
    <link rel="stylesheet" href="../warna.css">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
        <?php require '../navbar2.php'; ?>
        <div class="row row-judul">
            <div class="col-lg-8 kolom-kiri">
                <h1>TUGAS</h1>
                <p>Pastikan anda telah membaca instruksi atau petunjuk pengerjaan tugas ,sebelum membuka dokumen tugas yang tersedia di bawah agar tidak menyulitkan yang lain</p>
            </div>
            <div class="col-lg kolom-kanan">
                <a href="./instruksi-tugas">
                    <button class="button-intruksi"><img class="gambar-intruksi" src="../assets/Tugas/Arhives_group_docks.svg"> Instruksi Pengerjaan Tugas</button>
                </a>
            </div>
        </div>
        <div class="row row-rangkuman">
            <div class="row-inside-rangkuman">
                <div class="kolom-kiri">
                    <div class="judul-rangkuman"><img src="../assets/Tugas/Desk_alt.svg"><span>Rangkuman Estimasi Tugas</span></div>
                    <div class="dek-kartu">
                        <div class="kartu kartu1">
                            <img src="../assets/Tugas/paper.svg">
                            <p>Total<br>Tugas</p>
                            <h1><?= $total?></h1>
                        </div>
                        <div class="kartu kartu2">
                            <img src="../assets/Tugas/group.svg">
                            <p>Tugas<br>Kelompok</p>
                            <h1><?= $totalKelompok?></h1>
                        </div>
                        <div class="kartu kartu3">
                            <img src="../assets/Tugas/checklist.svg">
                            <p>Tugas<br>Terselesaikan</p>
                            <h1><?= $totalSelesai?></h1>
                        </div>
                    </div>
                </div>
                <div class="kolom-kanan">
                    <p class="peserta-terbaik">Peserta Terbaik</p>
                    <?php foreach( $leaderboard as $rowterbaik) : ?>
                        <div class="profil-box">
                            <div class="rank">#<?= $nomor ?></div>
                            <div class="data-profil">
                                <p><?= $rowterbaik['NamaDepan'] . " " . $rowterbaik['NamaBelakang'] ?></p>
                                <p><span>@<?= $rowterbaik['Username'] ?></span></p>
                            </div>
                            <img src="../assets/starter-pokemon/<?= $rowterbaik['Icon'] ?>/<?php evolusi($rowterbaik['Poin']); ?>">
                        </div>
                        <?php $nomor = $nomor + 1; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="row row-judul-tugas">
            <div class="col-lg-8 kolom-kiri">
                <h1>TUGAS AKTIF</h1>
                <p>Tugas yang belum melewati batas akhir pengumpulan (Deadline)</p>
            </div>
            <div class="col-lg-4 kolom-kanan">
                <a href="./lihat-semua-tugas/">Lihat Semua Tugas <img src="../assets/Tugas/Expand_right.svg"></a>
            </div>
        </div>
        <div class="row row-tugas">
            <?php if(isset($tugasaktifkosong)) :  ?>
                <div class="col-12 tugas-matkul-kosong">
                    <h3>Tugas Belum Tersedia</h3>
                </div>
            <?php endif; ?>
            <?php if(!isset($tugasaktifkosong)) : ?>
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
                            <a href="<?= $row['Link'] ?>"><button><img src="../assets/Tugas/Edit.svg"> Ngerjain Kuy</button></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS -->

    <script>
        $( ".button-intruksi" ).hover(
            function() {
                $(".gambar-intruksi").attr("src","../assets/Tugas/Arhives_group_docks2.svg");
            }, function() {
                $(".gambar-intruksi").attr("src","../assets/Tugas/Arhives_group_docks.svg");
            }
        );
    </script>
    <script src="../navbar.js"></script>
  </body>
</html>