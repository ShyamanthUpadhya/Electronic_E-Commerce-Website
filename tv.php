<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "digital";
$insert=false;

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
//if (!$conn){
 //   die("Sorry we failed to connect: ". mysqli_connect_error());
//}
//else{
  //  echo "Connection was successful<br>";
//}

$sql = "SELECT * FROM `tv`";
$result = mysqli_query($conn, $sql);
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP login system!</title>
  </head>
  <img src="tv.jpg" ,alt="Image not Found" style="
  position:absolute;
  
  z-index:-1;
  opacity:0.9;
  /* Full height */
  height: 100%; 
  width:100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: fit;"
  >
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Digital Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
  <li class="nav-item">
        <a class="nav-link" href="Main.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mobile.php">Mobiles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="laptop.php">Laptop</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">TV<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="speaker.php">Speakers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">My Cart</a>
      </li>

      
     
    </ul>
  </div>
</nav>
<?php

if(isset($_POST['submit'])){
  $insert=true;
  $Id=$_POST['Id'];
  $sq = "SELECT * FROM `tv` WHERE ID= '$Id' ";
  $res = mysqli_query($conn, $sq);
  //$nu = mysqli_num_rows($res);
  //echo "<br>".$nu;
  $row = mysqli_fetch_assoc($res);
  //echo "<br>".$row['Model'];
  $idn=$row['ID'];
  $modn=$row['Model'];
  $ston=$row['Stock'];
  $prin=$row['Price'];
  $domn=$row['DOM'];
  $qwe=mysqli_query($conn,"INSERT INTO `checkout`(`ID`, `Model`, `Stock`, `Price`, `DOM`) VALUES ('$idn','$modn','$ston','$prin','$domn')");
  $sqw="UPDATE `tv` SET `Stock`=$ston-1 WHERE ID='$idn'";
  $re = mysqli_query($conn, $sqw);
  
}

?>
<?php
 if($insert){
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Item Added to Cart.
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
 }

?>
<head>
<style>
table {
  table-layout: fixed;
  border-collapse: collapse;
  width: 50%;
  padding: 30px;
  color: #588c7e;
  font-family: monospace;
  font-size: 15px;
  text-align: left;
}


th{
  border: 0;
  border-collapse: collapse;
  padding: 15px;
  width: 100px;
  padding-right: 30px;
  padding-left: 15px;
  column-rule-width: 0;
  text-align: left;
}
tr{
  background-color: #eee;
 
  text-align: left;
  text-align: center;
}




</style>
</head>

<?php





// Find the number of records returned
$num = mysqli_num_rows($result);
// Display the rows returned by the sql query
if($num> 0){
  echo"<h3>TV</h3>";
  echo"<table>";
  echo"<tr>";
  echo"<th>ID</th>";
  echo"<th>Model</th>";
  echo"<th>Stock</th>";
  echo"<th>Price</th>";
  echo"<th>DOM</th>.
  </tr>
  </table>";
    // We can fetch in a better way using the while loop
    while($row = mysqli_fetch_assoc($result)){
      echo"<table >";
        echo"<tr>";
        echo "<th>".$row['ID']."</th>";
        echo"<th>".$row['Model']."</th> ";
        echo"<th>".$row['Stock']."</th>";
        echo"<th>".$row['Price']."</th>";
        echo"<th>".$row['DOM']."</th>
        </tr>
        </table>";
    }

}
?>
<form action="" method="POST">
  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">Enter Model Number</label>
    <input type="text" class="form-text" name="Id" id="exampleInputEmail1" aria-describedby="emailHelp" size="100">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Add To Cart</button>
</form>
<?php

if(isset($_POST['submit'])){
  $Id=$_POST['Id'];
  $sq = "SELECT * FROM `tv` WHERE ID= '$Id' ";
  $res = mysqli_query($conn, $sq);
  //$nu = mysqli_num_rows($res);
  //echo "<br>".$nu;
  $row = mysqli_fetch_assoc($res);
  //echo "<br>".$row['Model'];
  $idn=$row['ID'];
  $modn=$row['Model'];
  $ston=$row['Stock'];
  $prin=$row['Price'];
  $domn=$row['DOM'];
  $qwe=mysqli_query($conn,"INSERT INTO `sam`(`ID`, `Model`, `Stock`, `Price`, `DOM`) VALUES ('$idn','$modn','$ston','$prin','$domn')");
  
}

?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
