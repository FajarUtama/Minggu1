<!DOCTYPE HTML>
<HTML lang="en">
<head>
    <title>PUBG Mobile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Style/variant.css">
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
  <br><br><h1 align="center" >Hai Ngab</h1><br>
      <br><br>
      <table class=table> 
        <tr>
          <td>
            <?php
            $servername = "localhost";
            $username = "id18301771_root";
            $password = "Y3LNVj%3dXP/^Son";
            $dbname = "id18301771_topupin";
            $id = "";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

              $sql = "SELECT * from pubgm";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                echo '
                <div class="gallery">
                  <div class="variant"><a target="_blank" href="pubgm-order.php?id='.$row['id'].'"><font size="4">'.$row['variant'].'</font></a></div>
                  <a target="_blank" href="pubgm-order.php?id='.$row['id'].'"><img src="../PUBGM/'.$row['image'].'" alt="Terjadi Kesalahan Saat Memuat Gambar"></a>
                  <div class="price">Rp.'.$row['price'].',00;-</div>
                  <form method="post" target="_blank" action="pubgm-order.php?id='.$row['id'].'">
                  </form>
                  </div> 
                  </div>
                </div>
                ';
                }
              } else {
                echo "0 results";
              }

              $conn->close();
            ?>
          </td>
        </tr> 
      </table>
</body>

</HTML>