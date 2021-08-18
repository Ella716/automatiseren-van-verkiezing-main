<?php
	include 'includes/session.php';

	if(isset($_POST['delete_btn'])){
		$id = $_POST['delete_id'];
		$sql = "DELETE FROM burgers WHERE IDnummer = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Burger succesvol verwijderd';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Selecteer een item om eerst te verwijderen';
	}

	header('location: burgers.php');

?>
