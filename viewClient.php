<?php 
	
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: welcome.php');
	}

	include 'database.php';
	$id = $_GET['id'];
    $id_product=$_SESSION['id'];

	$sentence = $bd->prepare("INSERT INTO car(id_product,id_client) VALUES (?,?);");
	$result = $sentence->execute([$id,$id_product]);

	if ($result === TRUE) {
		header('Location: welcome.php');
	}else{
		echo "Error";
	}
?>