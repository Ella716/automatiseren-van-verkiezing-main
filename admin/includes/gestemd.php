<?php
include 'includes/conn.php';

if(isset($_SESSION['voter'])){
  $sql = "SELECT * FROM burgers WHERE IDnummer = '".$_SESSION['voter']."'";
  $query = $conn->query($sql);
  $voter = $query->fetch_assoc();
}
else{
  header('location: index.php');
  exit();
}

 ?>
