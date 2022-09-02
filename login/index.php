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
    header("Location: ../");
    exit;
}

if (isset($_POST["submit"])){
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    $result = mysqli_query($conn, "SELECT * FROM data_user WHERE Username ='$username'");

    // Cek Username
    if(mysqli_num_rows($result) === 1){
        
        // Cek Password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["Password"])){
            // Set Session
            $_SESSION["id"] = $row["ID"];
            $_SESSION["login"] = true;

            if(isset($_POST['remember'])){
                setcookie("id", $row["ID"], time()+31556926 , '/');
                setcookie("key", hash('sha256',$row['Username']), time()+31556926 , '/');
            }
            
            header("Location: ../");
            exit;
        }
    }
    $error = true;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>R5CLASS | LOGIN</title>
	<link rel="shortcut icon" href="../assets/logo-biru-100px.png">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" href="../warna.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<div class="login-box">
			<form action="" method="POST">
				<div class="logo-form">
					<img src="../assets/Login/logo-fix-jadi-hitam.svg" width="100px">
					<h2 class="judul-login">Sign In</h2>
					<p class="ket-login">Login untuk masuk menggunakan akun yang telah terdaftar</p>
				</div>
				<div class="form-group">
					<input type="text" placeholder="Username" class="input-control" name="Username">
				</div>	
				<div class="form-group">
					<input type="password" placeholder="Password" class="input-control" name="Password">
				</div>
				<div class="rememberme-box">
				<input id="rememberme" type="checkbox" name="remember" > 
				<label class="rememberme-label" for="rememberme">Remember Me</label>
				</div>
				<br>
				<input type="submit" name="submit" value="Sign in" class="btn">
				<br>
				<div>
					<p class="blmpunya">Belum Punya Akun ? <a class="daftar" href="../register/">Daftar</a></p>
				</div>
			</form>
			<?php if(isset($error)) : ?>
				<div class="error">
                    <div class="red-attr"></div>
                    <div>
                        <img src="../assets/Register/error.svg">
                    </div>
                    <div>
                        <h3>Error</h3>
                        <p>username/ password salah</p>
                    </div>
                </div>
			<?php endif; ?>
		</div>
	</div>
	
 <!-- BOOTSTRAP JS -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
 <!-- BOOTSTRAP JS -->
</body>
</html>