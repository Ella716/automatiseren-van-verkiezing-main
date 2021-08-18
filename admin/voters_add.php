<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$id_num = $_POST['id_num'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$geb_dat = $_POST['geb_dat'];
		$geb_plaats = $_POST['geb_plaats'];
		$geslacht = $_POST['geslacht'];
		$district = $_POST['district'];


		$sql = "INSERT INTO burgers (IDnummer, Achternaam, Voornaam, GeboorteDatum, GeboortePlaats, Geslacht, DistrictID) VALUES ('$id_num', '$lastname', '$firstname', '$geb_dat', '$geb_plaats', '$geslacht', '$district')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Kiezer succesvol toegevoegd';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Vul eerst het aanmeldingsformulier in';
	}

	header('location: burgers.php');
?>
