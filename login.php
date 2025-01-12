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
  $username = trim($_POST['user']);
  $password = trim($_POST['pass']);

  // Query untuk mengambil username dan password
  $stmt = $conn->prepare("SELECT username, password FROM user WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      // Cocokkan password dengan password hash di database
      if (md5($password) == $row['password']) {  
          $_SESSION['username'] = $row['username'];
          header("location:admin.php");
          exit;
      } else {
          echo "<script>alert('Password salah!');</script>";
      }
  } else {
      echo "<script>alert('Username tidak ditemukan!');</script>";
  }

  $stmt->close();
  $conn->close();
}
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
                <h1 class="card-title text-center text-dark">My Daily Journal</h1>
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

