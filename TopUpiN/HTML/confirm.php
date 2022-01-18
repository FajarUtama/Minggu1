<!DOCTYPE HTML>
<HTML lang="en">
<head>
    <title>Konfirmasi Pembayaran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Style/confirm.css">
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
    <br><br><h1 align="center" >Konfirmasi Pembayaran</h1><br>
    <p align="center"><i><b>Silahkan Konfirmasi Pembayaran Anda<b></i></p>
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
          
          $sql = "SELECT * from transaction WHERE id=".$_GET['id'];
          $result = $conn->query($sql);
      
          if ($result->num_rows > 0) {
          // output data of each row
              while($row = $result->fetch_assoc()) {
          //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
              echo '
           <div class="content">
              <br>
              <div class="row">
              <table style="margin-left:auto;margin-right:auto" border="1">
              <tr>
              <td>
              <div class="col-50">
                  <br>
                  <div class="id"><name="id" id="id"><font size="4">ID Transaksi : '.$row['id'].'</font></div>
                  <div class="id_variant"><name="id_variant" id="id_variant"><font size="4">ID Variant : '.$row['id_variant'].'</font></div>
                  <div class="variant"><name="variant" id="variant"><font size="4">Variant : '.$row['variant'].'</font></div>
                  <div class="nama"><name="nama" id="nama"><font size="4">Nama Pembeli : '.$row['nama'].'</font></div> <br>
                  <div calss="status"><name="status" id="status"><font size="4">Status : '.$row['status'].'</font></div> <br><br><br>
                  <a href = "transaction.php"><button type="submit" class="button" name="submit" value="submit"><font align="justify"><B>KONFIRMASI PEMBAYARAN</B></font></button></a>
              </div>
              </td>
              </tr>
              </table>
          </div> 
          ';
        }
      } else {
        echo "0 results";
      }
      $conn->close();	
      }
    ?>

</body>
</HTML>