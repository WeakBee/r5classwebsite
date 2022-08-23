<?php 
    require '../../functions.php';
    // ambil data dengan query
    $tugasAktif = query("SELECT * FROM data_tugas WHERE Status='aktif'ORDER BY id DESC");
    $tugasKelompok = query("SELECT * FROM data_tugas WHERE Status='kelompok'ORDER BY id DESC");
    $tugasNon = query("SELECT * FROM data_tugas WHERE Status='non'ORDER BY id DESC");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../assets/logo-biru-100px.png"/>
    <title>R5CLASS | TUGAS</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="../../warna.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
        <a class="kembali" href="../"><div><img src="../../assets/Tugas/Expand_left.png"> Kembali</div></a>

        <div class="row row-tugas-aktif">
            <h1>TUGAS AKTIF</h1>
            <p class="ket-judul">Tugas yang belum melewati batas akhir pengumpulan (Deadline)</p>
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
                    <a href="<?= $row['Link'] ?>"><button><img src="../../assets/Tugas/edit.png"> Ngerjain Kuy</button></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="row row-tugas-kelompok">
            <h1>TUGAS KELOMPOK</h1>
            <p class="ket-judul">Tugas yang dikerjakan lebih dari satu orang (per kelompok)</p>
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
                    <a href="<?= $row['Link'] ?>"><button><img src="../../assets/Tugas/File_dock_search.png"> Lihat Penjelasan Tugas</button></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="row row-tugas-nonaktif">
            <h1>TUGAS NON-AKTIF</h1>
            <p class="ket-judul">Tugas yang telah melewati batas akhir pengumpulan (Deadline)</p>
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
                    <a href="<?= $row['Link'] ?>"><button><img src="../../assets/Tugas/Eye.png"> Lihat Tugas</button></a>
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