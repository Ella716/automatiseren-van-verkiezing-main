<?php
	include 'includes/session.php';

	if (isset($_POST['updatebtn'])) {
  $id = $_POST['edit_id'];
  $anaam = $_POST['edit_anaam'];
  $vnaam = $_POST['edit_vnaam'];
  $gebdat = $_POST['edit_gebdat'];
  $gebplaats = $_POST['edit_gebplaats'];
  $geslacht = $_POST['edit_geslacht'];
  $district = $_POST['edit_district'];


  $query1 = " SELECT ID FROM district WHERE DistrictNaam ='$district'";
  $query1_run = mysqli_query($db, $query1);
  if (mysqli_num_rows($query1_run) > 0) {
    while ($row = mysqli_fetch_assoc($query1_run)) {
      $richting = $row['ID'];
}
  }

	$sql = "UPDATE burgers SET Achternaam = '$anaam', Voornaam = '$vnaam', GeboorteDatum = '$gebdat', GeboortePlaats = '$gebplaats', Geslacht = '$geslacht', DistrictID = '$district' WHERE IDnummer = '$id'";
	if($conn->query($sql)){
		$_SESSION['success'] = 'De kiezer is succesvol bijgewerkt';
	}
	else{
		$_SESSION['error'] = $conn->error;
	}
header('location: burgers.php');

}
else{
	$_SESSION['error'] = 'Vul eerst het bewerkingsformulier in';
}



?>
