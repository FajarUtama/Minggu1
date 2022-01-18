<html>
<head>
<title>Log-in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Style/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
        <nav>
            <div class="container-flex">
                <div class="brand">
                       <a href="index.html">TopUpiN</a>
                 </div>
                 <div class="burger">
                       <div class="bar1"></div>
                  <div class="bar2"></div>
                  <div class="bar3"></div>
                 </div>
                 <div class="bg-sidebar"></div>
                 <ul class="sidebar">
                        <li><a href="index.html">Home</a>
                        <li><a href="product.html">Product</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="transaction.php">Transaction</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="login.php">Log In</a></li>
                 </ul>
            </div>
        </nav>
    </div>
<script src="../Style/navbar.js"></script>
    <!-- <h1>Login</h1> -->
	<form action="login.php" method="post">	

    <?php 
 
    $servername = "localhost";
    $username = "id18301771_root";
    $password = "Y3LNVj%3dXP/^Son";
    $dbname = "id18301771_topupin";
    $id = "";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$conn) {
        die("<script>alert('Gagal tersambung dengan database.')</script>");
    }
  
    error_reporting(0);
    
    session_start();
    
    if (isset($_SESSION['username'])) {
        header("Location: berhasil_login.php");
    }
    
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
    
        $sql = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: berhasil_login.php");
        } else {
            echo "<script>alert('username atau password Anda salah. Silahkan coba lagi!')</script>";
        }
    }
  
 ?>
  
 <!DOCTYPE html>
 <html>
 <body>
     <div class="alert alert-warning" role="alert">
         <?php echo $_SESSION['error']?>
     </div>

     <h1>Mohon Maaf, Halaman Login Masih Dalam Pengembangan</h1>
  
     <div class="content">
         <form action="" method="POST" class="login-username">
             <div class="input-group">
                 <input type="username" placeholder="username" name="username" value="<?php echo $username; ?>" required>
             </div>
             <div class="input-group">
                 <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
             </div>
             <div class="input-group">
                 <button name="submit" class="btn">Login</button>
             </div>
             <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
         </form>
     </div>
 </body>
 </html>
        </form>
</body>
</html>