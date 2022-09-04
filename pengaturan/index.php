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

// AMBIL DATA USER YANG LOGIN
$user_id = mysqli_query($conn, "SELECT * FROM data_user WHERE ID = '$id'");
$row = mysqli_fetch_assoc($user_id);


if (isset($_POST["simpan"])){
    $pokemon = $_POST["pokemon"];
    $namaDepan = $_POST["namaDepan"];
    $namaBelakang = $_POST["namaBelakang"];
    $password = $_POST["password"];

    if(password_verify($password, $row["Password"])){
        mysqli_query($conn, "UPDATE data_user SET Icon='$pokemon' WHERE id='$id'");
        mysqli_query($conn, "UPDATE data_user SET NamaDepan='$namaDepan' WHERE id='$id'");
        mysqli_query($conn, "UPDATE data_user SET NamaBelakang='$namaBelakang' WHERE id='$id'");

        header("Location: ../");
        exit;
    }
    $error = true;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/logo-biru-100px.png"/>
    <title>R5CLASS | PENGATURAN</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="../warna.css">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="pokemon.css">
  </head>
  <body>
    <div class="container">
        <?php require '../navbar2.php'; ?>
        <?php if(isset($error)) : ?>
            <div class="error">
                <div class="red-attr"></div>
                <div>
                    <img src="../assets/Register/error.svg">
                </div>
                <div>
                    <h3>Error</h3>
                    <p>Password salah oy!</p>
                </div>
            </div>
        <?php endif; ?>
        <div class="row row-judul">
            <h1>PENGATURAN</h1>
            <p>Ubah dan Lihat detail akun anda disini</p>
        </div>
        <form action="" method="post">
            <div class="row row-icon">
                <div class="col-lg-4 kolom-kiri">
                    <p>Profil Pokemon Anda</p>
                    <p>Ini akan di tampilkan di profil anda</p>
                </div>
                <div class="col-lg-4 kolom-tengah">
                    <img class="pokemon-icon" pokemon="<?= $row['Icon'] ?>"><br>
                    <p id="Pokemonshowtext"><?= $row['Icon'] ?></p>
                    <p>Pokemon anda akan berevolusi seiring dengan peningkatan Poin</p>
                    <input id="Pokemon" type="text" value="<?= $row['Icon'] ?>" name="pokemon">
                </div>
                <div class="col-lg-4 kolom-kanan">
                    <div class="hapus">Hapus</div>
                    <div class="ubah">Pilih <img src="../assets/Pengaturan/Expand_down.svg" width="15px"></div>
                    <div class="pilih-icon">
                        <div class="dek-kartu">
                            <div class="row-dekkartu">
                                <div class="kartu-icon" pokemon="abra">
                                    <img src="../assets/starter-pokemon/abra/1.png">
                                    <p>Abra</p>
                                </div>
                                <div class="kartu-icon" pokemon="aron">
                                    <img src="../assets/starter-pokemon/aron/1.png">
                                    <p>Aron</p>
                                </div>
                                <div class="kartu-icon" pokemon="axew">
                                    <img src="../assets/starter-pokemon/axew/1.png">
                                    <p>Axew</p>
                                </div>
                                <div class="kartu-icon" pokemon="bulbasaur">
                                    <img src="../assets/starter-pokemon/bulbasaur/1.png">
                                    <p>Bulbasaur</p>
                                </div>
                            </div>
                            <div class="row-dekkartu">
                                <div class="kartu-icon" pokemon="charmander">
                                    <img src="../assets/starter-pokemon/charmander/1.png">
                                    <p>Charmander</p>
                                </div>
                                <div class="kartu-icon" pokemon="chikorita">
                                    <img src="../assets/starter-pokemon/chikorita/1.png">
                                    <p>Chikorita</p>
                                </div>
                                <div class="kartu-icon" pokemon="chimchar">
                                    <img src="../assets/starter-pokemon/chimchar/1.png">
                                    <p>Chimchar</p>
                                </div>
                                <div class="kartu-icon" pokemon="cyndaquil">
                                    <img src="../assets/starter-pokemon/cyndaquil/1.png">
                                    <p>Cyndaquil</p>
                                </div>
                            </div>
                            <div class="row-dekkartu">
                                <div class="kartu-icon" pokemon="deino">
                                    <img src="../assets/starter-pokemon/deino/1.png">
                                    <p>Deino</p>
                                </div>
                                <div class="kartu-icon" pokemon="dratini">
                                    <img src="../assets/starter-pokemon/dratini/1.png">
                                    <p>Dratini</p>
                                </div>
                                <div class="kartu-icon" pokemon="gastly">
                                    <img src="../assets/starter-pokemon/gastly/1.png">
                                    <p>Gastly</p>
                                </div>
                                <div class="kartu-icon" pokemon="gible">
                                    <img src="../assets/starter-pokemon/gible/1.png">
                                    <p>Gible</p>
                                </div>
                            </div>
                            <div class="row-dekkartu">
                                <div class="kartu-icon" pokemon="klink">
                                    <img src="../assets/starter-pokemon/klink/1.png">
                                    <p>Klink</p>
                                </div>
                                <div class="kartu-icon" pokemon="larvitar">
                                    <img src="../assets/starter-pokemon/larvitar/1.png">
                                    <p>Larvitar</p>
                                </div>
                                <div class="kartu-icon" pokemon="Lotad">
                                    <img src="../assets/starter-pokemon/Lotad/1.png">
                                    <p>Lotad</p>
                                </div>
                                <div class="kartu-icon" pokemon="mudkip">
                                    <img src="../assets/starter-pokemon/mudkip/1.png">
                                    <p>Mudkip</p>
                                </div>
                            </div>
                            <div class="row-dekkartu">
                                <div class="kartu-icon" pokemon="oshawott">
                                    <img src="../assets/starter-pokemon/oshawott/1.png">
                                    <p>Oshawott</p>
                                </div>
                                <div class="kartu-icon" pokemon="piplup">
                                    <img src="../assets/starter-pokemon/piplup/1.png">
                                    <p>Piplup</p>
                                </div>
                                <div class="kartu-icon" pokemon="poliwag">
                                    <img src="../assets/starter-pokemon/poliwag/1.png">
                                    <p>Poliwag</p>
                                </div>
                                <div class="kartu-icon" pokemon="ralts">
                                    <img src="../assets/starter-pokemon/ralts/1.png">
                                    <p>Ralts</p>
                                </div>
                            </div>
                            <div class="row-dekkartu">
                                <div class="kartu-icon" pokemon="shinx">
                                    <img src="../assets/starter-pokemon/shinx/1.png">
                                    <p>Shinx</p>
                                </div>
                                <div class="kartu-icon" pokemon="snivy">
                                    <img src="../assets/starter-pokemon/snivy/1.png">
                                    <p>Snivy</p>
                                </div>
                                <div class="kartu-icon" pokemon="spheal">
                                    <img src="../assets/starter-pokemon/spheal/1.png">
                                    <p>Spheal</p>
                                </div>
                                <div class="kartu-icon" pokemon="squirtle">
                                    <img src="../assets/starter-pokemon/squirtle/1.png">
                                    <p>Squirtle</p>
                                </div>
                            </div>
                            <div class="row-dekkartu">
                                <div class="kartu-icon" pokemon="starly">
                                    <img src="../assets/starter-pokemon/starly/1.png">
                                    <p>Starly</p>
                                </div>
                                <div class="kartu-icon" pokemon="tepig">
                                    <img src="../assets/starter-pokemon/tepig/1.png">
                                    <p>Tepig</p>
                                </div>
                                <div class="kartu-icon" pokemon="torchic">
                                    <img src="../assets/starter-pokemon/torchic/1.png">
                                    <p>Torchic</p>
                                </div>
                                <div class="kartu-icon" pokemon="totodile">
                                    <img src="../assets/starter-pokemon/totodile/1.png">
                                    <p>Totodile</p>
                                </div>
                            </div>
                            <div class="row-dekkartu">
                                <div class="kartu-icon" pokemon="Treecko">
                                    <img src="../assets/starter-pokemon/Treecko/1.png">
                                    <p>Treecko</p>
                                </div>
                                <div class="kartu-icon" pokemon="turtwig">
                                    <img src="../assets/starter-pokemon/turtwig/1.png">
                                    <p>Turtwig</p>
                                </div>
                                <div class="kartu-icon" pokemon="vanillite">
                                    <img src="../assets/starter-pokemon/vanillite/1.png">
                                    <p>Vanillite</p>
                                </div>
                                <div class="kartu-icon" pokemon="wurmple">
                                    <img src="../assets/starter-pokemon/wurmple/1.png">
                                    <p>Wurmple</p>
                                </div>
                            </div>
                            <h4>Special Pokemon</h4>
                            <div class="row-dekkartu">
                                <div class="kartu-icon" pokemon="magikarp">
                                    <img src="../assets/starter-pokemon/magikarp/1.png">
                                    <p>Magikarp</p>
                                </div>
                                <div class="kartu-icon" pokemon="nidoran_female">
                                    <img src="../assets/starter-pokemon/nidoran_female/1.png">
                                    <p>Nidoran ♀</p>
                                </div>
                                <div class="kartu-icon" pokemon="nidoran_male">
                                    <img src="../assets/starter-pokemon/nidoran_male/1.png">
                                    <p>Nidoran ♂</p>
                                </div>
                                <div class="kartu-icon" pokemon="pikachu">
                                    <img src="../assets/starter-pokemon/pikachu/1.png">
                                    <p>Pikachu</p>
                                </div>
                            </div>
                        </div>
                        <div class="ganti">
                            <div class="cancel-icon">Cancel</div>
                            <div class="ubah-icon">Ubah</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-nama">
                <div class="col-lg-4 kolom-kiri">
                    <p>Nama Lengkap</p>
                    <p>Ini akan di tampilkan di profil anda</p>
                </div>
                <div class="col-lg-4 kolom-tengah">
                    <label for="namaDepan">Nama Depan</label><br>
                    <input name="namaDepan" id="namaDepan" type="text" value="<?= $row['NamaDepan'] ?>"/>
                    <br>
                    <label for="namaBelakang">Nama Belakang</label><br>
                    <input name="namaBelakang" id="namaBelakang" type="text" value="<?= $row['NamaBelakang'] ?>"/>
                </div>
                <div class="col-lg-4 kolom-kanan">
                </div>
            </div>
            <div class="row row-username">
                <div class="col-lg-4 kolom-kiri">
                    <p>Username</p>
                    <p>Ini akan di tampilkan di profil anda</p>
                </div>
                <div class="col-lg-4 kolom-tengah">
                    <input type="text" id="username" value="@<?= $row['Username'] ?>" disabled>
                </div>
                <div class="col-lg-4 kolom-kanan">
                </div>
            </div>
            <div class="row row-email">
                <div class="col-lg-4 kolom-kiri">
                    <p>Email</p>
                </div>
                <div class="col-lg-4 kolom-tengah">
                    <input type="email" id="email" value="<?= $row['Email'] ?>"disabled>
                </div>
                <div class="col-lg-4 kolom-kanan">
                </div>
            </div>
            <div class="row row-password">
                <div class="col-lg-4 kolom-kiri">
                    <p>Password</p>
                </div>
                <div class="col-lg-4 kolom-tengah">
                    <label for="Password">Konfirmasi Password (jika ingin mengubah Sesuatu)</label><br>
                    <input type="password" name="password" id="Password" required/>
                    <br>
                    <!-- <label for="newPassword">Password Baru (jika ingin mengubah Password Lama)</label><br>
                    <input type="password" name="newPassword" id="newPassword"/> -->
                </div>
                <div class="col-lg-4 kolom-kanan">
                </div>
            </div>
            <div class="row row-simpan">
                <div class="col-lg-4 kolom-kiri">
                </div>
                <div class="col-lg-4 kolom-tengah">
                </div>
                <div class="col-lg-4 kolom-kanan">
                    <button type="submit" name="simpan" class="simpan">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JQUERY -->
    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS -->
    <script src="app.js"></script>
    <script src="../navbar.js"></script>
  </body>
</html>