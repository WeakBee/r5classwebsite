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

if(isset($_POST['submit'])){
    global $conn;

    $Username = $_POST['username'];
    $Poin = $_POST['poin'];
     mysqli_query($conn, "UPDATE data_user set poin='$Poin' WHERE username='$Username'"); 
}
$id = $_SESSION['id'];

if(isset($_POST['submit2'])){
    global $conn;

    
    $Username = $_POST["username"];
    $Nomor = $_POST["nomor"];
    $Matkul = $_POST["matakuliah"];
    $Poin = $_POST["poin"];
     mysqli_query($conn, "INSERT INTO data_aktivitas VALUES ('','$Username','$Nomor','$Matkul','$Poin')"); 
}
if(isset($_POST['submit3'])){
    global $conn;

    
    $Matkul = $_POST["matkul"];
    $Keterangan = $_POST["keterangan"];
    $Diberikan = $_POST["diberikan"];
    $Dikumpulkan = $_POST["dikumpulkan"];
    $Presentase = $_POST["presentase"];
    $Link = $_POST["link"];

    $Status= $_POST["status"];
     mysqli_query($conn, "INSERT INTO data_tugas VALUES ('','$Matkul','$Keterangan','$Diberikan','$Dikumpulkan','$Presentase','$Link','$Status')"); 
}
if(isset($_POST['submit4'])){
    global $conn;

    
    $Matkul = $_POST["matkul"];
    $Keterangan = $_POST["keterangan"];
    $Status = $_POST["status"];
     mysqli_query($conn, "UPDATE data_tugas SET keterangan='$Keterangan','status='$Status' WHERE matkul='$Matkul'");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/logo-biru-100px.png">
    <title>R5CLASS | ADMIN</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="../warna.css">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
        <div class="row row-judul">
            <div class="col-lg-1 kolom-kiri">
            </div>
            <div class="col-lg kolom-kanan">
                <div>
                    <h1>Admin</h1>
                </div>
            </div>
        </div>

        <div class="row row-nav-konten">
            <!-- Ini Tab Panel Atas -->
            <ul class="nav nav-tabs justify-content-center" id="myTab">
                <li class="nav-item">
                    <a href="#materi" class="nav-link active" data-bs-toggle="tab">Update Point</a>
                </li>
                <li class="nav-item">
                    <a href="#data_aktivitas" class="nav-link" data-bs-toggle="tab">Data Aktivitas</a>
                </li>
                <li class="nav-item">
                    <a href="#data_tugas" class="nav-link" data-bs-toggle="tab">Data Tugas</a>
                </li>
                <li class="nav-item">
                    <a href="#update_tugas" class="nav-link" data-bs-toggle="tab">Update Tugas</a>
                </li>
            </ul>
             <!-- Ini Tab Content Bawah -->
             <div class="tab-content">
                <div class="tab-pane fade show active" id="materi">
                    <h4 class="mt-2"></h4>
                    <div class="row">
                        <div class="kartutim col-lg-4">
                            <div class="update-poin">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Update Point</label>
                                        <select name="username" class="input-control">
                                            <?php
                                                $query =mysqli_query($conn, "SELECT * FROM data_user");
                                                while ($data =mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?= $data['Username']?>"><?php echo $data['Username'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <br></br>
                                        <div class="form-group">
                                            <label>Poin awal</label>
                                            <input type="text" name="" class="input-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Update Poin</label>
                                            <input type="text" name="poin" class="input-control">
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="Simpan" class="btn">
                                </form>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                        <div class="tab-pane fade" id="data_aktivitas">
                        <h4 class="mt-2"></h4>
                    <div class="row">
                        <div class="kartutim col-lg-4">
                    <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Update Point</label>
                                        <select name="username" class="input-control">
                                            <?php
                                                $query =mysqli_query($conn, "SELECT * FROM data_user");
                                                while ($data =mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?= $data['Username']?>"><?php echo $data['Username'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        
                                        <div class="form-group">
                                            <label>No</label>
                                            <input type="text" name="nomor" class="input-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Matkul</label>
                                            <select name="matakuliah" class="input-control">
                                                <option>Keamanan Komputer</option>
                                                <option>Filsafat Ilmu</option>
                                                <option>Riset Operasional</option>
                                                <option>E-Commerce</option>
                                                <option>Sistem Berbasis Pengetahuan</option>
                                                <option>Rekayasa Perangkat Lunak</option>
                                                <option>Komputer Grafik</option>
                                                <option>Etika Profesi</option>
                                            </select>
                                            
                                            <div class="form-group">
                                            <label>Poin</label>
                                            <input type="text" name="poin" class="input-control">
                                        </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit2" value="Simpan" class="btn">
                                </form>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                            
                    <div class="tab-pane fade" id="data_tugas">
                        <h4 class="mt-2"></h4>
                    <div class="row">
                        <div class="kartutim col-lg-4">
                    <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Update Point</label>
                                        <select name="matkul" class="input-control">
                                        <option>Keamanan Komputer</option>
                                                <option>Filsafat Ilmu</option>
                                                <option>Riset Operasional</option>
                                                <option>E-Commerce</option>
                                                <option>Sistem Berbasis Pengetahuan</option>
                                                <option>Rekayasa Perangkat Lunak</option>
                                                <option>Komputer Grafik</option>
                                                <option>Etika Profesi</option>
                                            </select>
                                        
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" class="input-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Diberikan</label>
                                            <input type="text" name="diberikan" class="input-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Dikumpulkan</label>
                                            <input type="text" name="dikumpulkan" class="input-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Persentase</label>
                                            <input type="text" name="presentase" class="input-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" name="link" class="input-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="input-control">
                                                <option>aktif</option>
                                                <option>non</option>
                                                <option>kelompok</option>
                                               
                                            </select>
                                            </div>
                                         </div>
                                    <input type="submit" name="submit3" value="Simpan" class="btn">
                                </form>
                            </div>
                        </div>
                                            </div>
                                            </div>
                    <div class="tab-pane fade" id="update_tugas">
                    <h4 class="mt-2"></h4>
                    <div class="row">
                        <div class="kartutim col-lg-4">
                            <div class="update-poin">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Matkul</label>
                                        <select name="matkul" class="input-control">
                                            <?php
                                                $query =mysqli_query($conn, "SELECT * FROM data_tugas");
                                                while ($data =mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?= $data['Matkul']?>"><?php echo $data['Matkul'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <label>Keterangan</label>
                                        <select name="keterangan" class="input-control">
                                            <?php
                                                $query =mysqli_query($conn, "SELECT * FROM data_tugas");
                                                while ($data =mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?= $data['Keterangan']?>"><?php echo $data['Keterangan'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <label>Status</label>
                                        <select name="status" class="input-control">
                                            <option value>aktif</option value>
                                            <option value>non</option value>
                                            <option value>kelompok</option value>
                                        </select>
                                    <input type="submit" name="submit4" value="Simpan" class="btn">
                                </form>
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