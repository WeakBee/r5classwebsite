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

if(isset($_SESSION["login"])){
    header("Location: ../login");
    exit;
}

if( isset($_POST["submit"])){
    global $conn;

    $namaDepan = $_POST["namaDepan"];
    $namaBelakang = $_POST["namaBelakang"];
    $email = $_POST["Email"];
    $username = strtolower(stripslashes($_POST["Username"]));
    $password = mysqli_real_escape_string($conn,$_POST["Password"]);
    $password2 = mysqli_real_escape_string($conn,$_POST["konfirmasiPassword"]);

    //cek username sudah ada atau belum , dan cek password apakah sama
    $result = mysqli_query($conn, "SELECT Username FROM data_user WHERE Username = '$username'");

    if(mysqli_fetch_assoc($result)){
        $errorusername = true;
    } else if($password !== $password2){
        $errorpassword = true;
    } else {
        // Enkripsi Password
        $password = password_hash($password,PASSWORD_DEFAULT);

        // Tambahkan Userbaru ke database
        mysqli_query($conn,"INSERT INTO data_user VALUES('','$namaDepan','$namaBelakang','$email','$username','$password','none','10')");
        
        // Pindah ke login page
        header("Location: ../login");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/logo-biru-100px.png">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="../warna.css">
    <link rel="stylesheet" href="style.css">
    <title>R5CLASS | REGISTER</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 kolom-kiri">
                <a class="kembali" href="../login/" >
                    <div>
                        <img src="../assets/Register/Expand_left.svg">
                        <span>Kembali Ke Login</span>
                    </div>
                </a>
                <!-- BIKIN DISINI GUNG BUAT YANG KIRI -->
                <div class="penjelasan">
                    <div class="gambar"><img src="../assets/Register/User.svg"></div>
                    <div class="keterangan"><h5>Username</h5>
                        <p>Gunakan Username tanpa spasi ataupun menggunakan lambang seperti: &,*,(,), dll kecuali Titik "." dan Underscore "_". Username juga memiliki batas 15 Karakter.<br>Contoh : <b>weakbee</b> atau <b>weak_bee</b> atau <b>weak.bee</b></p></div>
                </div>
                <div class="penjelasan">
                    <div class="gambar"><img src="../assets/Register/Key.svg"></div>
                    <div class="keterangan"><h5>Password</h5>
                        <p>Password anda dilindungi dengan teknologi enkripsi sehingga tidak ada yang bisa melihat maupun mengganti isi password anda termasuk <b>admin</b></p></div>
                </div>
                <div class="penjelasan">
                    <div class="gambar"><img src="../assets/Register/Message.svg"></div>
                    <div class="keterangan"><h5>Konfirmasi Email</h5>
                    <p>Kami akan segera mengirim email konfirmasi, untuk memberi tahu anda bahwa akun anda telah disetujui, jika akun anda blm disetujui, ada beberapa fitur website yang tidak bisa diakses</p></div>
                </div>
                <!-- BIKIN DISINI GUNG BUAT YANG KIRI -->
            </div>
            <div class="col-lg-6 kolom-kanan">
                <!-- BIKIN DISINI GUNG BUAT YANG KANAN -->
                <form action="" method="post">
                    <br>
                    <div class="frm"><h3>Sign Up</h3></div>
                    <div class="keterangan"><p>Isi data diri dan daftarkan dirimu agar bisa bergabung bersama kami</p></div>
                    <div class="form-group">
                    <input type="text" placeholder="Nama Depan" class="nama input-control" name="namaDepan" required>
                    <input type="text" placeholder="Nama Belakang" class="nama input-control" name="namaBelakang" required>
                    </div>
                    <div class="form-group">
                    <input type="text" placeholder="Email" style="width: 100%;" class="input-control" name="Email" pattern="[a-z0-9]+@[a-z]+\.[a-z]{2,3}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Username" style="width: 100%;" class="input-control" name="Username" pattern="^(?=.{4,15}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$" required>
                        </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" style="width: 100%;" class="input-control" name="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Konfirmasi Password" style="width: 100%;" class="input-control" name="konfirmasiPassword" required>
                    </div>
                    <div class="ckls-box">
                        <input id="ckls" type="checkbox" name="check" required> 
                        <label class="ckls-label" for="ckls">Saya Setuju dengan <a href="#">Terms and Condition</a> dan <a href="#">Privacy Police</a> dari R5Group</label>
                        </div>
                        <br>
				<input type="submit" name="submit" value="Sign Up" class="btn">
				<br>

                </form>
                <!-- BIKIN DISINI GUNG BUAT YANG KANAN -->
                <?php if(isset($errorusername)) : ?>
                    <div class="error">
                        <div class="red-attr"></div>
                        <div>
                            <img src="../assets/Register/error.svg">
                        </div>
                        <div>
                            <h3>Error</h3>
                            <p>Username sudah terdaftar</p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(isset($errorpassword)) : ?>
                    <div class="error">
                        <div class="red-attr"></div>
                        <div>
                            <img src="../assets/Register/error.svg">
                        </div>
                        <div>
                            <h3>Error</h3>
                            <p>Password Tidak Sesuai</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS -->
</body>
</html>