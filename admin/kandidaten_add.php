<?php
	include 'includes/session.php';

	if(isset($_POST['sum'])){
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$partij = $_POST['partij'];
		$district = $_POST['district'];


		$sql = "INSERT INTO kandidaten (Achternaam, Voornaam, PartijID, DistrictID) VALUES ('$lastname', '$firstname', '$partij', '$district')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Kandidaat succesvol toegevoegd';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Vul eerst het aanmeldingsformulier in';
	}

	header('location: kandidaten.php');
?>
