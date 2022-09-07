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

    function RPL($username){
        $RPLVal = 0;
        $RPL = query("SELECT * FROM data_aktivitas WHERE (Username='$username' AND Matkul='Rekayasa Perangkat Lunak' ) ");
        foreach ($RPL as $baris) {
            $RPLVal = $RPLVal + $baris['Poin'];
        }
        echo $RPLVal;
    }
    
    function RO($username){
        $ROVal = 0;
        $RO = query("SELECT * FROM data_aktivitas WHERE (Username='$username' AND Matkul='Riset Operasional' ) ");
        foreach ($RO as $baris) {
            $ROVal = $ROVal + $baris['Poin'];
        }
        echo $ROVal;
    }

    function EP($username){
        $EPVal = 0;
        $EP = query("SELECT * FROM data_aktivitas WHERE (Username='$username' AND Matkul='Etika Profesi' ) ");
        foreach ($EP as $baris) {
            $EPVal = $EPVal + $baris['Poin'];
        }
        echo $EPVal;
    }

    function FI($username){
        $FIVal = 0;
        $FI = query("SELECT * FROM data_aktivitas WHERE (Username='$username' AND Matkul='Filsafat Ilmu' ) ");
        foreach ($FI as $baris) {
            $FIVal = $FIVal + $baris['Poin'];
        }
        echo $FIVal;
    }

    function EC($username){
        $ECVal = 0;
        $EC = query("SELECT * FROM data_aktivitas WHERE (Username='$username' AND Matkul='E-Commerce' ) ");
        foreach ($EC as $baris) {
            $ECVal = $ECVal + $baris['Poin'];
        }
        echo $ECVal;
    }

    function SBP($username){
        $SBPval = 0;
        $SBP = query("SELECT * FROM data_aktivitas WHERE (Username='$username' AND Matkul='Sistem Berbasis Pengetahuan' ) ");
        foreach ($SBP as $baris) {
            $SBPval = $SBPval + $baris['Poin'];
        }
        echo $SBPval;
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
                        <div class="boxnama-username">
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
                            <p class="poin-matkul"><?php RPL($orang['Username']); ?></p>
                        </div>
                        <div>
                            <p class="judul-matkul">RO</p>
                            <p class="poin-matkul"><?php RO($orang['Username']); ?></p>
                        </div>
                        <div>
                            <p class="judul-matkul">EP</p>
                            <p class="poin-matkul"><?php EP($orang['Username']); ?></p>
                        </div>
                        <div>
                            <p class="judul-matkul">FI</p>
                            <p class="poin-matkul"><?php FI($orang['Username']); ?></p>
                        </div>
                        <div>
                            <p class="judul-matkul">EC</p>
                            <p class="poin-matkul"><?php EC($orang['Username']); ?></p>
                        </div>
                        <div>
                            <p class="judul-matkul">SBP</p>
                            <p class="poin-matkul"><?php SBP($orang['Username']); ?></p>
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