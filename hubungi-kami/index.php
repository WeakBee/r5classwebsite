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
    <title>R5CLASS | HUBUNGI KAMI</title>
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
        <div class="row text-center mb-3">
            <h1 class="meet">Meet Our Team</h1>
            <p>Beritahu Kami Jika Anda Mendapatkan Masalah Atau Membutuhkan Bantuan</p>
        </div>
        <div class="row">
            <div class="kartutim col-lg-4 d-flex justify-content-end">
                <div class="card" style="width: 18rem;">
                    <div class="background-black"></div>
                    <img src="../assets/Hubungi Kami/ichwan1.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Ichwanul Muslim</h5>
                        <p class="card-text">Owner</p>
                        <img src="../assets/Hubungi Kami/Expand_up.png">
                    </div>
                    <div class="kontak">
                        <img class="panahbawah" src="../assets/Hubungi Kami/Expand_down.png">
                        <div>
                            <img src="../assets/Hubungi Kami/whatsapp.png">
                            <a href="https://wa.me/6281384402435?text=Selamat%20Pagi%2FSiang%2FSore%2C%20Saya%20x%20ingin%20Bertanya%20Tentang%20%3A%0A%0ATerima%20Kasih"><span>+62 813 8440 2435</span></a>
                        </div>
                        <div>
                            <img src="../assets/Hubungi Kami/email.png">
                            <a href="mailto:ichwanulmuslim9h@gmail.com"><span> ichwanulmuslim9h@gmail.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kartutim col-lg-4 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <div class="background-black"></div>
                    <img src="../assets/Hubungi Kami/foto2.png" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Agung W.S.</h5>
                        <p class="card-text">Full Stack Developer</p>
                        <img src="../assets/Hubungi Kami/Expand_up.png">
                    </div>
                    <div class="kontak">
                        <img class="panahbawah" src="../assets/Hubungi Kami/Expand_down.png">
                        <div>
                            <img src="../assets/Hubungi Kami/whatsapp.png">
                            <a href="https://wa.me/6281212806496?text=Selamat%20Pagi%2FSiang%2FSore%2C%20Saya%20x%20ingin%20Bertanya%20Tentang%20%3A%0A%0ATerima%20Kasih"><span>+62 812 1280 6496</span></a>
                        </div>
                        <div>
                            <img src="../assets/Hubungi Kami/email.png">
                            <a href="mailto:joagung261@gmail.com"><span> joagung261@gmail.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kartutim col-lg-4 d-flex justify-content-start">
                <div class="card" style="width: 18rem;">
                    <div class="background-black"></div>
                    <img src="../assets/Hubungi Kami/foto3.png" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Irsyad Sunarko</h5>
                        <p class="card-text">Front End Developer</p>
                        <img src="../assets/Hubungi Kami/Expand_up.png">
                    </div>
                    <div class="kontak">
                        <img class="panahbawah" src="../assets/Hubungi Kami/Expand_down.png">
                        <div>
                            <img src="../assets/Hubungi Kami/whatsapp.png">
                            <a href="https://wa.me/6281213940347?text=Selamat%20Pagi%2FSiang%2FSore%2C%20Saya%20x%20ingin%20Bertanya%20Tentang%20%3A%0A%0ATerima%20Kasih"><span>+62 812 1394 0347</span></a>
                        </div>
                        <div>
                            <img src="../assets/Hubungi Kami/email.png">
                            <a href="mailto:irsyadsunarkos@gmail.com"><span>irsyadsunarkos@gmail.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="kartutim col-lg-4 d-flex justify-content-end">
                <div class="card" style="width: 18rem;">
                    <div class="background-black"></div>
                    <img src="../assets/Hubungi Kami/foto4.png" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Oriza Sativa</h5>
                        <p class="card-text">Full Stack Developer</p>
                        <img src="../assets/Hubungi Kami/Expand_up.png">
                    </div>
                    <div class="kontak">
                        <img class="panahbawah" src="../assets/Hubungi Kami/Expand_down.png">
                        <div>
                            <img src="../assets/Hubungi Kami/whatsapp.png">
                            <a href="https://wa.me/6281364029266?text=Selamat%20Pagi%2FSiang%2FSore%2C%20Saya%20x%20ingin%20Bertanya%20Tentang%20%3A%0A%0ATerima%20Kasih"><span>+62 813 6402 9266</span></a>
                        </div>
                        <div>
                            <img src="../assets/Hubungi Kami/email.png">
                            <a href="mailto:ori.sativa1442000@gmail.com"><span>ori.sativa1442000@gmail.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kartutim col-lg-4 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <div class="background-black"></div>
                    <img src="../assets/Hubungi Kami/agam.png" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Muh Agam Atmadja</h5>
                        <p class="card-text">Front End Developer</p>
                        <img src="../assets/Hubungi Kami/Expand_up.png">
                    </div>
                    <div class="kontak">
                        <img class="panahbawah" src="../assets/Hubungi Kami/Expand_down.png">
                        <div>
                            <img src="../assets/Hubungi Kami/whatsapp.png">
                            <a href="https://wa.me/6281324677646?text=Selamat%20Pagi%2FSiang%2FSore%2C%20Saya%20x%20ingin%20Bertanya%20Tentang%20%3A%0A%0ATerima%20Kasih"><span>+62 813 2467 7646</span></a>
                        </div>
                        <div>
                            <img src="../assets/Hubungi Kami/email.png">
                            <a href="mailto:agamatmadja5@gmail.com"><span>agamatmadja5@gmail.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS -->
    <script src="../navbar.js"></script>
  </body>
</html>