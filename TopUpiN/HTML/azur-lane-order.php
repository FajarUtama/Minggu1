<!DOCTYPE HTML>
<HTML lang="en">
<head>
    <title>Checkout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Style/checkout.css">
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
  <br><br><h1 align="center" >Checkout</h1><br>
  <p align="center"><i><b>Silahkan Konfirmasi Pemesanan Anda Dibawah Ini<b></i></p>
      <br><br>
      <div class="row">
        <div class="column">
          <br>
          
          <?php
      $servername = "localhost";
      $username = "id18301771_root";
      $password = "Y3LNVj%3dXP/^Son";
      $dbname = "id18301771_topupin";
      $id = "";
      
      if(isset($_GET['id'])) {
          $id = $_GET['id'];
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          
          $sql = "SELECT * from azur_lane WHERE id=".$_GET['id'];
          $result = $conn->query($sql);
      
          if ($result->num_rows > 0) {
          // output data of each row
              while($row = $result->fetch_assoc()) {
          //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
              echo '
           <div class="content">
              <br>
              <div class="row">
              <div class="col-25">
                  <img src="../Azur_Lane/'.$row['image'].'" alt="Terjadi Kesalahan Saat Memuat Gambar" width="220" height="190"></div>  
                  <div class="variant"><name="variant" id="variant"><font size="6">'.$row['variant'].'</font></div> <br>
                  <div calss="id"><name="id" id="id">ID Code: '.$row['id'].'</div> <br><br><br>
                  <div class="price">Rp.'.$row['price'].';-</div>
              </div>
          </div> 
          ';
        }
      } else {
        echo "0 results";
      }
      $conn->close();	
      }
      
      if (isset($_GET['submit'])){
          $id = $_GET['id_variant'];
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
      
          $sql = "INSERT INTO transaction (id_variant, nama, variant, email, password, login_type, phone, status)
          VALUES ('".$_GET['id_variant']."', '".$_GET['nama']."', '".$_GET['variant']."', '".$_GET['email']."', '".$_GET['password']."', '".$_GET['login_type']."', '".$_GET['phone']."', '".$_GET['status']."')";

          if ($conn->query($sql) === TRUE) {
              echo '<div class="row">
                      <div class="report">
                          <font size="5">Pesanan Telah Tersimpan, Silahkan Melakukan Pembayaran Untuk Proses Lebih Lanjut</font>


                      </div>
                   </div>
                   ';
          } 
          else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
          $conn->close();
      }
      
      ?>
      <br><br>
      <form action="azur-lane-order.php">
      <div class="container">
        <div class="row">
          <div class="col-25">
            <label for="warning"> </label>
          </div>
          <div class="col-752">
            <p>Kami Menjaga Semua Kerahasiaan Data Anda, Data yang Anda Isikan Hanya Akan Digunakan Untuk Proses Transaksi</p>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="nama">Nama</label>
          </div>
          <div class="col-75">
            <input type="text" id="nama" name="nama" placeholder="Masukan Nama atau Username Game Anda...">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="email">Email</label>
          </div>
          <div class="col-75">
            <input type="text" id="email" name="email" placeholder="Masukan Email Account Game Anda...">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="password">Password</label>
          </div>
          <div class="col-75">
            <input type="text" id="password" name="password" placeholder="Masukan Password Account Game anda...">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="login_type">Tipe Login</label>
          </div>
          <div class="col-75">
            <select id="login_type" name="login_type">
              <option value="Email">Email</option>
              <option value="Account Moonton">Account Moonton</option>
              <option value="Facebook">Facebook</option>
              <option value="Lain-Lain">Lain-Lain</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="phone">Telepon</label>
          </div>
          <div class="col-75">
            <input type="text" id="phone" name="phone" placeholder="Masukan Nomor Telepon Anda...">
          </div>
        </div>
        <br>
      </div>
        <div class="row">
          <button type="submit" class="button" name="submit" value="submit"><font align="justify"><B>PESAN SEKARANG</B></font></button>
        </div>
        
        <div class="col-251">
            <label for="id_variant">ID CODE</label>
        </div>
        <div class="col-751">
          <input type="text" id="id_variant" name="id_variant" value="<?php echo $id?>">
        </div>


        <div class="col-251">
            <label for="variant">variant</label>
        </div>
        <div class="col-751">
          <input type="text" id="variant" name="variant" value="Azur Lane">
        </div>
        <div class="col-251">
            <label for="status">status</label>
        </div>
        <div class="col-751">
          <input type="text" id="status" name="status" value="Menunggu Pembayaran">
        </div>
        
          
        </div>
      </style>
      </head>
      
      
      </div>
      </form>
      
      </div>
  </div>
</body>

</HTML>