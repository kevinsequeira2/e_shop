<?php 
	
	if (!isset($_POST['oculto'])) {
		header('Location: editViewAdmin.php');
	}

	include 'database.php';
	//here update category in the database where id is similar
	$id2 = $_POST['id2'];
	$category = $_POST['txt2name'];

	$sentence = $bd->prepare("UPDATE category SET name = ? WHERE id = ?;");
	$result = $sentence->execute([$category,$id2]);
	//if all is true go editViewAdmin.php
	if ($result === TRUE) {
		header('Location: editViewAdmin.php');
	}else{
		echo "Error";
	}
?>