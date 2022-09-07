<?php 
    require '../functions.php';

    // ambil data dengan query
    $leaderboard = query("SELECT * FROM data_user ORDER BY Poin DESC");
    $nomer = 1;
    function evolusi($poin){
        if ($poin < 100){
            echo "1.png";
        }else if($poin < 200){
            echo "2.png";
        }else{
            echo "3.png";
        }
    }
    
    function KK($username){
        $KKVal = 0;
        $KK = query("SELECT * FROM data_aktivitas WHERE (Username='$username' AND Matkul='Keamanan Komputer' ) ");
        foreach ($KK as $baris) {
            $KKVal = $KKVal + $baris['Poin'];
        }
        echo $KKVal;
    }

    function KG($username){
        $KGVal = 0;
        $KG = query("SELECT * FROM data_aktivitas WHERE (Username='$username' AND Matkul='Komputer Grafik' ) ");
        foreach ($KG as $baris) {
            $KGVal = $KGVal + $baris['Poin'];
        }
        echo $KGVal;
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R5CLASS | LEADERBOARD</title>
    <link rel="shortcut icon" href="../assets/logo-biru-100px.png">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" href="../warna.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row row-judul">
            <div class="col-2 d-flex align-items-center">
                <a href="../" class="kembali"><img src="../assets/Tugas/Expand_left.svg"><span>Kembali</span></a>
            </div>
            <div class="col-8 text-center">
                <h1>LEADERBOARD</h1>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row-leaderboard">
            <?php foreach( $leaderboard as $orang) : ?>
                <div class="row list-leaderboard">
                    <div class="col-lg-1 nomor-list">#<?= $nomer ?></div>
                    <div class="col-lg-5 user-identity">
                        <img src="../assets/starter-pokemon/<?= $orang['Icon'] ?>/<?php evolusi($orang['Poin']) ?>">
                        <div>
                            <p class="nama"><?= $orang['NamaDepan'] . " " . $orang['NamaBelakang'] ?></p>
                            <p class="username">@<?= $orang['Username'] ?></p>
                        </div>
                    </div>
                    <div class="col-lg-5 ket-poin">
                        <div>
                            <p class="judul-matkul">KK</p>
                            <p class="poin-matkul"><?php KK($orang['Username']); ?></p>
                        </div>
                        <div>
                            <p class="judul-matkul">KG</p>
                            <p class="poin-matkul"><?php KG($orang['Username']); ?></p>
                        </div>
                        <div>
                            <p class="judul-matkul">RPL</p>
                            <p class="poin-matkul"><?php KK($orang['Username']); ?></p>
                        </div>
                        <div>
                            <p class="judul-matkul">RO</p>
                            <p class="poin-matkul"><?php KK($orang['Username']); ?></p>
                        </div>
                        <div>
                            <p class="judul-matkul">EP</p>
                            <p class="poin-matkul"><?php KK($orang['Username']); ?></p>
                        </div>
                        <div>
                            <p class="judul-matkul">FI</p>
                            <p class="poin-matkul"><?php KK($orang['Username']); ?></p>
                        </div>
                        <div>
                            <p class="judul-matkul">EC</p>
                            <p class="poin-matkul"><?php KK($orang['Username']); ?></p>
                        </div>
                        <div>
                            <p class="judul-matkul">SBP</p>
                            <p class="poin-matkul"><?php KK($orang['Username']); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-1 total-poin">
                        <p><?= $orang['Poin'] ?></p>
                    </div>
                </div>
                <?php $nomer = $nomer + 1; ?>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>