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

        <div class="row row-judul">
            <h1>PENGATURAN</h1>
            <p>Ubah dan Lihat detail akun anda disini</p>
        </div>
        <div class="row row-icon">
            <div class="col-lg-4 kolom-kiri">
                <p>Profil Pokemon Anda</p>
                <p>Ini akan di tampilkan di profil anda</p>
            </div>
            <div class="col-lg-4 kolom-tengah">
                <img class="pokemon-icon" pokemon="none">
                <p>Pokemon anda akan berevolusi seiring dengan peningkatan Poin</p>
            </div>
            <div class="col-lg-4 kolom-kanan">
                <button class="hapus">Hapus</button>
                <button class="ubah">Pilih <img src="../assets/Pengaturan/Expand_down.svg" width="15px"></button>
                <div class="pilih-icon">
                    <div class="dek-kartu">
                        <div class="row-dekkartu">
                            <div class="kartu-icon" pokemon="abra">
                                <img src="../assets/starter-pokemon/abra/63.png">
                                <p>Abra</p>
                            </div>
                            <div class="kartu-icon" pokemon="aron">
                                <img src="../assets/starter-pokemon/aron/304.png">
                                <p>Aron</p>
                            </div>
                            <div class="kartu-icon" pokemon="axew">
                                <img src="../assets/starter-pokemon/axew/610.png">
                                <p>Axew</p>
                            </div>
                            <div class="kartu-icon" pokemon="bulbasaur">
                                <img src="../assets/starter-pokemon/bulbasaur/1.png">
                                <p>Bulbasaur</p>
                            </div>
                        </div>
                        <div class="row-dekkartu">
                            <div class="kartu-icon" pokemon="charmander">
                                <img src="../assets/starter-pokemon/charmander/4.png">
                                <p>Charmander</p>
                            </div>
                            <div class="kartu-icon" pokemon="chikorita">
                                <img src="../assets/starter-pokemon/chikorita/152.png">
                                <p>Chikorita</p>
                            </div>
                            <div class="kartu-icon" pokemon="chimchar">
                                <img src="../assets/starter-pokemon/chimchar/390.png">
                                <p>Chimchar</p>
                            </div>
                            <div class="kartu-icon" pokemon="cyndaquil">
                                <img src="../assets/starter-pokemon/cyndaquil/155.png">
                                <p>Cyndaquil</p>
                            </div>
                        </div>
                        <div class="row-dekkartu">
                            <div class="kartu-icon" pokemon="deino">
                                <img src="../assets/starter-pokemon/deino/633.png">
                                <p>Deino</p>
                            </div>
                            <div class="kartu-icon" pokemon="dratini">
                                <img src="../assets/starter-pokemon/dratini/147.png">
                                <p>Dratini</p>
                            </div>
                            <div class="kartu-icon" pokemon="gastly">
                                <img src="../assets/starter-pokemon/gastly/92.png">
                                <p>Gastly</p>
                            </div>
                            <div class="kartu-icon" pokemon="gible">
                                <img src="../assets/starter-pokemon/gible/443.png">
                                <p>Gible</p>
                            </div>
                        </div>
                        <div class="row-dekkartu">
                            <div class="kartu-icon" pokemon="klink">
                                <img src="../assets/starter-pokemon/klink/599.png">
                                <p>Klink</p>
                            </div>
                            <div class="kartu-icon" pokemon="larvitar">
                                <img src="../assets/starter-pokemon/larvitar/246.png">
                                <p>Larvitar</p>
                            </div>
                            <div class="kartu-icon" pokemon="Lotad">
                                <img src="../assets/starter-pokemon/Lotad/270.png">
                                <p>Lotad</p>
                            </div>
                            <div class="kartu-icon" pokemon="mudkip">
                                <img src="../assets/starter-pokemon/mudkip/258.png">
                                <p>Mudkip</p>
                            </div>
                        </div>
                        <div class="row-dekkartu">
                            <div class="kartu-icon" pokemon="oshawott">
                                <img src="../assets/starter-pokemon/oshawott/501.png">
                                <p>Oshawott</p>
                            </div>
                            <div class="kartu-icon" pokemon="piplup">
                                <img src="../assets/starter-pokemon/piplup/393.png">
                                <p>Piplup</p>
                            </div>
                            <div class="kartu-icon" pokemon="poliwag">
                                <img src="../assets/starter-pokemon/poliwag/60.png">
                                <p>Poliwag</p>
                            </div>
                            <div class="kartu-icon" pokemon="ralts">
                                <img src="../assets/starter-pokemon/ralts/280.png">
                                <p>Ralts</p>
                            </div>
                        </div>
                        <div class="row-dekkartu">
                            <div class="kartu-icon" pokemon="shinx">
                                <img src="../assets/starter-pokemon/shinx/403.png">
                                <p>Shinx</p>
                            </div>
                            <div class="kartu-icon" pokemon="snivy">
                                <img src="../assets/starter-pokemon/snivy/495.png">
                                <p>Snivy</p>
                            </div>
                            <div class="kartu-icon" pokemon="spheal">
                                <img src="../assets/starter-pokemon/spheal/363.png">
                                <p>Spheal</p>
                            </div>
                            <div class="kartu-icon" pokemon="squirtle">
                                <img src="../assets/starter-pokemon/squirtle/7.png">
                                <p>Squirtle</p>
                            </div>
                        </div>
                        <div class="row-dekkartu">
                            <div class="kartu-icon" pokemon="starly">
                                <img src="../assets/starter-pokemon/starly/396.png">
                                <p>Starly</p>
                            </div>
                            <div class="kartu-icon" pokemon="tepig">
                                <img src="../assets/starter-pokemon/tepig/498.png">
                                <p>Tepig</p>
                            </div>
                            <div class="kartu-icon" pokemon="torchic">
                                <img src="../assets/starter-pokemon/torchic/255.png">
                                <p>Torchic</p>
                            </div>
                            <div class="kartu-icon" pokemon="totodile">
                                <img src="../assets/starter-pokemon/totodile/158.png">
                                <p>Totodile</p>
                            </div>
                        </div>
                        <div class="row-dekkartu">
                            <div class="kartu-icon" pokemon="Treecko">
                                <img src="../assets/starter-pokemon/Treecko/252.png">
                                <p>Treecko</p>
                            </div>
                            <div class="kartu-icon" pokemon="turtwig">
                                <img src="../assets/starter-pokemon/turtwig/387.png">
                                <p>Turtwig</p>
                            </div>
                            <div class="kartu-icon" pokemon="vanillite">
                                <img src="../assets/starter-pokemon/vanillite/582.png">
                                <p>Vanillite</p>
                            </div>
                            <div class="kartu-icon" pokemon="wurmple">
                                <img src="../assets/starter-pokemon/wurmple/265.png">
                                <p>Wurmple</p>
                            </div>
                        </div>
                    </div>
                    <div class="ganti">
                        <button class="cancel-icon">Cancel</button>
                        <button class="ubah-icon">Ubah</button>
                    </div>
                </div>
            </div>
        </div>
        <form action="" method="post">
            <div class="row row-nama">
                <div class="col-lg-4 kolom-kiri">
                    <p>Nama Lengkap</p>
                    <p>Ini akan di tampilkan di profil anda</p>
                </div>
                <div class="col-lg-4 kolom-tengah">
                    <label for="namaDepan">Nama Depan</label><br>
                    <input name="namaDepan" id="namaDepan" type="text" value="Irsyad"/>
                    <br>
                    <label for="namaBelakang">Nama Belakang</label><br>
                    <input name="namaBelakang" id="namaBelakang" type="text" value="Sunarko"/>
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
                    <input type="text" id="username" name="username" value="@aksara" disabled>
                </div>
                <div class="col-lg-4 kolom-kanan">
                </div>
            </div>
            <div class="row row-email">
                <div class="col-lg-4 kolom-kiri">
                    <p>Email</p>
                </div>
                <div class="col-lg-4 kolom-tengah">
                    <input type="email" id="email" name="email" value="irsyadsunarkos@gmail.com"disabled>
                </div>
                <div class="col-lg-4 kolom-kanan">
                </div>
            </div>
            <div class="row row-password">
                <div class="col-lg-4 kolom-kiri">
                    <p>Password</p>
                </div>
                <div class="col-lg-4 kolom-tengah">
                    <label for="oldPassword">Password Anda (Sekarang)</label><br>
                    <input type="password" id="oldPassword" name="oldPassword" value="testtstestsettestsete" disabled>
                    <br>
                    <label for="oldsamePassword">Konfirmasi Password (jika ingin mengubah Password)</label><br>
                    <input type="password" name="oldsamePassword" id="oldsamePassword"/>
                    <br>
                    <label for="newPassword">Password Baru</label><br>
                    <input type="password" name="newPassword" id="newPassword"/>
                </div>
                <div class="col-lg-4 kolom-kanan">
                </div>
            </div>
            <div class="row row-nomor">
                <div class="col-lg-4 kolom-kiri">
                    <p>Nomor Handphone</p>
                </div>
                <div class="col-lg-4 kolom-tengah">
                    <input type="text" id="nonegara" name="nonegara" value="+62" disabled size="1">
                    <input type="tel" name="nomor" id="nomor" size="12" maxlength="12"/>
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