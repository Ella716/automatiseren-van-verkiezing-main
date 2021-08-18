<?php
	include 'includes/session.php';

	if(isset($_POST['delete_btn'])){
		$id = $_POST['delete_id'];
		$sql = "DELETE FROM kandidaten WHERE ID = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Kandiaat succesvol verwijderd';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Selecteer een item om eerst te verwijderen';
	}

	header('location: kandidaten.php');

?>
