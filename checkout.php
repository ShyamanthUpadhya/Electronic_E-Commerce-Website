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

$sql = "SELECT * FROM `checkout`";
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
  <img src="cart.jpg" ,alt="Image not Found" style="
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
      <li class="nav-item">
        <a class="nav-link" href="tv.php">TV</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="speaker.php">Speakers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

      
     
    </ul>
  </div>
</nav>
<?php

if(isset($_POST['submit'])){
  $insert=true;
  $sq = "DELETE FROM `checkout` WHERE 1";
  $res = mysqli_query($conn, $sq);
  if($res){

  }else{
    echo "Failed to Checkout";
  }
}

?>
<?php
 if($insert){
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Thank You for Shopping with us.
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
 }

?>
<head>
<style type="text/css">

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

  border-collapse: collapse;
  padding: 15px;
  width: 100px;
  padding-right: 30px;
  padding-left: 15px;
  column-rule-width: 0;
  text-align: left;
}
tr{
 
 

  text-align: center;
}
sas{
  display: block;
  margin: auto;
 
}


</style>
</head>

<?php





// Find the number of records returned
$num = mysqli_num_rows($result);
// Display the rows returned by the sql query
if($num> 0){
  echo"<h3>Checkout</h3>";
  echo"<table>";
  echo"<tr>";
  echo"<th>ID</th>";
  echo"<th>Model</th>";
  echo"<th>Price</th>";
  echo"<th>DOM</th>.
  </tr>
  </table>";
  $add=0;
    // We can fetch in a better way using the while loop
    while($row = mysqli_fetch_assoc($result)){
        // escho var_dump($row);
        echo"<table >";
        echo"<tr>";
        echo "<th>".$row['ID']."</th>";
        echo"<th>".$row['Model']."</th> ";
        echo"<th>".$row['Price']."</th>";
        echo"<th>".$row['DOM']."</th>
        </tr>
        </table>";
        
        $add+=$row['Price'];
    }
    echo'<b class="w-75 p-3" style="background-color:; 
    font-family: monospace;font-size: 15px;color: #588c7e;">
    &emsp;&emsp;&emsp; &nbsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    Total: '.$add.'</b>';
    echo '<div id="sas">';
    //echo '<table><tr><td colspan=1';
    echo '<form action="" method="post" >';
    echo'  &emsp;&emsp;&emsp; &nbsp;&emsp;&emsp;&emsp;&emsp; &nbsp;&emsp;&emsp;&emsp; &nbsp;&emsp;&emsp;&emsp; &nbsp; &emsp;&emsp;&emsp; &nbsp;&emsp;&emsp;&emsp; &nbsp;<button type="submit" name="submit" class="btn btn-primary mb-0" style="padding :10px;">Checkout</button>';
    echo '</form>';
    //echo '</td></tr></table>';
    echo '</div>';

}
?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
