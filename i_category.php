<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'database.php';
	$category = $_POST['txtname'];

	//here insert category in the database
	$sentence = $bd->prepare("INSERT INTO category(name) VALUES (?);");
	$result = $sentence->execute([$category]);

	if ($result === TRUE) {
		
		header('Location: editViewAdmin.php');

	}else{
		echo "Error";
	}
?>