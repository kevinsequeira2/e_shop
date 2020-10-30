<?php 

	include 'connection.php';
	$id2 = $_POST['id2'];
	$category = $_POST['category'];

	$sentence = $bd->prepare("UPDATE category SET name = ? WHERE id = ?;");
	$result = $sentence->execute([$category,$id2]);

	if ($result === TRUE) {
		header('Location: welcomeAdmin.php');
	}else{
		echo "Error";
	}
?>