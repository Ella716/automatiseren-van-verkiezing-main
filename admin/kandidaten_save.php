<?php
	include 'includes/session.php';

	if (isset($_POST['updatebtn'])) {
  $id = $_POST['edit_id'];
  $anaam = $_POST['edit_anaam'];
  $vnaam = $_POST['edit_vnaam'];
  $partij = $_POST['edit_partij'];
  $district = $_POST['edit_district'];


  $query1 = " SELECT ID FROM district WHERE DistrictNaam ='$district'";
  $query1_run = mysqli_query($db, $query1);
  if (mysqli_num_rows($query1_run) > 0) {
    while ($row = mysqli_fetch_assoc($query1_run)) {
      $richting = $row['ID'];
}
  }

  $query2 = " SELECT ID FROM partij WHERE PartijNaam ='$partij'";
  $query2_run = mysqli_query($db, $query2);
  if (mysqli_num_rows($query2_run) > 0) {
    while ($row = mysqli_fetch_assoc($query2_run)) {
      $rol = $row['ID'];
}
  }

	$sql = "UPDATE kandidaten SET Achternaam = '$anaam', Voornaam = '$vnaam', PartijID = '$partij', DistrictID = '$district' WHERE ID = '$id'";
	if($conn->query($sql)){
		$_SESSION['success'] = 'De kandidaat is succesvol bijgewerkt';
	}
	else{
		$_SESSION['error'] = $conn->error;
	}
header('location: kandidaten.php');

}
else{
	$_SESSION['error'] = 'Vul eerst het bewerkingsformulier in';
}



?>
