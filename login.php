<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['user'];
  
  //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
  $password = md5($_POST['pass']);

	//prepared statement
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

	//parameter binding 
  $stmt->bind_param("ss", $username, $password);//username string dan password string
  
  //database executes the statement
  $stmt->execute();
  
  //menampung hasil eksekusi
  $hasil = $stmt->get_result();
  
  //mengambil baris dari hasil sebagai array asosiatif
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  //check apakah ada baris hasil data user yang cocok
  if (!empty($row)) {
    //jika ada, simpan variable username pada session
    $_SESSION['username'] = $row['username'];

    //mengalihkan ke halaman admin
    header("location:admin.php");
  } else {
	  //jika tidak ada (gagal), alihkan kembali ke halaman login
    header("location:login.php");

  }

	//menutup koneksi database
  $stmt->close();
  $conn->close();
} else {
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="stylelog.css">
    <title>Login</title>
</head>
<body>
    <div class="global-container">
        <div class="card login-form blur-sm">
            <div class="card-body">
                <h1 class="card-title text-center text-dark"> Welcome to My Daily Journal</h1>
            </div>
           
          <div class="profile-image me-4 position-absolute start-50 translate-middle" style="top:37%; width:120px">
            <img src="img/emptyprofile-2.png" class="img-fluid w-120 rounded-circle" alt="">
         </div>
          
         <div class="card-text">

            <?php
            $username = "admin";
            $password = "123456";
            ?>

            <form method="post">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-dark">Username</label>
                <input type="text" class="form-control border border-3 border border-dark-subtle" name="user">
             </div>
             <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-dark">Password</label>
                <input type="password" class="form-control border border-3 border border-dark-subtle mb-3" name="pass">
             </div>
             <input type="submit" class="btn btn-primary mb-1" value="Login">
            </form>
    
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
?>